<?php
/*
 * Controller/EventsController.php
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */

namespace FullCalendar\Controller;

use FullCalendar\Controller\FullCalendarAppController;
use Cake\Routing\Router;
use App\Model\Entity\User;
use Cake\ORM\TableRegistry;
use Cake\Network\Email\Email;

/**
 * Events Controller
 *
 * @property \FullCalendar\Model\Table\EventsTable $Events
 */
class EventsController extends FullCalendarAppController
{
    public $name = 'Events';
    public $paginate = ['limit' => 15];
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('TinyAuth.AuthUser');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $user= $this->Auth->user();
        $events = $this->Events->find('all')->contain(['EventTypes']);
        if ($this->request->is('requested')) {
            $this->paginate = [
                'limit'   => 2,
                'order'   => ['Events.start' => 'desc']
            ];
            $this->response->body(json_encode($this->paginate($events)));
            return $this->response;
        } else {
            $this->paginate = [
                'limit'   => 12,
                'order'   => ['Events.start' => 'desc']
            ];
            $this->set('events', $this->paginate($events));
            $this->set('_serialize', ['events']);            
        }
    }

    /**
     * View method
     *
     * @param string|null $id Event id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => ['EventTypes']
        ]);
        $this->set('event', $event);
        $this->set('_serialize', ['event']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $event = $this->Events->newEntity();
        if ($this->request->is('post')) {
            $event = $this->Events->patchEntity($event, $this->request->data);
            if ($this->Events->save($event)) {
                debug($this->request->data['notify_users']);
                if ($this->request->data['notify_users']==1){
                    $this->notifyEvent($event);
                }
                $this->Flash->success(__('The event has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event could not be saved. Please, try again.'));
            }
        }
        $this->set('eventTypes', $this->Events->EventTypes->find('list'));
        $this->set(compact('event'));
        $this->set('_serialize', ['event']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Event id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $event = $this->Events->get($id, ['contain' => []]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $event = $this->Events->patchEntity($event, $this->request->data);
            if ($event_id = $this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event could not be saved. Please, try again.'));
            }
        }
        $eventTypes = $this->Events->EventTypes->find('list');
        $this->set(compact('event', 'eventTypes'));
        $this->set('_serialize', ['event', 'eventTypes']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Event id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $event = $this->Events->get($id);
        if ($this->Events->delete($event)) {
            $this->Flash->success(__('The event has been deleted.'));
        } else {
            $this->Flash->error(__('The event could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    // The feed action is called from "webroot/js/ready.js" to get the list of events (JSON)
    public function feed($id=null) {
        $user=$this->Auth->user();
        $this->viewBuilder()->layout('ajax');
        $vars = $this->request->query([]);
        $conditions = ['UNIX_TIMESTAMP(start) >=' => $vars['start'], 'UNIX_TIMESTAMP(start) <=' => $vars['end'],'user_type >='=>$user['role_id']];
        $events = $this->Events->find('all', $conditions)->contain(['EventTypes']);
        foreach($events as $event) {
            if($event->all_day === 1) {
                $allday = true;
                $end = $event->start;
            } else {
                $allday = false;
                $end = $event->end;
            }
            $json[] = [
                    'id' => $event->id,
                    'title'=> $event->title,
                    'start'=> $event->start,
                    'end' => $end,
                    'allDay' => $allday,
                    'url' => Router::url(['action' => 'view', $event->id]),
                    'details' => $event->details,
                    'className' => $event->event_type->color
            ];
        }
        $this->set(compact('json'));
        $this->set('_serialize', 'json');
    }

    // The update action is called from "webroot/js/ready.js" to update date/time when an event is dragged or resized
    public function update($id = null)
    {
        if ($this->request->is('ajax')) {
            $this->request->accepts('application/json');
            $debuggedData = debug($this->request->data);
            $event = $this->Events->get($id);
            $event = $this->Events->patchEntity($event, $this->request->data);
            $this->Events->save($event);
            $this->set(compact('event'));
            $this->response->body(json_encode($this->request->data));
            return $this->response;
        }
    }

    public function notifyEvent($event){
        $users = TableRegistry::get('Users');
        $query = $users->find();
        $query->where(['rol <='=>$event->user_type]);
        foreach ($query as $user){
            $this->sendEventEmail($event, $user);
        }
    }

    /**
     * @param $event
     * @param $user
     */
    public function sendEventEmail($event, $user)
    {
        $url=Router::url(['controller' => 'Event', 'action' => 'view', 'id' => $event->id,'_full'=>true]);
        $email = new Email();
        $email->transport('mailjet');
        $email->viewVars(['event' => $event, 'user' => $user,'url'=>$url]);
        $email->template('event_notification');
        $email->emailFormat('html');
        $email->from(['kenpo.martinez@gmail.com' => 'Kenpo Martinez'])
            ->to([$user['email'] => 'My Website'])
            ->subject('Nuevo Evento: '.$event->nombre)
            ->send();
    }

}