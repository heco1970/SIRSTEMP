<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Jenssegers\Agent\Agent;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

  public function initialize() {
      parent::initialize();
      //$this->Auth->allow();
  }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->request->is('ajax')) {
            $model = 'Users';
            $this->loadComponent('Dynatables');

            $query = $this->Dynatables->setDefaultDynatableRequestValues($this->request->getQueryParams());

            $validOps = ['username', 'name', 'type', 'created', 'modified'];
            $convArray = ['username' => $model.'.username', 'name' => $model.'.name',
              'type' => $model.'.type_id', 'created' => $model.'.created',
              'modified' => $model.'.modified'];
            $strings = ['username','name'];

            $contain = ['Types'];
            $totalRecordsCount = $this->$model->find('all')->contain($contain)->count();
            $conditions = $this->Dynatables->parseQueries($query,$validOps,$convArray,$strings);
            $queryRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();
            $sorts = $this->Dynatables->parseSorts($query,$validOps,$convArray);
            $records = $this->$model->find('all')->where($conditions)->contain($contain)->order($sorts)->limit($query['perPage'])->offset($query['offset'])->page($query['page']);
            $this->set(compact('totalRecordsCount', 'queryRecordsCount', 'records'));
        } else {
            $types = $this->Users->Types->find('list', ['limit' => 200]);
            $this->set(compact('types'));
        }
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
      $this->_view($id);
    }

    public function profile($edit = false)
    {
      $id = $this->Auth->user('id');
      if ($edit) {
        $this->_edit($id,true);
      } else {
        $this->_view($id);
      }
      $this->set(compact('edit'));
    }

    private function _view($id){
      $user = $this->Users->get($id, [
        'contain' => ['Types']
      ]);

      $types = $this->Users->Types->find('list', ['limit' => 200]);
      $this->set(compact('user', 'types'));
      $this->viewBuilder()->setTemplate('view');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $types = $this->Users->Types->find('list', ['limit' => 200]);
        $this->set(compact('user', 'types'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
      $this->_edit($id);
    }
    
    private function _edit($id,$profile=false) {
      $user = $this->Users->get($id, [
        'contain' => []
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
        $user = $this->Users->patchEntity($user, $this->request->getData());
        if ($this->Users->save($user)) {
          $this->Flash->success(__('The user has been saved.'));

          if ($profile) return $this->redirect(['action' => 'profile']);
          return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The user could not be saved. Please, try again.'));
      }
      $types = $this->Users->Types->find('list', ['limit' => 200]);
      $this->set(compact('user', 'types'));
      $this->viewBuilder()->setTemplate('view');
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login() {
        $this->viewBuilder()->setLayout('login');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $agent = new Agent();
                $browser = $agent->browser();
                $browserVersion = $agent->version($browser);
                $os = $agent->platform();
                $osVersion = $agent->version($os);
                $device = $agent->device();

                $this->loadModel('Accesses');
                $access = $this->Accesses->newEntity([
                  'user_id' => $user['id'],
                  'browser' => $browser,
                  'browser_version' => $browserVersion,
                  'os' => $os,
                  'os_version' => $osVersion,
                  'device' => $device
                ]);

                if (!$this->Accesses->save($access)) {
                  $this->log('Problem saving access data');
                }
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
    
    public function password(){
      $id = $this->Auth->user('id');
      $validParams = ['password_old','password','password_confirm'];
      $this->_changePassword($id,$validParams,false);
    }
    
    public function adminPassword($id){
      $validParams = ['password','password_confirm'];
      $this->_changePassword($id,$validParams,true);
    }
    
    private function _changePassword($id,$validParams,$admin = false) {
      $user = $this->Users->newEntity();
      if ($this->request->is(['patch', 'post', 'put'])) { 
        $data = $this->_parseData($this->request->getData(), $validParams);
        
        $user = $this->Users->get($id);
        if ($admin || (new DefaultPasswordHasher)->check($data['password_old'], $user['password'])) {
          $user = $this->Users->patchEntity($user, $data);
          if ($this->Users->save($user)) {
              $this->Flash->success(__('The password has been changed.'));
              return $this->redirect(['action' => 'profile']);
          }
        } else {
          $user->setError('password_old', __('Invalid Password'));
        }
        $this->Flash->error(__('The password could not be changed. Please, try again.'));
      }
      
      if ($admin) {
        $this->set('name',$this->Users->getName($id));
      }
      $this->set(compact('user','admin'));
      $this->viewBuilder()->setTemplate('password');
    } 
    
    private function _parseData($data, $params){
      $newData = [];
      foreach ($params as $param) {
        $newData[$param] = empty($data[$param])?'':h($data[$param]);
      }
      return $newData;
    }
}
