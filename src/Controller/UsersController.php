<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Grados']
        ];
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Grados', 'Clases', 'ConveniosUsuarios', 'Desvinculaciones', 'HistorialAlumnos', 'Pagos', 'Pedidos']
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
        if($this->getRole() == 'Instructor') {
            // set the view variable here
            $this->set('is_admin', 1);
        }else{
            $this->set('is_admin',0);
        }
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $grados = $this->Users->Grados->find('list', ['limit' => 200]);
        $this->set(compact('user', 'grados'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($this->getRole() == 'Instructor') {
            // set the view variable here
            $this->set('is_admin', 1);
        }else{
            $this->set('is_admin',0);
        }
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $grados = $this->Users->Grados->find('list', ['limit' => 200]);
        $this->set(compact('user', 'grados'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(Event $event)
    { 
        $this->Auth->allow(['logout']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                if ($this->Auth->user('rol') == 'Alumno') {
                    $this->redirect('users'.DS.'view'.DS.$this->Auth->user('id'));
                }else{
                    return $this->redirect($this->Auth->redirectUrl());
                }
            }else{
                $this->Flash->error(__('Usario o contraseña invalidos!'));    
            }
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function isAuthorized($user)
    {
        $userid=$this->Auth->user('id');
        //debug($this->request->params);
        if ($user['rol']=='Instructor') {
            return true;
        }else if ($user['rol']!='Instructor') {
            $action = $this->request->params['action'];
            if (in_array($action, ['edit', 'view'])) {
                return true;
            }
            return false;
        }
        return parent::isAuthorized($user);
    }

    public function getRole(){
        return $this->Auth->user('rol');
    }
}
