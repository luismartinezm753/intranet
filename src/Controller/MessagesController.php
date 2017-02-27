<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Email\Email;
use Cake\ORM\TableRegistry;


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
            $author=$this->Auth->user('id');
            $message = $this->Messages->patchEntity($message, $this->request->data);
            $message->set('author_id',$author);
            if ($this->Messages->save($message) && !empty($this->request->data['sendto'])) {
                $this->sendEmailTo($this->request->data['sendto'],$message);
                $this->Flash->success(__('Los Mensaje han sido enviados y guardados'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('No se puede enviar el mensaje, intente de nuevo.'));
            }
        }
        $usersTable=TableRegistry::get('users');
        $query=$usersTable->find();
        $query->select(['id', 'email', 'nombre','apellido']);
        $users=['-1'=>'Todos','-2'=>'Instructores','-3'=>'Monitores','-4'=>'Alumnos'];
        foreach ($query as $result){
            $users[$result['id']]=$result['nombre'].' '.$result['apellido'];
        }
        $this->set(compact('message', 'users'));
        $this->set('_serialize', ['message']);
    }

    public function sendEmailTo($sendto,$message){
        $usersTable=TableRegistry::get('users');
        foreach ($sendto as $key=>$value){
            if ($value<0){
                $this->sendEmailGroup($value,$message);
            }else{
                $user=$usersTable->get($value);
                $this->mailling($user, $message);
            }
        }
    }

    public function sendEmailGroup($sendto,$message){
        $usersTable=TableRegistry::get('users');
        if ($sendto==0){
            $users=$usersTable->find();
        }else{
            $users=$usersTable->find()->where(['role_id ='=>abs($sendto)]);
        }
        foreach ($users as $user){
            $this->mailling($user, $message);
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

    /**
     * @param $user
     * @param $data
     */
    protected function mailling($user, $message)
    {
        $sendTo=$this->Messages->Sendto->newEntity(['user_id'=>$user->id,'message_id'=>$message->id]);
        if ($this->Messages->Sendto->save($sendTo)){
            $email = new Email();
            $email->transport('mailjet');
            $email->emailFormat('html');
            $email->from(['kenpo.martinez@gmail.com' => 'Kenpo Martinez'])
                ->to([$user['email'] => 'My Website'])
                ->subject('Kenponet- '.$message['header'])
                ->send($message['message']);
        }
        else{
            $this->Flash->error('Ha ocurrido un error.');
        }
    }
    public function readMails(){

    }
}
