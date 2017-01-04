<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
use Cake\Network\Email\Email;


/**
 * Eventos Controller
 *
 * @property \App\Model\Table\EventosTable $Eventos
 */
class EventosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $eventos = $this->paginate($this->Eventos);

        $this->set(compact('eventos'));
        $this->set('_serialize', ['eventos']);
    }

    /**
     * View method
     *
     * @param string|null $id Evento id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $evento = $this->Eventos->get($id, [
            'contain' => []
        ]);

        $this->set('evento', $evento);
        $this->set('_serialize', ['evento']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $evento = $this->Eventos->newEntity();
        if ($this->request->is('post')) {
            $evento = $this->Eventos->patchEntity($evento, $this->request->data);
            if ($this->Eventos->save($evento)) {
                if ($this->request->data['notify_users']==1){
                    $this->notifyEvent($evento);
                }
                $this->Flash->success(__('Se ha agregado el evento'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('No se pudo guardar el evento.'));
            }
        }
        $this->set(compact('evento'));
        $this->set('_serialize', ['evento']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Evento id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $evento = $this->Eventos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $evento = $this->Eventos->patchEntity($evento, $this->request->data);
            if ($this->Eventos->save($evento)) {
                $this->Flash->success(__('The evento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The evento could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('evento'));
        $this->set('_serialize', ['evento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Evento id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $evento = $this->Eventos->get($id);
        if ($this->Eventos->delete($evento)) {
            $this->Flash->success(__('The evento has been deleted.'));
        } else {
            $this->Flash->error(__('The evento could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        $current_user=$this->Auth->user();
        if ($current_user['rol']==0) {
            return true;
        }else if ($current_user['rol']!=0) {
            $action = $this->request->params['action'];
            if (!empty($this->request->params['pass'])){
                $user=$this->Users->get($this->request->params['pass']);
            }
            if (in_array($action, ['view','index'])) {
                return true;

            }
            return false;
        }
        return parent::isAuthorized($user);
    }
    public function notifyEvent($event){
        $users = TableRegistry::get('Users');
        $query = $users->find();
        $query->where(['rol <='=>$event->user_rol]);
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
        $url=$this->request->host().'/eventos/view/'.$event->id;
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
