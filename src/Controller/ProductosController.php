<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Productos Controller
 *
 * @property \App\Model\Table\ProductosTable $Productos
 */
class ProductosController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Proveedores']
        ];
        $this->set('productos', $this->paginate($this->Productos));
        $this->set('_serialize', ['productos']);
    }

    /**
     * View method
     *
     * @param string|null $id Producto id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $producto = $this->Productos->get($id, [
            'contain' => ['Proveedores', 'Pedidos']
        ]);
        $this->set('producto', $producto);
        $this->set('_serialize', ['producto']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $producto = $this->Productos->newEntity();
        if ($this->request->is('post')) {
            $producto = $this->Productos->patchEntity($producto, $this->request->data);
            if ($this->Productos->save($producto)) {
                $this->Flash->success(__('The producto has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The producto could not be saved. Please, try again.'));
            }
        }
        $proveedores = $this->Productos->Proveedores->find('list', ['limit' => 200]);
        $this->set(compact('producto', 'proveedores'));
        $this->set('_serialize', ['producto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Producto id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $producto = $this->Productos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $producto = $this->Productos->patchEntity($producto, $this->request->data);
            if ($this->Productos->save($producto)) {
                $this->Flash->success(__('The producto has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The producto could not be saved. Please, try again.'));
            }
        }
        $proveedores = $this->Productos->Proveedores->find('list', ['limit' => 200]);
        $this->set(compact('producto', 'proveedores'));
        $this->set('_serialize', ['producto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Producto id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $producto = $this->Productos->get($id);
        if ($this->Productos->delete($producto)) {
            $this->Flash->success(__('The producto has been deleted.'));
        } else {
            $this->Flash->error(__('The producto could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
