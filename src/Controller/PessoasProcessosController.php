<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PessoasProcessos Controller
 *
 * @property \App\Model\Table\PessoasProcessosTable $PessoasProcessos
 *
 * @method \App\Model\Entity\PessoasProcesso[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PessoasProcessosController extends AppController
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
            $model = 'PessoasProcessos';
            $this->loadComponent('Dynatables');

            $query = $this->Dynatables->setDefaultDynatableRequestValues($this->request->getQueryParams());
            
            $validOps = ['pessoa_id', 'processo_id'];
            $convArray = [
                'pessoa_id' => $model.'.pessoa_id',
                'processo_id' => $model.'.processo_id'
            ];
            $strings = [];
            $date_start = []; //data inicial
            $date_end = [];  //data final

            $conditions = [];
            $contain = ['Users', 'Teams'];
            
            $totalRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();
            
            $parsedQueries = $this->Dynatables->parseQueries($query, $validOps, $convArray, $strings, $date_start, $date_end);

            $conditions = array_merge($conditions,$parsedQueries);
            $queryRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

            $sorts = $this->Dynatables->parseSorts($query,$validOps,$convArray);
            $records = $this->$model->find('all')->where($conditions)->contain($contain)->order($sorts)->limit($query['perPage'])->offset($query['offset'])->page($query['page']);

            $this->set(compact('totalRecordsCount', 'queryRecordsCount', 'records'));
        }
    }

    public function indexpessoa($id)
    {
        if ($this->request->is('ajax')) {
            $model = 'PessoasProcessos';
            $this->loadComponent('Dynatables');

            $query = $this->Dynatables->setDefaultDynatableRequestValues($this->request->getQueryParams());
            
            $validOps = ['pessoa_id', 'processo_id'];
            $convArray = [
                'pessoa_id' => $model.'.pessoa_id',
                'processo_id' => $model.'.processo_id'
            ];
            $strings = [];
            $date_start = []; //data inicial
            $date_end = [];  //data final

            $conditions = [
                'PessoasProcessos.pessoa_id ' => $id,
            ];
            $contain = ['Pessoas', 'Processos'];
            
            $totalRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();
            
            $parsedQueries = $this->Dynatables->parseQueries($query, $validOps, $convArray, $strings, $date_start, $date_end);

            $conditions = array_merge($conditions,$parsedQueries);
            $queryRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

            $sorts = $this->Dynatables->parseSorts($query,$validOps,$convArray);
            $records = $this->$model->find('all')->where($conditions)->contain($contain)->order($sorts)->limit($query['perPage'])->offset($query['offset'])->page($query['page']);

            $this->set(compact('totalRecordsCount', 'queryRecordsCount', 'records'));
        }
    }

    public function view($id = null)
    {
        $pessoasProcesso = $this->PessoasProcessos->get($id, [
            'contain' => ['Pessoas', 'Processos']
        ]);

        $this->set('pessoasProcesso', $pessoasProcesso);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        /*
        $this->log($id);
        $pessoasProcesso = $this->PessoasProcessos->newEntity();
        if ($this->request->is('post')) {
            $pessoasProcesso = $this->PessoasProcessos->patchEntity($pessoasProcesso, $this->request->getData());
            if ($this->PessoasProcessos->save($pessoasProcesso)) {
                //$this->Flash->success(__('The users team has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            //$this->Flash->error(__('The users team could not be saved. Please, try again.'));
        }
        $pessoas = $this->PessoasProcessos->Pessoas->find('list', ['limit' => 200]);
        $processos = $this->PessoasProcessos->Processos->find('list', ['limit' => 200]);
        $this->set(compact('pessoasProcesso', 'pessoas', 'processos'));
        */

        $this->loadModel('Processos');

        $subquery = $this->PessoasProcessos
            ->find()
            ->select(['PessoasProcessos.processo_id'])
            ->where(['PessoasProcessos.pessoa_id' => $id]);

        $subquery1 = $this->PessoasProcessos
            ->find()
            ->select(['PessoasProcessos.processo_id']);

        $processos = $this->Processos
            ->find('list', ['keyField' => 'id', 'valueField' => 'processo_id'])
            ->where([
                'Processos.id NOT IN' => $subquery1
            ]);

        $processos1 = $this->Processos
            ->find('list', ['keyField' => 'id', 'valueField' => 'processo_id'])
            ->where([
                'Processos.id IN' => $subquery
            ]);

        $this->log($processos);

        /*
        $pessoasProcesso = $this->PessoasProcessos->newEntity();
        if ($this->request->is('post')) {
            $select = $this->request->getData('multiselect_to');
            $perfi = $this->Perfis->patchEntity($perfi, $this->request->getData());

            if ($perfi = $this->Perfis->save($perfi)) {
                $lastId = $perfi->id;
                $this->loadModel('UserPerfis');
                foreach ($select as $row) {
                    $userPerfi = $this->UserPerfis->newEntity();
                    $userPerfi->user_id = $row;
                    $userPerfi->perfi_id = $lastId;
                    $this->UserPerfis->save($userPerfi);
                }
                $this->Flash->success(__('Perfil guardado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível guardar o Perfil. Por favor tente novamente.'));
        }
        */

        $this->set(compact('pessoasProcesso', 'processos', 'processos1'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Team id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pessoasProcesso = $this->PessoasProcessos->get($id, [
        'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoasProcesso = $this->PessoasProcessos->patchEntity($pessoasProcesso, $this->request->getData());
            if ($this->PessoasProcessos->save($pessoasProcesso)) {
                $this->Flash->success(__('The users team has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users team could not be saved. Please, try again.'));
        }
        $pessoas = $this->PessoasProcessos->Pessoas->find('list', ['limit' => 200]);
        $processos = $this->PessoasProcessos->Processos->find('list', ['limit' => 200]);
        $this->set(compact('pessoasProcesso', 'pessoas', 'processos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Team id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $pessoasProcesso = $this->PessoasProcessos->get($id);
        if ($this->PessoasProcessos->delete($pessoasProcesso)) {
            //$this->Flash->success(__('The users team has been deleted.'));
        } else {
            //$this->Flash->error(__('The users team could not be deleted. Please, try again.'));
        }

        //return $this->redirect(['action' => 'index']);
    }
}
