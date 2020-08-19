<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserStates Controller
 *
 * @property \App\Model\Table\UserStatesTable $UserStates
 *
 * @method \App\Model\Entity\UserState[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserStatesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $userStates = $this->paginate($this->UserStates);

        $this->set(compact('userStates'));
    }

    /**
     * View method
     *
     * @param string|null $id User State id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userState = $this->UserStates->get($id, [
            'contain' => ['Attempts']
        ]);

        $this->set('userState', $userState);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userState = $this->UserStates->newEntity();
        if ($this->request->is('post')) {
            $userState = $this->UserStates->patchEntity($userState, $this->request->getData());
            if ($this->UserStates->save($userState)) {
                $this->Flash->success(__('O registo foi gravado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O registo não foi gravado. Tente novamente.'));
        }
        $this->set(compact('userState'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User State id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userState = $this->UserStates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userState = $this->UserStates->patchEntity($userState, $this->request->getData());
            if ($this->UserStates->save($userState)) {
                $this->Flash->success(__('O registo foi gravado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O registo não foi gravado. Tente novamente.'));
        }
        $this->set(compact('userState'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User State id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userState = $this->UserStates->get($id);
        if ($this->UserStates->delete($userState)) {
            $this->Flash->success(__('O registo foi apagado.'));
        } else {
            $this->Flash->error(__('O registo não foi apagado. Tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
