<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pedidostypes Controller
 *
 * @property \App\Model\Table\PedidostypesTable $Pedidostypes
 *
 * @method \App\Model\Entity\Pedidostype[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PedidostypesController extends AppController
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
        $model = 'Pedidostypes';
        $this->loadComponent('Dynatables');

        $query = $this->Dynatables->setDefaultDynatableRequestValues($this->request->getQueryParams());
      
        $validOps = ['descricao'];
        $convArray = [
          'descricao' => $model.'.descricao',
        ];
        $strings = ['descricao'];
        $date_start = []; //data inicial
        $date_end = [];  //data final

        $contain = $conditions = [];
      
        $totalRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();
        
        $parsedQueries = $this->Dynatables->parseQueries($query, $validOps, $convArray, $strings, $date_start, $date_end);

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
     * @param string|null $id Pedidostype id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pedidostype = $this->Pedidostypes->get($id, [
            'contain' => []
        ]);

        $this->set('pedidostype', $pedidostype);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pedidostype = $this->Pedidostypes->newEntity();
        if ($this->request->is('post')) {
            $pedidostype = $this->Pedidostypes->patchEntity($pedidostype, $this->request->getData());
            if ($this->Pedidostypes->save($pedidostype)) {
                $this->Flash->success(__('O registro foi gravado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O registro não foi gravado. Tente novamente.'));
        }
        $this->set(compact('pedidostype'));
    }

    public function edit($id = null)
    {
      $this->_edit($id);
    }
    
    private function _edit($id) {
        $pedidostype = $this->Pedidostypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pedidostype = $this->Pedidostypes->patchEntity($pedidostype, $this->request->getData());
            if ($this->Pedidostypes->save($pedidostype)) {
                $this->Flash->success(__('O registro foi gravado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O registro não foi gravado. Tente novamente.'));
        }
        $this->set(compact('pedidostype'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedidostype id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $pedidostype = $this->Pedidostypes->get($id);
        if ($this->Pedidostypes->delete($pedidostype)) {
            $this->Flash->success(__('O registro foi apagado.'));
        } else {
            $this->Flash->error(__('O registro não foi apagado. Tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
