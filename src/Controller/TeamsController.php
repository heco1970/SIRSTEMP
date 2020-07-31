<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\ORM\Table;

/**
 * Teams Controller
 *
 * @property \App\Model\Table\TeamsTable $Teams
 *
 * @method \App\Model\Entity\Team[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TeamsController extends AppController
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
      $model = 'Teams';
      $this->loadComponent('Dynatables');

      $query = $this->Dynatables->setDefaultDynatableRequestValues($this->request->getQueryParams());
    
      $validOps = ['nome', 'createdfirst', 'createdlast'];
      $convArray = [
        'nome' => $model.'.nome',
        'createdfirst' => $model.'.created',
        'createdlast' => $model.'.created'
      ];
      $strings = ['nome'];
      $date_start = ['createdfirst']; //data inicial
      $date_end = ['createdlast'];  //data final

      $conditions = $contain = [];
    
      $totalRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();
      
      $parsedQueries = $this->Dynatables->parseQueries($query, $validOps, $convArray, $strings, $date_start, $date_end);

      $conditions = array_merge($conditions,$parsedQueries);
      $queryRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

      $sorts = $this->Dynatables->parseSorts($query,$validOps,$convArray);
      $records = $this->$model->find('all')->where($conditions)->contain($contain)->order($sorts)->limit($query['perPage'])->offset($query['offset'])->page($query['page']);

      $this->set(compact('totalRecordsCount', 'queryRecordsCount', 'records'));
    }
  }

  public function view($id = null)
  {
    $team = $this->Teams->get($id, [
      'contain' => ['Users', 'UsersTeams']
    ]);
    
    $this->set('team', $team);
  }

  /**
   * Add method
   *
   * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
   */
  public function add()
  {
    $team = $this->Teams->newEntity();
    if ($this->request->is('post')) {
        $team = $this->Teams->patchEntity($team, $this->request->getData());
        if ($this->Teams->save($team)) {
          $this->Flash->success(__('The team has been saved.'));

          return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The team could not be saved. Please, try again.'));
    }
    $this->set(compact('team'));
  }

  public function edit($id = null)
  {
    $team = $this->Teams->get($id, [
      'contain' => ['Users', 'UsersTeams']
    ]);
    
    $subquery = $this->Teams->UsersTeams
      ->find()
      ->select(['UsersTeams.user_id'])
      ->where(['UsersTeams.team_id' => $id]);
    
    $users1 = $this->Teams->Users
      ->find('list', ['keyField' => 'id', 'valueField' => 'username'])
      ->where([
          'Users.id IN' => $subquery
      ]);

    $users = $this->Teams->Users
      ->find('list', ['keyField' => 'id', 'valueField' => 'username'])
      ->where([
          'Users.id NOT IN' => $subquery
      ]);

    if ($this->request->is(['patch', 'post', 'put'])) {
      $team = $this->Teams->patchEntity($team, $this->request->getData(), ['associated' => ['Users', 'UsersTeams']]);

      $this->loadModel('UsersTeams');

      $select = $this->request->getData('user_id');
      $select1 = $this->request->getData('multiselect');
      
      $iddelete = $this->UsersTeams->find('list')->where(['team_id' => $id , 'user_id' => 'id'])->toArray();

      if ($this->Teams->save($team)) {
        if (!empty($select)) {
          $this->UsersTeams->deleteAll($iddelete);
          foreach ($select as $row) {
            $userTeam = $this->UsersTeams->newEntity();
            $userTeam->user_id = $row;
            $userTeam->team_id = $id;
            $this->UsersTeams->save($userTeam);
          }
        } else {
          $userTeam = $this->UsersTeams->newEntity();
          $userTeam->user_id = $select1;
          $this->UsersTeams->deleteAll($iddelete);
        }

        $this->Flash->success(__('Equipa guardada com sucesso.'));

        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('Não foi possível guardar a Equipa. Por favor tente novamente.'));
    }
    $this->set(compact('team', 'users1', 'users', 'user_team'));
  }

  /**
   * Delete method
   *
   * @param string|null $id Team id.
   * @return \Cake\Http\Response|null Redirects to index.
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
  public function delete($id = null)
  {
    //$this->request->allowMethod(['post', 'delete']);
    $team = $this->Teams->get($id);
    if ($this->Teams->delete($team)) {
      $this->Flash->success(__('The team has been deleted.'));
    } else {
      $this->Flash->error(__('The team could not be deleted. Please, try again.'));
    }

    return $this->redirect(['action' => 'index']);
  }
}
