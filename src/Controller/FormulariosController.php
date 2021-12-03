<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Formularios Controller
 *
 * @property \App\Model\Table\FormulariosTable $Formularios
 *
 * @method \App\Model\Entity\Formulario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FormulariosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $formularios = $this->paginate($this->Formularios);

        $this->set(compact('formularios'));
    }

    /**
     * View method
     *
     * @param string|null $id Formulario id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formulario = $this->Formularios->get($id, [
            'contain' => []
        ]);

        $this->set('formulario', $formulario);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formulario = $this->Formularios->newEntity();
        if ($this->request->is('post')) {
            $formulario = $this->Formularios->patchEntity($formulario, $this->request->getData());
            if ($this->Formularios->save($formulario)) {
                $this->Flash->success(__('The formulario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formulario could not be saved. Please, try again.'));
        }
        $this->set(compact('formulario'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Formulario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formulario = $this->Formularios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formulario = $this->Formularios->patchEntity($formulario, $this->request->getData());
            if ($this->Formularios->save($formulario)) {
                $this->Flash->success(__('The formulario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formulario could not be saved. Please, try again.'));
        }
        $this->set(compact('formulario'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Formulario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formulario = $this->Formularios->get($id);
        if ($this->Formularios->delete($formulario)) {
            $this->Flash->success(__('The formulario has been deleted.'));
        } else {
            $this->Flash->error(__('The formulario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
