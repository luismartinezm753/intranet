<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Email\Email;
use Cake\Validation\Validator;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public $components = array(
        'UserPermissions.UserPermissions'
    );

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

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
        if($this->getRole() == 'Instructor') {
            // set the view variable here
            $this->set('is_admin', 1);
        }else{
            $this->set('is_admin',0);
        }
        $user = $this->Users->get($id, [
            'contain' => ['Grados', 'Clases', 'ConveniosUsuarios', 'Desvinculaciones', 'HistorialAlumnos', 'Pagos', 'Pedidos']
        ]);
        $UserRef= $this->Users->get($user->id_user_referencia);
        $nameUserRef=$UserRef->nombre;
        $user->set('id_user_referencia',$nameUserRef);
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
        if($this->getRole() == 'Instructor') {
            // set the view variable here
            $this->set('is_admin', 1);
        }else{
            $this->set('is_admin',0);
        }
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $this->addAutomaticValues($user);
            if ($this->Users->save($user)) {
                $this->sendRegisterNotify($user);
                $this->Flash->success(__('El usuario ha sido agregado'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('No se pudo guardar el usuario, intente de nuevo.'));
            }
        }
        $grados = $this->Users->Grados->find('list', ['limit' => 200]);
        $id_users_ref = $this->Users->Users->find('list',['limit'=>200]);
        $this->set(compact('user', 'grados'));
        $this->set(compact('user', 'id_users_ref'));
        $this->set('_serialize', ['user']);
    }
    public function addAutomaticValues($user)
    {
        if (!isset($this->request->data['id_users_referencia'])) {
                $result=$this->Users->find('all')->last();
                $user->set('id_user_referencia',$result['id']+1);
        }
        if (!isset($this->request->data['fecha_ult_acenso'])) {
            $user->set('fecha_ult_acenso',$this->request->data['fecha_ing']);
        }
        $user->set('estado',0);
        $user->set('password',$this->generatePassword());
        $user->set('token',$this->generatePassword());
    }
    public function generatePassword()
    {
        $bytes=openssl_random_pseudo_bytes(7,$cstrong);
        $pass=bin2hex($bytes);
        $special="!#$%&/@+*";
        $lenSpecial=strlen($special);
        $lenPass=strlen($pass);
        $finalPass=$pass;
        for ($i=0; $i <$lenSpecial-4 ; $i++) { 
            $symbol=substr($special, rand(0,$lenSpecial-1),1);
            $finalPass = substr_replace($finalPass, $symbol, rand(0,$lenPass-1), 0);
        }
        return $finalPass;
    }
    public function sendRegisterNotify($user)
    {
        //$hash =$user['token'];
        $hash = $user['id'];
        $url= 'http://localhost:8765/users/verify/'.$hash.'/'.$user['username'];
        $email = new Email();
        $email->transport('mailjet');
        $email->from(['kenpo.martinez@gmail.com'=>'Kenpo Martinez'])
                  ->to([$user['email'] => 'My Website'])
                  ->subject('Bienvenido!')                   
                  ->send('Bienvenido estimada/o '.$user['nombre'].":\n
                        Para activar tu cuenta de intranet has click en el siguiente link:\n".$url.
                        "\nSaluda atentamente\n Kenpo Martinez");
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
            addAutomaticValues($user);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $grados = $this->Users->Grados->find('list', ['limit' => 200]);
        $id_users_ref = $this->Users->Users->find('list',['limit'=>200]);
        $this->set(compact('user', 'grados'));
        $this->set(compact('user', 'id_users_ref'));
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
        parent::beforeFilter($event);
        //default user_type if not logged
        $user_type = $this->getRole();
        $id=$this->Auth->user('id');
        $url='';
        if (isset($id)) {
            $url='/users/view/'.$id;
        }
        //pass user type to the plugin
        $rules = array(
            'user_type' => $user_type,
            'redirect' => $url,//'/users/view/'.$this->Auth->user('id'),
            'message' => 'No puedes ver esta pagina!',
            'action' =>  $this->request->params['action'],
            'controller' =>  $this->request->params['controller'],
            'groups' => array(
                'guest' => array('login','logout','verify','changePassword'),
                'Instructor' => array('*'), 
                'Monitor' => array('login','logout','edit','view','index'),
                'Alumno' => array('logout','login','view','edit')
            ),
            'views' => array(
                'edit' => 'checkEdit',
                'view' => 'checkView',
            ),
        );

        $this->UserPermissions->allow($rules);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                if ($user['estado']==0) {
                    debug($user);die;
                    $this->Flash->error(__('Su cuenta no esta Activa!')); 
                }else{
                    $this->Auth->setUser($user);
                    if ($this->Auth->user('rol') != 'Instructor') {
                        $this->redirect('users'.DS.'view'.DS.$this->Auth->user('id'));
                    }else{
                        return $this->redirect($this->Auth->redirectUrl());
                    }
                }
            }else{
                $this->Flash->error(__('Usario o contraseña invalidos!'));    
            }
        }
    }

    public function changePassword($id)
    {        
        $user_data=$this->Users->get($id);
        if (!empty($this->request->data)) {
           $user = $this->Users->patchEntity($user_data, [
                    'password' => $this->request->data['password1'],
                    'password2' => $this->request->data['password2']                  
                    ],
                    ['validate' => 'password']
                );
            $time = Time::now();
            $user->set('fecha_cambio_password',$time);
            if ($this->Users->save($user)) {
                $this->Flash->success('Contraseña Actualizada');
                $this->redirect('/users/login');
            } else {
                $this->Flash->error('No se pudo actualizar la contraseña!');
            }
        }
    }
    public function verify()
    {
        if (!empty($this->request->params)) {
            $token=$this->request->params['pass'][1];
            $id=$this->request->params['pass'][0];
            $user=$this->Users->get($id);
            if ($user->estado == 0) {
                if (strcmp($user->token, $token)) {
                    $user->set('estado',1);
                    $this->Users->save($user);
                    $this->Flash->success('Tu cuenta ha sido activada, por favor ingrese su contraseña!');
                    $this->redirect('/users/changePassword/'.$id);                
                }
            }else{
                $this->Flash->success('Tu cuenta ya ha sido activda');
                $this->redirect('/users/login');

            }
        }
    }

    public function studentsToExam(){
        //$this->request->allowMethod('ajax');
        if ($this->request->is(array('post'))){
            $day = $this->request->data('fecha_examen')['day'];
            $month= $this->request->data('fecha_examen')['month'];
            $year= $this->request->data('fecha_examen')['year'];
            $this->redirect('/users/displayStudentsToExam/'.$day.'/'.$month.'/'.$year);
        }
    }
    public function displayStudentsToExam($day,$month,$year){
        Time::setToStringFormat('yyyy-MM-dd');
        $date = Time::now();
        $date->setDate($year, $month, $day);
        $users = TableRegistry::get('Users');
        $query=$users->find();
        $diff=$query->func()->dateDiff([
            'date'=>$date,
            'fecha_ult_acenso' => 'literal'
        ]);
        $query->select(['nombre','Grados.grado','diff' => $diff,'tiempo_grado'=>'Grados.duracion_mes'])
            ->matching('Grados', function ($q) use ($diff){
                return $q->where([" Grados.duracion_mes*30 <" => $diff
                ]);
        });
        $result=$query->toArray();
        $this->set(compact('result'));
        $this->set('_serialize', 'result');
        if ($this->request->is(array('post'))){
             $this->redirect('/users/studentsToExam');
        }  
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function getRole(){
        return $this->Auth->user('rol');
    }

    public function checkEdit()
    {
        if ($this->Auth->user('rol') == 'Instructor') {
            return true;
        }
        return $this->Auth->user('id') == $this->request->params['pass'][0];
    }

    public function isAuthorized($user)
    {
        return true;
    }
    public function checkView()
    {
        if ($this->Auth->user('rol')!= 'Alumno') {
            return true;
        }
        return $this->Auth->user('id') == $this->request->params['pass'][0];
    }
}
