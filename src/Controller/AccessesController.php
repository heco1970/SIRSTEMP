<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Accesses Controller
 *
 * @property \App\Model\Table\AccessesTable $Accesses
 *
 * @method \App\Model\Entity\Access[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccessesController extends AppController
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
            $model = 'Accesses';
            $this->loadComponent('Dynatables');
            $query = $this->Dynatables->setDefaultDynatableRequestValues($this->request->getQueryParams());

            $validOps = ['created', 'browser', 'browser_version', 'os', 'os_version', 'device'];
            $convArray = [
              'created' => $model.'.created', 'browser' => $model.'.browser',
              'browser_version' => $model.'.browser_version', 'os' => $model.'.os',
              'os_version' => $model.'.os_version', 'device' => $model.'.device'];
            $strings = ['browser','browser_version', 'os', 'os_version', 'device'];
            $contain = $conditions = [];

            if (!$admin) {
              $conditions['user_id'] = $this->Auth->user('id');
            } else {
              $contain = ['Users'];
            }

            $totalRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();
            $parsedQueries = $this->Dynatables->parseQueries($query,$validOps,$convArray,$strings);
            $conditions = array_merge($conditions,$parsedQueries);
            $queryRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

            $sorts = $this->Dynatables->parseSorts($query,$validOps,$convArray);
            $records = $this->$model->find('all')->where($conditions)->contain($contain)->order($sorts)->limit($query['perPage'])->offset($query['offset'])->page($query['page']);
            $this->set(compact('totalRecordsCount', 'queryRecordsCount', 'records'));
        }
        $this->set(compact('admin'));


        $this->viewBuilder()->setTemplate('index');
    }

    /**
     * View method
     *
     * @param string|null $id Access id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $access = $this->Accesses->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('access', $access);
    }

}
