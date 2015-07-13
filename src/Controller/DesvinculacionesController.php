<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Desvinculaciones Controller
 *
 * @property \App\Model\Table\DesvinculacionesTable $Desvinculaciones
 */
class DesvinculacionesController extends AppController
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
        $this->set('desvinculaciones', $this->paginate($this->Desvinculaciones));
        $this->set('_serialize', ['desvinculaciones']);
    }

    /**
     * View method
     *
     * @param string|null $id Desvinculacione id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $desvinculacione = $this->Desvinculaciones->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('desvinculacione', $desvinculacione);
        $this->set('_serialize', ['desvinculacione']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $desvinculacione = $this->Desvinculaciones->newEntity();
        if ($this->request->is('post')) {
            $desvinculacione = $this->Desvinculaciones->patchEntity($desvinculacione, $this->request->data);
            if ($this->Desvinculaciones->save($desvinculacione)) {
                $this->Flash->success(__('The desvinculacione has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The desvinculacione could not be saved. Please, try again.'));
            }
        }
        $users = $this->Desvinculaciones->Users->find('list', ['limit' => 200]);
        $this->set(compact('desvinculacione', 'users'));
        $this->set('_serialize', ['desvinculacione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Desvinculacione id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $desvinculacione = $this->Desvinculaciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $desvinculacione = $this->Desvinculaciones->patchEntity($desvinculacione, $this->request->data);
            if ($this->Desvinculaciones->save($desvinculacione)) {
                $this->Flash->success(__('The desvinculacione has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The desvinculacione could not be saved. Please, try again.'));
            }
        }
        $users = $this->Desvinculaciones->Users->find('list', ['limit' => 200]);
        $this->set(compact('desvinculacione', 'users'));
        $this->set('_serialize', ['desvinculacione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Desvinculacione id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $desvinculacione = $this->Desvinculaciones->get($id);
        if ($this->Desvinculaciones->delete($desvinculacione)) {
            $this->Flash->success(__('The desvinculacione has been deleted.'));
        } else {
            $this->Flash->error(__('The desvinculacione could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
