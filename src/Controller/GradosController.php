<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;


/**
 * Grados Controller
 *
 * @property \App\Model\Table\GradosTable $Grados
 */
class GradosController extends AppController
{
    public $components = array(
        'UserPermissions.UserPermissions'
    );

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('grados', $this->paginate($this->Grados));
        $this->set('_serialize', ['grados']);
    }

    /**
     * View method
     *
     * @param string|null $id Grado id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        if($this->Auth->user('rol') == 'Instructor') {
            // set the view variable here
            $this->set('is_admin', 1);
        }else{
            $this->set('is_admin',0);
        }
        $grado = $this->Grados->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('grado', $grado);
        $this->set('_serialize', ['grado']);
    }
    public function downloadFile($id)
    {
        $path=$this->Grados->get($id)->programa;
        $this->response->file(
            $path,
            ['download' => true]
        );
        return $this->response;
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add(){
        $grado = $this->Grados->newEntity();
        if ($this->request->is('post') || $this->request->is('put')) {
            $grado = $this->Grados->patchEntity($grado, $this->request->data);
            $filename = WWW_ROOT.'files'.DS.'programas'.DS.$this->request->data['programa']['name'];
            move_uploaded_file($this->request->data['programa']['tmp_name'],$filename);
            $grado->set('programa',$filename);
            if ($this->Grados->save($grado)) {
                $this->Flash->success(__('Nuevo Grado Agregado'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('No se pudo agregar el grado, intente de nuevo'));
            }
        }
        $this->set(compact('grado'));
        $this->set('_serialize', ['grado']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Grado id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $grado = $this->Grados->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $grado = $this->Grados->patchEntity($grado, $this->request->data);
            $filename = WWW_ROOT.'files'.DS.'programas'.DS.$this->request->data['programa']['name'];
            move_uploaded_file($this->request->data['programa']['tmp_name'],$filename);
            $grado->set('programa',$filename);
            if ($this->Grados->save($grado)) {
                $this->Flash->success(__('The grado has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The grado could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('grado'));
        $this->set('_serialize', ['grado']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Grado id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $grado = $this->Grados->get($id);
        if ($this->Grados->delete($grado)) {
            $this->Flash->success(__('The grado has been deleted.'));
        } else {
            $this->Flash->error(__('The grado could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user){
        $action = $this->request->params['action'];
        if ($user['rol']=='Instructor') {
            return true;
        }else if ($user['rol']!='Instructor') {
            if (in_array($action, ['view','downloadFile'])) {
                return true;
            }
            return false;
        }
        return parent::isAuthorized($user);
    }
}
