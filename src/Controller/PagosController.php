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
}
