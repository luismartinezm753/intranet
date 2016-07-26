<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sedes Controller
 *
 * @property \App\Model\Table\SedesTable $Sedes
 */
class SedesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Escuelas']
        ];
        $sedes = $this->paginate($this->Sedes);

        $this->set(compact('sedes'));
        $this->set('_serialize', ['sedes']);
    }

    /**
     * View method
     *
     * @param string|null $id Sede id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sede = $this->Sedes->get($id, [
            'contain' => ['Escuelas', 'Clases']
        ]);

        $this->set('sede', $sede);
        $this->set('_serialize', ['sede']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sede = $this->Sedes->newEntity();
        if ($this->request->is('post')) {
            $sede = $this->Sedes->patchEntity($sede, $this->request->data);
            if ($this->Sedes->save($sede)) {
                $this->Flash->success(__('The sede has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sede could not be saved. Please, try again.'));
            }
        }
        $escuelas = $this->Sedes->Escuelas->find('list', ['limit' => 200]);
        $this->set(compact('sede', 'escuelas'));
        $this->set('_serialize', ['sede']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sede id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sede = $this->Sedes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sede = $this->Sedes->patchEntity($sede, $this->request->data);
            if ($this->Sedes->save($sede)) {
                $this->Flash->success(__('The sede has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sede could not be saved. Please, try again.'));
            }
        }
        $escuelas = $this->Sedes->Escuelas->find('list', ['limit' => 200]);
        $this->set(compact('sede', 'escuelas'));
        $this->set('_serialize', ['sede']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sede id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sede = $this->Sedes->get($id);
        if ($this->Sedes->delete($sede)) {
            $this->Flash->success(__('The sede has been deleted.'));
        } else {
            $this->Flash->error(__('The sede could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
