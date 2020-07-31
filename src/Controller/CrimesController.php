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
     * @param string|null $id Crime id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $crime = $this->Crimes->get($id, [
            'contain' => ['Pessoas']
        ]);

        $this->set('crime', $crime);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    /*
    public function add()
    {
        $crime = $this->Crimes->newEntity();
        if ($this->request->is('post')) {
            $crime = $this->Crimes->patchEntity($crime, $this->request->getData());
            if ($this->Crimes->save($crime)) {
                $this->Flash->success(__('The crime has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The crime could not be saved. Please, try again.'));
        }
        $pessoas = $this->Crimes->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('crime', 'pessoas'));
    }*/

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
    }

/**
   * Edit method
   *
   * @param string|null $id crime id.
   * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
  public function edit($id = null)
  {
    $crime = $this->Crimes->get($id, ['contain' => ['Pessoas','PessoasCrimes']]);

    $pessoas = [];

    $pessoa_crime = $this->Crimes->PessoasCrimes->find('list', [
      'conditions' => 
      [
        'PessoasCrimes.crime_id ' => $id
      ],
      'limit' => 200
    ])->toArray();

    if(isset($crime->pessoas[0])){
      $pessoas = $this->Crimes->Pessoas->find('list', [
        'conditions' => [
          'NOT' => [
            'id IN' => $pessoa_crime
          ]
        ],
        'limit' => 200, 
      ])->toArray();
    }
    else{
      $pessoas = $this->Crimes->Pessoas->find('list', [
        'limit' => 200
      ])->toArray();
    }

    if ($this->request->is(['patch', 'post', 'put'])) {
        $crime = $this->Crimes->patchEntity($crime, $this->request->getData());
        if($_POST['pessoa_crimes'] != null){
          $pessoacrimesTable = TableRegistry::getTableLocator()->get('PessoasCrimes');
          $persona_crime = $pessoacrimesTable->newEntity();

          $persona_crime->pessoa_id = $_POST['pessoa_crimes'];
          $persona_crime->crime_id = $id;
          $this->log($persona_crime);
          $this->log($id);
          $this->log($_POST['pessoa_crimes']);
          $pessoacrimesTable->save($persona_crime);
        }

        if(isset($_POST['formDoor'])) 
        {
          $aDoor = $_POST['formDoor'];
          for($i=0; $i < count($aDoor); $i++)
          {
            $result = $this->Crimes->PessoasCrimes->find('all', 
              array(
                'conditions'=>
                  array(
                    'PessoasCrimes.pessoa_id'=> $aDoor[$i],
                    'PessoasCrimes.crime_id'=> $id,
                  )
              )
            )->all();

            $this->Crimes->PessoasCrimes->deleteAll(array(
              'PessoasCrimes.pessoa_id'=> $aDoor[$i],
              'PessoasCrimes.crime_id'=> $id,
            ));
          }
        } 

        if ($this->Crimes->save($crime)) {
          $this->Flash->success(__('The team has been saved.'));

          return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The crime could not be saved. Please, try again.'));
    }
    $this->set(compact('crime','pessoas','pessoa_crime'));
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
