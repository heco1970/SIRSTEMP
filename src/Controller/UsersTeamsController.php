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

    public function index()
    {
      $this->_index();
    }
  
    public function admin(){
      $this->_index(true);
    }
  
    private function _index($admin = false)
    {
      if ($this->request->is('ajax')) {
        $model = 'UsersTeams';
        $this->loadComponent('Dynatables');
  
        $query = $this->Dynatables->setDefaultDynatableRequestValues($this->request->getQueryParams());
      
        $validOps = ['user_id', 'team_id'];
        $convArray = [
          'user_id' => $model.'.user_id',
          'team_id' => $model.'.team_id'
        ];
        $strings = [];
        $date_start = []; //data inicial
        $date_end = [];  //data final
  
        $conditions = [];
        $contain = ['Users', 'Teams'];
      
        $totalRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();
        
        $parsedQueries = $this->Dynatables->parseQueries($query, $validOps, $convArray, $strings, $date_start, $date_end);
  
        $conditions = array_merge($conditions,$parsedQueries);
        $queryRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();
  
        $sorts = $this->Dynatables->parseSorts($query,$validOps,$convArray);
        $records = $this->$model->find('all')->where($conditions)->contain($contain)->order($sorts)->limit($query['perPage'])->offset($query['offset'])->page($query['page']);
  
        $this->set(compact('totalRecordsCount', 'queryRecordsCount', 'records'));
      }
    }

    public function indexuser($id)
    {
      if ($this->request->is('ajax')) {
        $model = 'UsersTeams';
        $this->loadComponent('Dynatables');

        $this->log($id);
  
        $query = $this->Dynatables->setDefaultDynatableRequestValues($this->request->getQueryParams());
      
        $validOps = ['user_id', 'team_id'];
        $convArray = [
          'user_id' => $model.'.user_id',
          'team_id' => $model.'.team_id'
        ];
        $strings = [];
        $date_start = []; //data inicial
        $date_end = [];  //data final
  
        $conditions = [
            'UsersTeams.team_id ' => $id,
            //pesquisa aqui
        ];
        $contain = ['Users', 'Teams'];
      
        $totalRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();
        
        $parsedQueries = $this->Dynatables->parseQueries($query, $validOps, $convArray, $strings, $date_start, $date_end);
  
        $conditions = array_merge($conditions,$parsedQueries);
        $queryRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();
  
        $sorts = $this->Dynatables->parseSorts($query,$validOps,$convArray);
        $records = $this->$model->find('all')->where($conditions)->contain($contain)->order($sorts)->limit($query['perPage'])->offset($query['offset'])->page($query['page']);
  
        $this->set(compact('totalRecordsCount', 'queryRecordsCount', 'records'));
      }
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
