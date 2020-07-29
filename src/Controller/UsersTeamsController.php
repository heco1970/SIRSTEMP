<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsersTeams Controller
 *
 * @property \App\Model\Table\UsersTeamsTable $UsersTeams
 *
 * @method \App\Model\Entity\UsersTeam[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersTeamsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Teams']
        ];
        $usersTeams = $this->paginate($this->UsersTeams);

        $this->set(compact('usersTeams'));
    }

    /**
     * View method
     *
     * @param string|null $id Users Team id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersTeam = $this->UsersTeams->get($id, [
            'contain' => ['Users', 'Teams']
        ]);

        $this->set('usersTeam', $usersTeam);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersTeam = $this->UsersTeams->newEntity();
        if ($this->request->is('post')) {
            $usersTeam = $this->UsersTeams->patchEntity($usersTeam, $this->request->getData());
            if ($this->UsersTeams->save($usersTeam)) {
                $this->Flash->success(__('The users team has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users team could not be saved. Please, try again.'));
        }
        $users = $this->UsersTeams->Users->find('list', ['limit' => 200]);
        $teams = $this->UsersTeams->Teams->find('list', ['limit' => 200]);
        $this->set(compact('usersTeam', 'users', 'teams'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Team id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersTeam = $this->UsersTeams->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersTeam = $this->UsersTeams->patchEntity($usersTeam, $this->request->getData());
            if ($this->UsersTeams->save($usersTeam)) {
                $this->Flash->success(__('The users team has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users team could not be saved. Please, try again.'));
        }
        $users = $this->UsersTeams->Users->find('list', ['limit' => 200]);
        $teams = $this->UsersTeams->Teams->find('list', ['limit' => 200]);
        $this->set(compact('usersTeam', 'users', 'teams'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Team id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $usersTeam = $this->UsersTeams->get($id);
        if ($this->UsersTeams->delete($usersTeam)) {
            //$this->Flash->success(__('The users team has been deleted.'));
        } else {
            //$this->Flash->error(__('The users team could not be deleted. Please, try again.'));
        }

        //return $this->redirect(['action' => 'index']);
    }
}
