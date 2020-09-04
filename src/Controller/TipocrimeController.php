<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tipocrime Controller
 *
 * @property \App\Model\Table\TipocrimeTable $Tipocrime
 *
 * @method \App\Model\Entity\Tipocrime[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TipocrimeController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tipocrime = $this->paginate($this->Tipocrime);

        $this->set(compact('tipocrime'));
    }

    /**
     * View method
     *
     * @param string|null $id Tipocrime id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipocrime = $this->Tipocrime->get($id, [
            'contain' => ['Crimes']
        ]);

        $this->set('tipocrime', $tipocrime);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipocrime = $this->Tipocrime->newEntity();
        if ($this->request->is('post')) {
            $tipocrime = $this->Tipocrime->patchEntity($tipocrime, $this->request->getData());
            if ($this->Tipocrime->save($tipocrime)) {
                $this->Flash->success(__('The tipocrime has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipocrime could not be saved. Please, try again.'));
        }
        $this->set(compact('tipocrime'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipocrime id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipocrime = $this->Tipocrime->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipocrime = $this->Tipocrime->patchEntity($tipocrime, $this->request->getData());
            if ($this->Tipocrime->save($tipocrime)) {
                $this->Flash->success(__('The tipocrime has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipocrime could not be saved. Please, try again.'));
        }
        $this->set(compact('tipocrime'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipocrime id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipocrime = $this->Tipocrime->get($id);
        if ($this->Tipocrime->delete($tipocrime)) {
            $this->Flash->success(__('The tipocrime has been deleted.'));
        } else {
            $this->Flash->error(__('The tipocrime could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
