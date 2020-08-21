<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\ORM\Table;

/**
 * Crimes Controller
 *
 * @property \App\Model\Table\CrimesTable $Crimes
 *
 * @method \App\Model\Entity\Crime[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CrimesController extends AppController
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
        $model = 'Crimes';
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
  
        $contain = ['Pessoas','Processos'];
        $conditions = [];
      
        $totalRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();
        
        $parsedQueries = $this->Dynatables->parseQueries($query, $validOps, $convArray, $strings, $date_start, $date_end);
  
        $conditions = array_merge($conditions,$parsedQueries);
        $queryRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();
  
        $sorts = $this->Dynatables->parseSorts($query,$validOps,$convArray);
        $records = $this->$model->find('all')->where($conditions)->contain($contain)->order($sorts)->limit($query['perPage'])->offset($query['offset'])->page($query['page']);
  
        $this->set(compact('totalRecordsCount', 'queryRecordsCount', 'records'));
      }
    }

    
    public function add()
    {
        $crime = $this->Crimes->newEntity();
        if ($this->request->is('post')) {
            $crime = $this->Crimes->patchEntity($crime, $this->request->getData());
            $this->log($crime);
            if ($this->Crimes->save($crime)) {
                $this->Flash->success(__('The crime has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The crime could not be saved. Please, try again.'));
        }
        $pessoas = $this->Crimes->Pessoas->find('list', ['limit' => 200]);
        $processos = $this->Crimes->Processos->find('list', ['limit' => 200]);
        
        $this->set(compact('crime', 'pessoas','processos'));
    }

    /**
     * View method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $crime = $this->Crimes->get($id, [
            'contain' => ['Processos', 'Pessoas']
        ]);

        $this->set('crime', $crime);
    }

    /*
    public function add()
    {
        $crime = $this->Crimes->newEntity();
        if ($this->request->is('post')) {
            $select = $this->request->getData('multiselect_to');
            $crime = $this->Crimes->patchEntity($crime, $this->request->getData());
            if ($crime=$this->Crimes->save($crime)) {
                $lastId=$crime->id;
                $this->loadModel('PessoasCrimes');
                $pessoasCrimesTable = TableRegistry::getTableLocator()->get('PessoasCrimes');
                foreach ($select as $row) {
                    $pessoaCrime = $pessoasCrimesTable->newEntity();
                    $pessoaCrime->pessoa_id = $row;
                    $pessoaCrime->crime_id = $lastId;
                    $this->PessoasCrimes->save($pessoaCrime);
                }
                $this->Flash->success(('Perfil guardado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(('Não foi possível guardar o Perfil. Por favor tente novamente.'));
        }
        $pessoas = $this->Crimes->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('crime','pessoas'));
    }*/

    public function edit($id = null)
    {
        $crime = $this->Crimes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $crime = $this->Crimes->patchEntity($crime, $this->request->getData());
            if ($this->Crimes->save($crime)) {
                $this->Flash->success(__('O registro foi gravado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O registro não foi gravado. Tente novamente.'));
        }
        $processos = $this->Crimes->Processos->find('list', ['limit' => 200]);
        $pessoas = $this->Crimes->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('crime','processos','pessoas'));
    }
   
    /**
     * Delete method
     *
     * @param string|null $id Crime id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $crime = $this->Crimes->get($id);
        if ($this->Crimes->delete($crime)) {
            $this->Flash->success(__('The crime has been deleted.'));
        } else {
            $this->Flash->error(__('The crime could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
