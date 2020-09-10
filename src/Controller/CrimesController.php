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

    public function add($id = null)
    {
        $this->loadModel('Pessoas');
        $pessoa = $this->Pessoas->get($id);
        $crime = $this->Crimes->newEntity();
        $id=$id;
        if ($this->request->is('post')) {
            $crime = $this->Crimes->patchEntity($crime, $this->request->getData());
            $crime->pessoa_id=$id;
            if ($save = $this->Crimes->save($crime)) {

                $this->Flash->success(__('O Crime foi guardado com sucesso.'));

                if($id != null){
                    $this->redirect(array('controller' => 'Pessoas', 'action' => 'view/'.$id));
                }
                else{
                    return $this->redirect(['action' => 'index']);
                }
            }
            else{
                $this->Flash->error(__('O registo não foi gravado. Tente novamente.'));
            }
        }
        $processos = $this->Crimes->Processos->find('list', ['limit' => 200]);
        $tipocrimes = $this->Crimes->Tipocrimes->find('list', ['limit' => 200]);
        $pessoas = $this->Crimes->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('crime','processos','pessoa','tipocrimes' ,'pessoas','id'));
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
            'contain' => ['Pessoas','Tipocrimes','Processos']
        ]);

        $this->set('crime', $crime);
    }

    public function edit($id = null)
    {
        $crime = $this->Crimes->get($id, [
            'contain' => ['Pessoas']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $crime = $this->Crimes->patchEntity($crime, $this->request->getData());
            if ($this->Crimes->save($crime)) {
                $this->Flash->success(__('O registo foi guardado com sucesso.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('O registo não pode ser guardado. Por favor tente novamente.'));
        }
        $processos = $this->Crimes->Processos->find('list', ['limit' => 200]);
        $pessoas = $this->Crimes->Pessoas->find('list', ['limit' => 200]);
        $tipocrimes = $this->Crimes->Tipocrimes->find('list', ['limit' => 200]);
        $this->set(compact('crime','processos','pessoas','tipocrimes'));
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
