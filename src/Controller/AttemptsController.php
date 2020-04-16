<?php
namespace App\Controller;

use App\Controller\AppController;

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
      
        $validOps = ['username', 'ban', 'modified'];
        $convArray = [
          'username' => $model.'.username',
          'ban' => $model.'.ban',
          'modified' => $model.'.modified'];
        $strings = ['username', 'ban', 'modified'];
        $contain = $conditions = [];

        $totalRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();
        $parsedQueries = $this->Dynatables->parseQueries($query,$validOps,$convArray,$strings);

        if($parsedQueries != null){
          for($i = 0; $i <= (count($parsedQueries) - 1); $i++){
            if(isset($parsedQueries[$i]['Attempts.ban LIKE'])){
              if($parsedQueries[$i]['Attempts.ban LIKE'] == '%1%'){
                $parsedQueries[$i]['Attempts.ban LIKE'] = true;
              }
              else{
                $parsedQueries[$i]['Attempts.ban LIKE'] = false;
              }
            } 
          }
        }

        $conditions = array_merge($conditions,$parsedQueries);
        $queryRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

        $sorts = $this->Dynatables->parseSorts($query,$validOps,$convArray);
        $records = $this->$model->find('all')->where($conditions)->contain($contain)->order($sorts)->limit($query['perPage'])->offset($query['offset'])->page($query['page']);
        $this->set(compact('totalRecordsCount', 'queryRecordsCount', 'records'));
      }
      $this->set(compact('admin'));

      $this->viewBuilder()->setTemplate('index');
    }

    public function view($id = null)
    {
        $attempt = $this->Attempts->get($id);

        $this->set('attempt', $attempt);
    }

    public function add()
    {
      $attempt = $this->Attempts->newEntity();
      if ($this->request->is('post')) {
          $attempt = $this->Attempts->patchEntity($attempt, $this->request->getData());
          if ($this->Attempts->save($attempt)) {
              $this->Flash->success(__('The attempt has been saved.'));

              return $this->redirect(['action' => 'index']);
          }
          $this->Flash->error(__('The attempt could not be saved. Please, try again.'));
      }
      $types = $this->Attempts->find('list', ['limit' => 200]);
      $this->set(compact('attempt', 'types'));
    }

    public function edit($id = null)
    {
      $this->_edit($id);
    }
    
    private function _edit($id) {
      $attempt = $this->Attempts->get($id);
      if ($this->request->is(['patch', 'post', 'put'])) {
        $attempt = $this->Attempts->patchEntity($attempt, $this->request->getData());
        if ($this->Attempts->save($attempt)) {
          $this->Flash->success(__('The attempt has been saved.'));

          return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The attempt could not be saved. Please, try again.'));
      }
      $types = $this->Attempts->find('list', ['limit' => 200]);
      $this->set(compact('attempt', 'types'));
      $this->viewBuilder()->setTemplate('edit');
    }

}
