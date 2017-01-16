<?php
namespace App\Controller;
use Cake\I18n\Date;
use Cake\Validation\Validator;
use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Network\Email\Email;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

/** Include path **/
ini_set('include_path', ini_get('include_path').';../Classes/');


/**
 * Pagos Controller
 *
 * @property \App\Model\Table\PagosTable $Pagos
 */
class PagosController extends AppController
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
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $this->set('pagos', $this->paginate($this->Pagos));
        $this->set('_serialize', ['pagos']);
    }

    /**
     * View method
     *
     * @param string|null $id Pago id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->checkOwner($id);
        $pago = $this->Pagos->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('pago', $pago);
        $this->set('_serialize', ['pago']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pago = $this->Pagos->newEntity();
        if ($this->request->is('post')) {
            $pago = $this->Pagos->patchEntity($pago, $this->request->data);
            $pago->set(['año'=>$this->request->data['año']['year'],'mes'=>$this->request->data['mes']['month']]);
            if ($this->Pagos->save($pago)) {
                $this->Flash->success(__('El pago ha sido guardado'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pago could not be saved. Please, try again.'));
            }
        }
        $users = $this->Pagos->Users->find('list');
        $this->set(compact('pago', 'users'));
        $this->set('_serialize', ['pago']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pago id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pago = $this->Pagos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pago = $this->Pagos->patchEntity($pago, $this->request->data);
            if ($this->Pagos->save($pago)) {
                $this->Flash->success(__('The pago has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pago could not be saved. Please, try again.'));
            }
        }
        $users = $this->Pagos->Users->find('list', ['limit' => 200]);
        $this->set(compact('pago', 'users'));
        $this->set('_serialize', ['pago']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pago id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pago = $this->Pagos->get($id);
        if ($this->Pagos->delete($pago)) {
            $this->Flash->success(__('The pago has been deleted.'));
        } else {
            $this->Flash->error(__('The pago could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    public function studentsDelay(){
        if ($this->request->is(array('post'))){
            $month= $this->request->data('mes_pago')['month'];
            $year= $this->request->data('año_pago')['year'];
            $validator= new Validator();
            $validator
            ->requirePresence('mes_pago')
            ->notEmpty('mes_pago', 'Seleccione un mes')
            ->requirePresence('año_pago')
            ->notEmpty('año_pago', 'Seleccione un año');
            $errors = $validator->errors($this->request->data());
            //debug($errors);die;
            if (!empty($errors)) {
                $this->Flash->error('Complete los campos');
            }else
                $this->redirect('/pagos/displayStudentsDelay/'.$month.'/'.$year);
        }
    }

    /**
     * @param $month
     * @param $year
     */
    public function displayStudentsDelay($month, $year){
        $subquery = $this->Pagos->find();
        $subquery->select(['users.id','users.nombre','users.apellido','pagos__mes'=>$subquery->func()->max('pagos.mes'),'pagos.año','users.email','users.monto_paga','users.fecha_ing']);
        $subquery->rightjoin(
            ['users','pagos'],
            ['pagos.user_id = users.id']);
        $subquery->group('pagos.user_id');
        $query2=$this->Pagos->find()
            ->select(['pay_info.users__id','pay_info.users__nombre','pay_info.users__apellido','pay_info.pagos__mes','pay_info.pagos__año','pay_info.users__email','pay_info.users__monto_paga','pay_info.users__fecha_ing'])
            ->from(['pay_info'=>$subquery])
            ->where(['OR'=>['pay_info.pagos__mes IS NULL',['AND'=>['pay_info.pagos__mes <'=>$month,'pay_info.pagos__año >='=>$year]]]]);
        $result=$query2->toArray();
        $result=$this->calculateDebtAndMonths($result,$month,$year);
        $this->set(compact('result'));
        $this->set(compact('month'));
        $this->set(compact('year'));
        $this->set('_serialize', 'result');
    }

    public function calculateDebtAndMonths($result,$month,$year){
        $total_debt=0;
        $numberStudents=0;
        foreach ($result as $payment) {
            $numberStudents++;
            if (is_null($payment['pay_info']['pagos__mes'])){
                $payment['pay_info']['pagos__mes'] = 'No registra pagos';
                $total_debt=$total_debt+$this->calculateDebt($payment,$month,$year);
            }else{
                $total_debt=$total_debt+$this->calculateDebt($payment,$month,$year);
                $payment['pay_info']['pagos__mes']=$this->getMonthName($payment['pay_info']['pagos__mes']);
            }
        }
        $this->set(compact('total_debt'));
        $this->set('_serialize', 'total_debt');
        $this->set(compact('numberStudents'));
        $this->set('_serialize', 'numberStudents');
        return $result;
    }

    public function calculateDebt($payment,$month,$year){
        $fecha_pago = new \DateTime($year.'-'.$month);
        $fecha_pago->format('Y-M-D');
        if (strcmp($payment['pay_info']['pagos__mes'],'No registra pagos')==0) {
            $fecha_ult_pago = new \DateTime($payment['users']['fecha_ing']);
            $diff=$fecha_ult_pago->diff($fecha_pago)->m + ($fecha_ult_pago->diff($fecha_pago)->y*12)+1;
        }else{
            $fecha_ult_pago= new \DateTime($payment['pay_info']['pagos__año'].'-'.$payment['pay_info']['pagos__mes'].'-1');
            $diff=$fecha_ult_pago->diff($fecha_pago)->m + ($fecha_ult_pago->diff($fecha_pago)->y*12);
        }
        $debt=$diff*$payment['pay_info']['users__monto_paga'];
        $payment['pay_info']['deuda']=$debt;
        $payment['pay_info']['meses_deuda']=$diff;
        return $debt;
    }

    public function sendEmailPayment($debt_info){
        parse_str($debt_info);
        $payment=$debt_info['payment'];
        $email = new Email();
        $email->transport('mailjet');
        $email->from(['kenpo.martinez@gmail.com'=>'Kenpo Martinez'])
                  ->to([$payment['pay_info']['users__email'] => 'My Website'])
                  ->subject('Deuda Mensualidad')                   
                  ->send('Estimado '.$payment['pay_info']['users__nombre'].' '.$payment['pay_info']['users__apellido'].":\n
        Registras una morosidad de ".$payment['pay_info']['meses_deuda']." meses, por favor cancele a la brevedad su deuda.\n Ante cualquier duda escribanos a kenpo.martinez@gmail.com\n
        Saluda atte\n Kenpo Martinez");
        $this->autoRender = false;
        $this->Flash->success(__('Email de notificación enviado.'));
        return $this->redirect('/pagos/displayStudentsDelay/'.$debt_info['month'].'/'.$debt_info['year']);
    }
    public function exportToExcel(){
        $payments=$this->request->data['debt_info'];
        $path=WWW_ROOT .'files/csv/morosidades.csv';
        $file = fopen($path,"w");
        fputs($file,"sep=,\n");
        $headers=array('id','nombre','apellido','mes último pago','año último pago','email','mensualidad','fecha de ingreso','deuda','meses de deuda');
        fputcsv($file,$headers);
        foreach ($payments as $payment) {
            fputcsv($file,array_merge($payment['pay_info']));
        }
        fclose($file);
        $this->set(compact('path'));
        $this->set('_serialize', 'path');
        $this->autoRender = false;
        $this->response->body($path);
        return $this->response;
    }
    public function addMulti(){
        $pays = TableRegistry::get('Pagos');
        if ($this->request->is('post')) {
            $data=array();
            $selected=$this->request->data('selected');
            $user_pay=$this->request->data('users');
            foreach ($selected as $id=>$select){
                if ($select == 1){
                    $user_pay[$id]['fecha_pago']=Time::now();
                    $user_pay[$id]['año']=$user_pay[$id]['año']['year'];
                    $user_pay[$id]['mes']=$user_pay[$id]['mes']['month'];
                    $user_pay[$id]['user_id']=$id;
                    array_push($data,$user_pay[$id]);
                }
            }
            $entities = $pays->newEntities($data);
            foreach ($entities as $entity){
               if ($this->Pagos->save($entity)) {
                   $this->Flash->success(__('El pago ha sido guardado'));
               } else {
                   $this->Flash->error(__('El pago no puede ser guardado'));
               }
            }
        }
        $query_pagos_user=$this->Pagos->find();
        $query_pagos_user->select(['max_month' => $query_pagos_user->func()->max('mes'),'pagos.año','users.id','users.monto_paga','users.nombre','users.apellido'])
            ->hydrate(false)
            ->join([
                'table' => 'users',
                'type' => 'RIGHT',
                'conditions' => 'users.id = pagos.user_id',
            ])
            ->group('users.id');
        $pagos_user=$query_pagos_user->toArray();
        $this->set(compact('pays', 'pagos_user'));
        $this->set('_serialize', ['pays','pagos_user']);
    }

    public function checkOwner($id){
        if ($this->AuthUser->hasRole('estudiante')){
            $pay=$this->Pagos->get($id);
            $isMe = $this->AuthUser->isMe($pay['user_id']);
            if (!$isMe){
                $this->Flash->error(__('No puedes ver esta página!'));
                return $this->redirect(Router::url(['controller' => 'Users', 'action' => 'view',$this->AuthUser->id()],true ));
            }
        }
    }
}
