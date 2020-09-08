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
  
        $contain = ['Pessoas','Processos','Tipocrimes'];
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

    /*
    public function add()
    {
        $crime = $this->Crimes->newEntity();
        if ($this->request->is('post')) {
            $crime = $this->Crimes->patchEntity($crime, $this->request->getData());
            $this->log($crime);
            if ($this->Crimes->save($crime)) {
                $this->Flash->success(__('O registo foi gravado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O registo não foi gravado. Tente novamente.'));
        }
        $pessoas = $this->Crimes->Pessoas->find('list', ['limit' => 200]);
        $processos = $this->Crimes->Processos->find('list', ['limit' => 200]);
        $tipocrimes = $this->Crimes->Tipocrimes->find('list', ['limit' => 200]);
        
        $this->set(compact('crime','processos','tipocrimes','pessoas'));
    }*/

    public function add($id = null)
    {
        $crime = $this->Crimes->newEntity();
        $id=$id;

        if ($this->request->is('post')) {
            $crime = $this->Crimes->patchEntity($crime, $this->request->getData());
            $crime->pessoa_id=$id;
            if ($save = $this->Crimes->save($crime)) {

                $this->Flash->success(__('O Crime foi guardado com sucesso.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('Não foi possível guardar o Crime. Por favor tente novamente'));
        }
        $processos = $this->Crimes->Processos->find('list', ['limit' => 200]);
        $tipocrimes = $this->Crimes->Tipocrimes->find('list', ['limit' => 200]);
        $pessoas = $this->Crimes->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('crime','processos','tipocrimes' ,'pessoas','id'));
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
            'contain' => ['Pessoas','Tipocrimes']
        ]);

        $this->set('crime', $crime);
    }

    public function edit($id = null)
    { 
        $crime = $this->Crimes->get($id, [
        'contain' => ['Pessoas', 'PessoasCrimes']
        ]);
        
        $subquery = $this->Crimes->PessoasCrimes
        ->find()
        ->select(['PessoasCrimes.pessoa_id'])
        ->where(['PessoasCrimes.crime_id' => $id]);
        
        $pessoas1 = $this->Crimes->Pessoas
        ->find('list', ['keyField' => 'id', 'valueField' => 'name'])
        ->where([
            'Pessoas.id IN' => $subquery
        ]);

        $pessoas = $this->Crimes->Pessoas
        ->find('list', ['keyField' => 'id', 'valueField' => 'name'])
        ->where([
            'Pessoas.id NOT IN' => $subquery
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
        $crime = $this->Crimes->patchEntity($crime, $this->request->getData(), ['associated' => ['Pessoas', 'PessoasCrimes']]);
        $this->loadModel('PessoasCrimes');

        $select = $this->request->getData('pessoa_id');
        $select1 = $this->request->getData('multiselect');

        if ($this->Crimes->save($crime)) {
            if (!empty($select)) {
            $delete = $this->PessoasCrimes->deleteAll(['PessoasCrimes.crime_id' => $id]);
            foreach ($select as $row) {
                $pessoaCrime = $this->PessoasCrimes->newEntity();
                $pessoaCrime->pessoa_id = $row;
                $pessoaCrime->crime_id = $id;
                $this->PessoasCrimes->save($pessoaCrime);
            }
            } else {
            $this->PessoasCrimes->deleteAll(['PessoasCrimes.crime_id' => $id]);
            }

            $this->Flash->success(__('O registo foi gravado.'));

            return $this->redirect(['action' => 'index']);
        }
            $this->Flash->error(__('O registo não foi gravado. Tente novamente.'));
        }
        $processos = $this->Crimes->Processos->find('list', ['limit' => 200]);
        $pessoas = $this->Crimes->Pessoas->find('list', ['limit' => 200]);
        $tipocrimes = $this->Crimes->Tipocrimes->find('list', ['limit' => 200]);
        $this->set(compact('crime', 'pessoas1', 'pessoas','processos','tipocrimes'));
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
            $this->Flash->success(__('O registro foi apagado.'));
        } else {
            $this->Flash->error(__('O registro não foi apagado. Tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
