<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Naturezas Controller
 *
 * @property \App\Model\Table\NaturezasTable $Naturezas
 *
 * @method \App\Model\Entity\Natureza[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NaturezasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->request->is('ajax')) {
            $model = 'Naturezas';
            $this->loadComponent('Dynatables');
      
            $query = $this->Dynatables->setDefaultDynatableRequestValues($this->request->getQueryParams());
          
            $validOps = ['designacao', 'createdfirst', 'createdlast'];
            $convArray = [
              'designacao' => $model.'.designacao',
              'createdfirst' => $model.'.created',
              'createdlast' => $model.'.created'
            ];
            $strings = ['designacao'];
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

    /**
     * View method
     *
     * @param string|null $id Natureza id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $natureza = $this->Naturezas->get($id, [
            'contain' => ['Processos']
        ]);

        $this->set('natureza', $natureza);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $natureza = $this->Naturezas->newEntity();
        if ($this->request->is('post')) {
            $natureza = $this->Naturezas->patchEntity($natureza, $this->request->getData());
            if ($this->Naturezas->save($natureza)) {
                $this->Flash->success(__('O registo foi guardado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O registo não pode ser guardado. Por favor tente novamente.'));
        }
        $this->set(compact('natureza'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Natureza id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $natureza = $this->Naturezas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $natureza = $this->Naturezas->patchEntity($natureza, $this->request->getData());
            if ($this->Naturezas->save($natureza)) {
                $this->Flash->success(__('O registo foi guardado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O registo não pode ser guardado. Por favor tente novamente.'));
        }
        $this->set(compact('natureza'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Natureza id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $natureza = $this->Naturezas->get($id);
        if ($this->Naturezas->delete($natureza)) {
            $this->Flash->success(__('O registo foi apagado com sucesso.'));
        } else {
            $this->Flash->error(__('O registo não pode ser apagado. Por favor tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
