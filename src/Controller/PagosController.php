<?php
namespace App\Controller;

use App\Controller\AppController;

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
            $month= $this->request->data('mes')['month'];
            $year= $this->request->data('año')['year'];
            $this->redirect('/pagos/displayStudentsDelay/'.$month.'/'.$year);
        }
    }
    public function displayStudentsDelay($month,$year){
        $query = $this->Pagos->find();
        $query->select(['users.nombre','pagos.mes','pagos.año','users.email','users.monto_paga']);
        $query->rightjoin(
            ['users','pagos'],
            ['pagos.user_id = users.id']);
        $query->where(['OR'=>['pagos.mes IS NULL',['AND'=>['pagos.mes <'=>$month,'pagos.año >='=>$year]]]]);
        $result=$query->toArray();
        debug($result);die;
        $result=$this->calculateDebtAndMonths($result);
        $this->set(compact('result'));
        $this->set('_serialize', 'result');
        if ($this->request->is(array('post'))){
             $this->redirect('/pagos/studentsDelay');
        } 
        /*SELECT users.username, pagos.mes,pagos.año FROM users LEFT JOIN pagos ON users.id = pagos.user_id 
        WHERE (pagos.año>=2016 AND pagos.mes<3) OR pagos.mes IS NULL*/
    }

    public function calculateDebtAndMonths($result,$month,$year){
        foreach ($result as $payment) {
            if (is_null($payment['pagos']['mes'])){
                $payment['pagos']['mes'] = 'No registra pagos';
                $payment['pagos']['años'] ='No registra pagos';
            }else{
                $payment['pagos']['mes']=$this->getMonthName($payment['pagos']['mes']);

            }
        }
        return $result;
    }

    public function calculateDebt($payment,$month,$year){
        $deuda=[];

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
