<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Email\Email;
use Cake\Validation\Validator;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Routing\Router;
use App\Form\SendMailForm;
use Cake\Core\Configure\Engine\PhpConfig;

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
        $this->loadComponent('TinyAuth.AuthUser');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index($archived=1)
    {
        $this->paginate = [
            'contain' => ['Grados']
        ];
        $this->set('users', $this->paginate($this->Users->find('all')
                            ->where(['estado ='=>$archived])));
        $this->set('_serialize', ['users']);
        $this->set('archived',$archived);
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
        $this->checkOwner($id,'view');
        $user = $this->Users->get($id, [
            'contain' => ['Grados', 'Clases', 'ConveniosUsuarios', 'Desvinculaciones', 'HistorialAlumnos', 'Pagos', 'Pedidos']
        ]);
        $UserRef= $this->Users->get($user->id_user_referencia);
        $nameUserRef=$UserRef->nombre;
        $user->set('id_user_referencia',$nameUserRef);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
        $this->set('estado',$this->getState($user->estado));
    }

    public function getState($state){
        $states = array(0=>'Inactivo',1=>'Activo');
        return $states[$state];
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
            $user->set('estado',0);
            $user->set('password',$this->generatePassword());
            if ($this->Users->save($user)) {
                $this->addAutomaticValues($user);
                $this->Users->save($user);
                $this->sendRegisterNotify($user);
                $this->Flash->success(__('El usuario ha sido agregado'));
                return $this->redirect(['action' => 'listUsers']);
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

    /**
     * Add values that are not set in the add method
     * like password, fecha_ult_ascenso, token
     * @param $user
     */
    public function addAutomaticValues($user)
    {
        if (empty($this->request->data['id_user_referencia'])) {
            $user->set('id_user_referencia',$user['id']);
        }
        if (empty($this->request->data['fecha_ult_acenso']['year'])) {
            debug($this->request->data['fecha_ult_acenso']);
            debug($this->request->data['fecha_ing']);
            $fecha_ult_ascenso = Time::create($this->request->data['fecha_ing']['year'],$this->request->data['fecha_ing']['month'],$this->request->data['fecha_ing']['day']);
            $user->set('fecha_ult_acenso',$fecha_ult_ascenso);
        }
        $user->set('token',$this->generatePassword());
    }

    /**
     * Let archive user, user's archived can't access to the application
     * @param $id
     * @return \Cake\Network\Response|null
     */
    public function archiveUser($id){
        $user=$this->Users->get($id);
        $desvinculacionTable = TableRegistry::get('Desvinculaciones');
        $user->set('estado',0);
        $desvinculado=$desvinculacionTable->newEntity($this->request->data);
        $desvinculado->set('user_id',$id);
        if ($this->request->data('calculate_debt')==0){
            $desvinculado->set('monto_deuda',$this->calculateDebt($user));
        }
        $desvinculacionTable->save($desvinculado);
        $this->Users->save($user);
        $this->autoRender=false;
        $this->Flash->success(__('El usuario ha sido archivado'));
        return $this->redirect(['action' => 'index']);
    }
    public function calculateDebt($user){
        $pagosTable = TableRegistry::get('Pagos');
        $month=date('m');
        $year=date('Y');
        $total_debt=0;
        $query=$pagosTable->find();
        $query->select(['max_pago'=>$query->func()->max('pagos.mes'),'pagos.año'])
                ->where(['OR'=>['AND'=>['mes >='=>$month,'año <='=>$year,'user_id ='=>$user->id]]]);
        $result=$query->toList();
        $pago=$result[0];
        $fecha_pago = new \DateTime();
        $fecha_pago->setDate($pago['pagos']['año'],$pago['max_pago'],1);
        $fecha_pago->format('Y-M-D');
        if (is_null($pago['max_pago'])){
            $fecha_ult_pago = new \DateTime($user['fecha_ing']);
            $diff=$fecha_ult_pago->diff($fecha_pago)->m + ($fecha_ult_pago->diff($fecha_pago)->y*12)+1;
        }else{
            $fecha_ult_pago = new \DateTime($pago['año'].'-'.$pago['max_pago'].'-1');
            $diff=$fecha_ult_pago->diff($fecha_pago)->m + ($fecha_ult_pago->diff($fecha_pago)->y*12);
        }
        $total_debt=$diff*$user['monto_paga'];
        return $total_debt;
    }

    /**
     * Generate a secure password for the user
     * @return password, the password chosen for the user
     */
    public function generatePassword()
    {
        $bytes=openssl_random_pseudo_bytes(9,$cstrong);
        $pass=bin2hex($bytes);
        $finalPass=hash('sha512',$pass);
        return $finalPass;
    }

    /**
     * Sends an email with the link to activate the user account
     * @param $user
     */
    public function sendRegisterNotify($user)
    {
        //$hash =$user['token'];
        $hash = $user['token'];
        $host = $this->request->host();
        $url= $host.'/users/verify/'.$hash;
        $email = new Email();
        $email->transport('mailjet');
        $email->viewVars(['user'=>$user, 'url'=>$url]);
        $email->template('welcome');
        $email->emailFormat('html');
        $email->from(['kenpo.martinez@gmail.com'=>'Kenpo Martinez'])
                  ->to([$user['email'] => 'My Website'])
                  ->subject('Bienvenido!')                   
                  ->send();
    }

    public function checkOwner($id,$method){
        if ($this->AuthUser->hasRole('estudiante') && !$this->AuthUser->hasRole('monitor')){
            $isMe = $this->AuthUser->isMe($id);
            if (!$isMe){
                $this->Flash->error(__('No puedes ver esta página!'));
                return $this->redirect(Router::url(['controller' => 'Users', 'action' => $method,$this->AuthUser->id()],true ));
            }
        }
    }

    public function checkLevel($id,$method){
        $user = $this->Users->get($id);
        if ($this->AuthUser->roles()<$user->id){
            $this->Flash->error(__('No puedes ver esta página!'));
            return $this->redirect(Router::url(['controller' => 'Users', 'action' => $method,$this->AuthUser->id()],true ));
        }
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
        $this->checkOwner($id,'edit');
        $this->checkLevel($id,'edit');
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Datos actualizados correctamente'));
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
            $this->Flash->success(__('El usuario ha sido eliminado'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
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


    /**
     * Login function
     * @return \Cake\Network\Response|null
     */
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                if ($user['estado']==0) {
                    $this->Flash->error(__('Su cuenta no esta Activa!'));
                }else{
                    $this->Auth->setUser($user);
                    if ($this->Auth->user('role_id') > Configure::read('Roles.instructor')) {
                        $this->request->session()->write('User.isAdmin', 0);
                        return $this->redirect('/users'.DS.'view'.DS.$this->Auth->user('id'));
                    }else{
                        $this->request->session()->write('User.isAdmin', 1);
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
            $token=$this->request->params['pass'][0];
            $user=$this->Users->find()->where(['token LIKE' => $token])->first();
            if ($user->estado == 0) {
                $user->set('estado',1);
                $this->Users->save($user);
                $this->Flash->success('Tu cuenta ha sido activada, por favor ingrese su contraseña!');
                $this->redirect('/users/changePassword/'.$user['id']);
            }else{
                $this->Flash->success('Tu cuenta ya ha sido activda');
                $this->redirect('/users/login');

            }
        }
    }

    public function studentsToExam(){
        if ($this->request->is(array('post'))){
            $day = $this->request->data('fecha_examen')['day'];
            $month= $this->request->data('fecha_examen')['month'];
            $year= $this->request->data('fecha_examen')['year'];
            $validator=new Validator();
            $validator
            ->notEmpty('fecha_examen', 'Seleccione una fecha')
            ->add('fecha_examen', 'valid', ['rule' => 'date']);
            $errors = $validator->errors($this->request->data());
            if (!empty($errors)) {
                $this->Flash->error('Complete los campos');
            }else
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
        $query->select(['Users.id','nombre','Grados.grado','diff' => $diff,'tiempo_grado'=>'Grados.duracion_mes'])
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

    public function logout(){
        return $this->redirect($this->Auth->logout());
    }


    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['logout']);
    }

}
