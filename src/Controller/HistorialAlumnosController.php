<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * HistorialAlumnos Controller
 *
 * @property \App\Model\Table\HistorialAlumnosTable $HistorialAlumnos
 */
class HistorialAlumnosController extends AppController
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
        $this->set('historialAlumnos', $this->paginate($this->HistorialAlumnos));
        $this->set('_serialize', ['historialAlumnos']);
    }

    /**
     * View method
     *
     * @param string|null $id Historial Alumno id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $historialAlumno = $this->HistorialAlumnos->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('historialAlumno', $historialAlumno);
        $this->set('_serialize', ['historialAlumno']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $historialAlumno = $this->HistorialAlumnos->newEntity();
        if ($this->request->is('post')) {
            $historialAlumno = $this->HistorialAlumnos->patchEntity($historialAlumno, $this->request->data);
            if ($this->HistorialAlumnos->save($historialAlumno)) {
                $this->Flash->success(__('The historial alumno has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The historial alumno could not be saved. Please, try again.'));
            }
        }
        $users = $this->HistorialAlumnos->Users->find('list', ['limit' => 200]);
        $this->set(compact('historialAlumno', 'users'));
        $this->set('_serialize', ['historialAlumno']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Historial Alumno id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $historialAlumno = $this->HistorialAlumnos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $historialAlumno = $this->HistorialAlumnos->patchEntity($historialAlumno, $this->request->data);
            if ($this->HistorialAlumnos->save($historialAlumno)) {
                $this->Flash->success(__('The historial alumno has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The historial alumno could not be saved. Please, try again.'));
            }
        }
        $users = $this->HistorialAlumnos->Users->find('list', ['limit' => 200]);
        $this->set(compact('historialAlumno', 'users'));
        $this->set('_serialize', ['historialAlumno']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Historial Alumno id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $historialAlumno = $this->HistorialAlumnos->get($id);
        if ($this->HistorialAlumnos->delete($historialAlumno)) {
            $this->Flash->success(__('The historial alumno has been deleted.'));
        } else {
            $this->Flash->error(__('The historial alumno could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
