<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Messages Controller
 *
 * @property \App\Model\Table\MessagesTable $Messages
 */
class MessagesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('TinyAuth.AuthUser');
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $messages = $this->paginate($this->Messages);

        $this->set(compact('messages'));
        $this->set('_serialize', ['messages']);
    }

    /**
     * View method
     *
     * @param string|null $id Message id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $message = $this->Messages->get($id, [
            'contain' => ['Users', 'Sendto']
        ]);

        $this->set('message', $message);
        $this->set('_serialize', ['message']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $message = $this->Messages->newEntity();
        if ($this->request->is('post')) {
            $author=$this->Auth->identify();
            $message = $this->Messages->patchEntity($message, $this->request->data);
            if ($this->Messages->save($message)) {
                $this->Flash->success(__('The message has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The message could not be saved. Please, try again.'));
            }
        }
        $users = $this->Messages->Users->find('list', ['limit' => 200]);
        $roles=$users=['-1'=>'Todos','-2'=>'Instructores','-3'=>'Monitores','-4'=>'Alumnos'];
        $users=array_merge($roles,$users);
        $this->set(compact('message', 'users'));
        $this->set('_serialize', ['message']);
    }

    public function sendEmail(){
        $query=$this->Users->find();
        $query->select(['id', 'email', 'nombre','apellido']);
        $users=['-1'=>'Todos','-2'=>'Instructores','-3'=>'Monitores','-4'=>'Alumnos'];
        foreach ($query as $result){
            $users[$result['id']]=$result['nombre'].' '.$result['apellido'];
        }
        if ($this->request->is('post')){
            $this->sendEmailTo($this->request->data);

        }
        $this->set('users',$users);
    }

    public function sendEmailTo($data){
        $sendto=$data['sendto'];
        foreach ($sendto as $key=>$value){
            if ($value<0){
                $this->sendEmailGroup($data);
            }else{
                $user=$this->Users->get($value);
                $email = new Email();
                $email->transport('mailjet');
                $email->emailFormat('html');
                $email->from(['kenpo.martinez@gmail.com'=>'Kenpo Martinez'])
                    ->to([$user['email'] => 'My Website'])
                    ->subject($data['header'])
                    ->send($data['message']);
            }
        }
    }

    public function sendEmailGroup($data){
        $group=$data['sendto'];
        if ($group==0){
            $users=$this->Users->find();
        }else{
            $users=$this->Users->find()->where(['role_id ='=>abs($group)]);
        }
        foreach ($users as $user){
            $email = new Email();
            $email->transport('mailjet');
            $email->emailFormat('html');
            $email->from(['kenpo.martinez@gmail.com'=>'Kenpo Martinez'])
                ->to([$user['email'] => 'My Website'])
                ->subject($data['header'])
                ->send($data['message']);
        }
    }

    /**

    /**
     * Delete method
     *
     * @param string|null $id Message id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $message = $this->Messages->get($id);
        if ($this->Messages->delete($message)) {
            $this->Flash->success(__('The message has been deleted.'));
        } else {
            $this->Flash->error(__('The message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
