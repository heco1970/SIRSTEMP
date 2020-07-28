<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Jenssegers\Agent\Agent;
use Cake\I18n\Time;

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

        $validOps = ['username', 'name', 'type', 'createdfirst', 'createdlast'];
        $convArray = [
          'username' => $model.'.username',
          'name' => $model.'.name',
          'type' => $model.'.type_id',
          'createdfirst' => $model.'.created',
          'createdlast' => $model.'.created'
        ];
        $strings = ['username', 'name'];
        $date_start = ['createdfirst']; //data inicial
        $date_end = ['createdlast'];  //data final
        $contain = ['Types'];
        $conditions = [];
        
        $totalRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

        $parsedQueries = $this->Dynatables->parseQueries($query, $validOps, $convArray, $strings, $date_start, $date_end);

        $conditions = array_merge($conditions,$parsedQueries);
        $queryRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

        $sorts = $this->Dynatables->parseSorts($query,$validOps,$convArray);
        $records = $this->$model->find('all')->where($conditions)->contain($contain)->order($sorts)->limit($query['perPage'])->offset($query['offset'])->page($query['page']);
        
        $this->set(compact('totalRecordsCount', 'queryRecordsCount', 'records'));
      } else {
        $types = $this->Users->Types->find('list', ['limit' => 200])->toArray();
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
              $this->Flash->success(__('O registro foi gravado.'));

              return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O registro não foi gravado. Tente novamente.'));
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
          $this->Flash->success(__('O registro foi gravado.'));

          if ($profile) return $this->redirect(['action' => 'profile']);
          return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('O registro não foi gravado. Tente novamente.'));
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
        $this->Flash->success(__('O registro foi apagado.'));
      } else {
        $this->Flash->error(__('O registro não foi apagado. Tente novamente.'));
      }

      return $this->redirect(['action' => 'index']);
    }

    public function login() {
      $this->viewBuilder()->setLayout('login');
      if ($this->request->is('post')) {
        $user = $this->Auth->identify();

        //Attemps
        $this->loadModel('Attempts');
        $att = $this->Attempts->find('all', 
          array(
            'conditions'=> array('Attempts.username'=> strtolower($_POST['username']))
          )
        )->toArray();

       
        if($user){
          //Ativo
          if(isset($att[0]['user_states_id']) == false || $att[0]['user_states_id'] == 2){
            
            //Accesses
            $this->loadModel('Accesses');
            $result = $this->Accesses->find('all', 
              array(
                'conditions'=>
                  array('Accesses.user_id'=> $user['id'])
              )
            )->all();
            $lastAccess = $result->last();

            $agent = new Agent();
            $browser = $agent->browser();
            $browserVersion = $agent->version($browser);
            $os = $agent->platform();
            $osVersion = $agent->version($os);
            $device = $agent->device();

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

            if(isset($att[0]['user_states_id']) == false){
              $att[0] = $this->Attempts->newEntity([
                'username' => strtolower($_POST['username']),
                'count' => null,
                'suspenso' => null,
                'user_states_id' => 2,
                'created' => Time::now(),
                'modified' => Time::now()
              ]);
            }

            $att[0]['count'] = null;

            if(!$this->Attempts->save($att[0])) {
              $this->log('Problem saving access data');
            }

            $user['last'] = $lastAccess['created'];
            $user['show'] = true;
            $this->Auth->setUser($user);

            return $this->redirect($this->Auth->redirectUrl()); 
          }
          // Suspenso
          elseif($att[0]['user_states_id'] == 3){
            
            if($att[0]['suspenso'] > Time::now()){
              $this->Flash->error(__('Este utilizador foi suspenso dia '.$att[0]['suspenso']->format('d')." até à(s) ".$att[0]['suspenso']->format('H:i'))."h");
            }
            elseif($att[0]['suspenso'] < Time::now()) {
              $att[0]['count'] = 0;
              $att[0]['suspenso'] = null;
              $att[0]['modified'] = Time::now();
              $att[0]['user_states_id'] = 2;
  
              if (!$this->Attempts->save($att[0])) {
                $this->log('Problem saving attempt data');
              }
              $this->Flash->error(__('Fim de suspensão'));
            }
          }
          // Banido
          elseif($att[0]['user_states_id'] == 1){
            $this->Flash->error(__('Utilizador bloquedo pelo administrador'));
          }
        }
        else {
          // User existe
          if(isset($att[0])){
            // Ainda não está suspenso
            if($att[0]['count'] < 3){
              $att[0]['count'] += 1;
              $att[0]['modified'] = Time::now();

              if (!$this->Attempts->save($att[0])) {
                $this->log('Problem saving attempt data');
              }
              $this->Flash->error(__('Palavra Passe invalida.'));
            }
            // Ficou suspenso
            elseif($att[0]['count'] > 3) {
              $startTime = Time::now();
              $startTime = date("Y-m-d H:i:s");
              $add_date = date('Y-m-d H:i:s',strtotime('+30 minutes',strtotime($startTime)));
              $att[0]['suspenso'] = $add_date;
              $att[0]['user_states_id'] = 3;

              if (!$this->Attempts->save($att[0])) {
                $this->log('Problem saving attempt data');
              }
            }
            else {
              if($att[0]['suspenso'] != null){
                $this->Flash->error(__('Este utilizador foi suspenso dia '.$att[0]['suspenso']->format('d')." até à(s) ".$att[0]['suspenso']->format('H:i'))."h");
              }
              else {
                $this->Flash->error(__('Este utilizador foi suspenso.'));
              }
            }
          }
          // User não existe
          else {
            $this->Flash->error(__('Utilizador não existe.'));
          }
        }
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
            $this->Flash->success(__('A Palavra passe foi alterada com sucesso.'));
            return $this->redirect(['action' => 'profile']);
          }
        } else {
          $user->setError('password_old', __('Invalid Password'));
        }
        $this->Flash->error(__('A Palavra passe não foi alterada. Tente novamente.'));
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
