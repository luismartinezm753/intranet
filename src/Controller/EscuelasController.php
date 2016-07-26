<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Escuelas Controller
 *
 * @property \App\Model\Table\EscuelasTable $Escuelas
 */
class EscuelasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $escuelas = $this->paginate($this->Escuelas);

        $this->set(compact('escuelas'));
        $this->set('_serialize', ['escuelas']);
    }

    /**
     * View method
     *
     * @param string|null $id Escuela id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $escuela = $this->Escuelas->get($id, [
            'contain' => ['Sedes']
        ]);

        $this->set('escuela', $escuela);
        $this->set('_serialize', ['escuela']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $escuela = $this->Escuelas->newEntity();
        if ($this->request->is('post')) {
            $escuela = $this->Escuelas->patchEntity($escuela, $this->request->data);
            if ($this->Escuelas->save($escuela)) {
                $this->Flash->success(__('The escuela has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The escuela could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('escuela'));
        $this->set('_serialize', ['escuela']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Escuela id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $escuela = $this->Escuelas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $escuela = $this->Escuelas->patchEntity($escuela, $this->request->data);
            if ($this->Escuelas->save($escuela)) {
                $this->Flash->success(__('The escuela has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The escuela could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('escuela'));
        $this->set('_serialize', ['escuela']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Escuela id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $escuela = $this->Escuelas->get($id);
        if ($this->Escuelas->delete($escuela)) {
            $this->Flash->success(__('The escuela has been deleted.'));
        } else {
            $this->Flash->error(__('The escuela could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
