<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Attempts Controller
 *
 * @property \App\Model\Table\AttemptsTable $Attempts
 *
 * @method \App\Model\Entity\Attempt[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AttemptsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
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
        $model = 'Attempts';
        $this->loadComponent('Dynatables');

        $query = $this->Dynatables->setDefaultDynatableRequestValues($this->request->getQueryParams());
      
        $validOps = ['username', 'state', 'modifiedfirst', 'modifiedlast'];
        $convArray = [
          'username' => $model.'.username',
          'state' => $model.'.user_states_id',
          'modifiedfirst' => $model.'.modified',
          'modifiedlast' => $model.'.modified'
        ];
        $strings = ['username'];
        $date_start = ['modifiedfirst']; //data inicial
        $date_end = ['modifiedlast'];  //data final

        $contain = ['UserStates'];
        $conditions = [];
      
        $totalRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();
        
        $parsedQueries = $this->Dynatables->parseQueries($query, $validOps, $convArray, $strings, $date_start, $date_end);

        $conditions = array_merge($conditions,$parsedQueries);
        $queryRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

        $sorts = $this->Dynatables->parseSorts($query,$validOps,$convArray);
        $records = $this->$model->find('all')->where($conditions)->contain($contain)->order($sorts)->limit($query['perPage'])->offset($query['offset'])->page($query['page']);

        $this->set(compact('totalRecordsCount', 'queryRecordsCount', 'records'));
      }
      $states = $this->Attempts->UserStates->find('list', ['limit' => 200])->toArray();

      $this->set(compact('admin', 'states'));
      $this->viewBuilder()->setTemplate('index');
    }

    public function view($id = null)
    {
      $attempt = $this->Attempts->get($id, array('contain' => 'UserStates'));
      $this->set('attempt', $attempt);
    }

    public function add()
    {
      $attempt = $this->Attempts->newEntity();
      if ($this->request->is('post')) {
          $attempt = $this->Attempts->patchEntity($attempt, $this->request->getData());

          if($attempt->user_states_id == 3){
            $startTime = Time::now();
            $startTime = date("Y-m-d H:i:s");
            $add_date = date('Y-m-d H:i:s',strtotime('+30 minutes',strtotime($startTime)));
            $attempt->suspenso = $add_date;
          }
          else {
            $attempt->suspenso = null;
          }

          if ($this->Attempts->save($attempt)) {
            $this->Flash->success(__('The attempt has been saved.'));

            return $this->redirect(['action' => 'index']);
          }
          $this->Flash->error(__('The attempt could not be saved. Please, try again.'));
      }
      $types = $this->Attempts->find('list', ['limit' => 200]);
      $states = $this->Attempts->UserStates->find('list', ['limit' => 200])->toArray();

      $this->set(compact('attempt', 'types', 'states'));
    }

    public function edit($id = null)
    {
      $this->_edit($id);
    }
    
    private function _edit($id) {
      $attempt = $this->Attempts->get($id, array('contain' => 'UserStates'));
      if ($this->request->is(['patch', 'post', 'put'])) {
        $attempt = $this->Attempts->patchEntity($attempt, $this->request->getData());

        if($attempt->user_states_id == 3){
          $startTime = Time::now();
          $startTime = date("Y-m-d H:i:s");
          $add_date = date('Y-m-d H:i:s',strtotime('+30 minutes',strtotime($startTime)));
          $attempt->suspenso = $add_date;
        }
        else {
          $attempt->suspenso = null;
        }

        if ($this->Attempts->save($attempt)) {
          $this->Flash->success(__('The attempt has been saved.'));

          return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The attempt could not be saved. Please, try again.'));
      }
      $types = $this->Attempts->find('list', ['limit' => 200]);
      $states = $this->Attempts->UserStates->find('list', ['limit' => 200])->toArray();

      $this->set(compact('attempt', 'types', 'states'));
      $this->viewBuilder()->setTemplate('edit');
    }

}
