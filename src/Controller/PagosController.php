<?php
namespace App\Controller;
use Cake\Validation\Validator;
use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Network\Email\Email;


/**
 * Pagos Controller
 *
 * @property \App\Model\Table\PagosTable $Pagos
 */
class PagosController extends AppController
{

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
    public function displayStudentsDelay($month,$year){
        $query = $this->Pagos->find();
        $query->select(['users.nombre','pagos.mes','pagos.año','users.email','users.monto_paga','users.fecha_ing']);
        $query->rightjoin(
            ['users','pagos'],
            ['pagos.user_id = users.id']);
        $query->where(['OR'=>['pagos.mes IS NULL',['AND'=>['pagos.mes <'=>$month,'pagos.año >='=>$year]]]]);
        $result=$query->toArray();
        $result=$this->calculateDebtAndMonths($result,$month,$year);
        $this->set(compact('result'));
        $this->set('_serialize', 'result');
        if ($this->request->is(array('post'))){
            $this->redirect('/pagos/studentsDelay');
        } 
        /*SELECT users.username, pagos.mes,pagos.año FROM users LEFT JOIN pagos ON users.id = pagos.user_id 
        WHERE (pagos.año>=2016 AND pagos.mes<3) OR pagos.mes IS NULL*/
    }

    public function calculateDebtAndMonths($result,$month,$year){
        $total_debt=0;
        $numberStudents=0;
        foreach ($result as $payment) {
            $numberStudents++;
            if (is_null($payment['pagos']['mes'])){
                $payment['pagos']['mes'] = 'No registra pagos';
                $payment['pagos']['año'] ='No registra pagos';
                $total_debt=$total_debt+$this->calculateDebt($payment,$month,$year);
            }else{
                $total_debt=$total_debt+$this->calculateDebt($payment,$month,$year);
                $payment['pagos']['mes']=$this->getMonthName($payment['pagos']['mes']);
            }
        }
        $this->set(compact('total_debt'));
        $this->set('_serialize', 'total_debt');
        $this->set(compact('numberStudents'));
        $this->set('_serialize', 'numberStudents');
        return $result;
    }

    public function calculateDebt($payment,$month,$year){
        $fecha_pago = new \DateTime($year.'-'.$month.'-1');
        if (strcmp($payment['pagos']['mes'],'No registra pagos')==0) {
            $fecha_ult_pago = new \DateTime($payment['users']['fecha_ing']);
            $diff=$fecha_ult_pago->diff($fecha_pago)->m + ($fecha_ult_pago->diff($fecha_pago)->y*12)+1;
        }else{
            $fecha_ult_pago= new \DateTime($payment['pagos']['año'].'-'.$payment['pagos']['mes'].'-1');
            $diff=$fecha_ult_pago->diff($fecha_pago)->m + ($fecha_ult_pago->diff($fecha_pago)->y*12);
        }
        $debt=$diff*$payment['users']['monto_paga'];
        $payment['pagos']['deuda']=$debt;
        $payment['pagos']['meses_deuda']=$diff;
        return $debt;
    }

    public function getMonthName($month){
        $months = [
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre'
        ];
        return $months[$month-1];
    }

    public function sendEmailPayment()
    {
        # code...
    }
    public function exportToExcel()
    {
        # code...
    }

    public function isAuthorized($user)
    {
        $userid=$this->Auth->user('id');
        //debug($this->request->params);
        if ($user['rol']=='Instructor') {
            return true;
        }else if ($user['rol']!='Instructor') {
            $action = $this->request->params['action'];
            if (in_array($action, ['view'])) {
                return true;
            }
            return false;
        }
        return parent::isAuthorized($user);
    }
}
