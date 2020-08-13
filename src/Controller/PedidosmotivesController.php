<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pedidosmotives Controller
 *
 * @property \App\Model\Table\PedidosmotivesTable $Pedidosmotives
 *
 * @method \App\Model\Entity\Pedidosmotive[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PedidosmotivesController extends AppController
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
        $model = 'Pedidosmotives';
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
     * @param string|null $id Pedidosmotive id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pedidosmotive = $this->Pedidosmotives->get($id, [
            'contain' => []
        ]);

        $this->set('pedidosmotive', $pedidosmotive);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pedidosmotive = $this->Pedidosmotives->newEntity();
        if ($this->request->is('post')) {
            $pedidosmotive = $this->Pedidosmotives->patchEntity($pedidosmotive, $this->request->getData());
            if ($this->Pedidosmotives->save($pedidosmotive)) {
                $this->Flash->success(__('O registro foi gravado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O registro não foi gravado. Tente novamente.'));
        }
        $this->set(compact('pedidosmotive'));
    }

    public function edit($id = null)
    {
      $this->_edit($id);
    }
    
    private function _edit($id) {
        $pedidosmotive = $this->Pedidosmotives->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pedidosmotive = $this->Pedidosmotives->patchEntity($pedidosmotive, $this->request->getData());
            if ($this->Pedidosmotives->save($pedidosmotive)) {
                $this->Flash->success(__('O registro foi gravado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O registro não foi gravado. Tente novamente.'));
        }
        $this->set(compact('pedidosmotive'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedidosmotive id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $pedidosmotive = $this->Pedidosmotives->get($id);
        if ($this->Pedidosmotives->delete($pedidosmotive)) {
            $this->Flash->success(__('The pedidosmotive has been deleted.'));
        } else {
            $this->Flash->error(__('O registro não foi apagado. Tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
