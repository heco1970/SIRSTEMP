<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Entidadejudiciais Controller
 *
 * @property \App\Model\Table\EntidadejudiciaisTable $Entidadejudiciais
 *
 * @method \App\Model\Entity\Entidadejudiciai[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EntidadejudiciaisController extends AppController
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
      $model = 'Entidadejudiciais';
      $this->loadComponent('Dynatables');

      $query = $this->Dynatables->setDefaultDynatableRequestValues($this->request->getQueryParams());
    
      $validOps = ['descricao', 'createdfirst', 'createdlast'];
      $convArray = [
        'descricao' => $model.'.descricao',
        'createdfirst' => $model.'.created',
        'createdlast' => $model.'.created'
      ];
      $strings = ['descricao'];
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
     * @param string|null $id Entidadejudiciai id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $entidadejudiciai = $this->Entidadejudiciais->get($id, [
            'contain' => []
        ]);

        $this->set('entidadejudiciai', $entidadejudiciai);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $entidadejudiciai = $this->Entidadejudiciais->newEntity();
        if ($this->request->is('post')) {
            $entidadejudiciai = $this->Entidadejudiciais->patchEntity($entidadejudiciai, $this->request->getData());
            if ($this->Entidadejudiciais->save($entidadejudiciai)) {
                $this->Flash->success(__('The entidadejudiciai has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The entidadejudiciai could not be saved. Please, try again.'));
        }
        $this->set(compact('entidadejudiciai'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Entidadejudiciai id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $entidadejudiciai = $this->Entidadejudiciais->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $entidadejudiciai = $this->Entidadejudiciais->patchEntity($entidadejudiciai, $this->request->getData());
            if ($this->Entidadejudiciais->save($entidadejudiciai)) {
                $this->Flash->success(__('The entidadejudiciai has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The entidadejudiciai could not be saved. Please, try again.'));
        }
        $this->set(compact('entidadejudiciai'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Entidadejudiciai id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $entidadejudiciai = $this->Entidadejudiciais->get($id);
        if ($this->Entidadejudiciais->delete($entidadejudiciai)) {
            $this->Flash->success(__('The entidadejudiciai has been deleted.'));
        } else {
            $this->Flash->error(__('The entidadejudiciai could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
