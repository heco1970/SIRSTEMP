<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Perfis Controller
 *
 * @property \App\Model\Table\PerfisTable $Perfis
 *
 * @method \App\Model\Entity\Perfi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PerfisController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->request->is('ajax')) {
            $model = 'Perfis';
            $this->loadComponent('Dynatables');

            $query = $this->Dynatables->setDefaultDynatableRequestValues($this->request->getQueryParams());

            $validOps = ['id', 'perfil', 'createdfirst', 'createdlast'];
            $convArray = [
                'id' => $model . '.id',
                'perfil' => $model . '.perfil',
                'createdfirst' => $model . '.created',
                'createdlast' => $model . '.created'
            ];
            $strings = ['perfil'];
            $date_start = ['createdfirst']; //data inicial
            $date_end = ['createdlast'];  //data final

            $contain = $conditions = [];


            $totalRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

            $parsedQueries = $this->Dynatables->parseQueries($query, $validOps, $convArray, $strings, $date_start, $date_end);

            $conditions = array_merge($conditions, $parsedQueries);
            $queryRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

            $sorts = $this->Dynatables->parseSorts($query, $validOps, $convArray);
            $records = $this->$model->find('all')->where($conditions)->contain($contain)->order($sorts)->limit($query['perPage'])->offset($query['offset'])->page($query['page']);

            $this->set(compact('totalRecordsCount', 'queryRecordsCount', 'records'));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Perfi id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $perfi = $this->Perfis->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('perfi', $perfi);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $perfi = $this->Perfis->newEntity();
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
        $subquery1 = $this->Perfis->UserPerfis
            ->find()
            ->select(['UserPerfis.user_id']);

        $users = $this->Perfis->Users
            ->find('list', ['keyField' => 'id', 'valueField' => 'username'])
            ->where([
                'Users.id NOT IN' => $subquery1
            ]);
        $this->set(compact('perfi', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Perfi id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $perfi = $this->Perfis->get($id, [
            'contain' => ['Users', 'UserPerfis']
        ]);
        $subquery = $this->Perfis->UserPerfis
            ->find()
            ->select(['UserPerfis.user_id'])
            ->where(['UserPerfis.perfi_id' => $id]);
        $subquery1 = $this->Perfis->UserPerfis
            ->find()
            ->select(['UserPerfis.user_id']);

        $users = $this->Perfis->Users
            ->find('list', ['keyField' => 'id', 'valueField' => 'username'])
            ->where([
                'Users.id NOT IN' => $subquery1
            ]);
        $users1 = $this->Perfis->Users
            ->find('list', ['keyField' => 'id', 'valueField' => 'username'])
            ->where([
                'Users.id IN' => $subquery
            ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $perfi = $this->Perfis->patchEntity($perfi, $this->request->getData(), ['associated' => ['Users', 'UserPerfis']]);

            $this->loadModel('UserPerfis');


            $select = $this->request->getData('user_id');
            $select1 = $this->request->getData('multiselect');


            if ($this->Perfis->save($perfi)) {



                if (!empty($select)) {
                    $delete = $this->UserPerfis->deleteAll(['UserPerfis.perfi_id' => $id]);
                    $this->log($delete);
                    foreach ($select as $row) {
                        $userPerfi = $this->UserPerfis->newEntity();
                        $userPerfi->user_id = $row;
                        $userPerfi->perfi_id = $id;
                        $this->UserPerfis->save($userPerfi);
                    }
                } else {

                    $this->UserPerfis->deleteAll(['UserPerfis.perfi_id' => $id]);
                }


                $this->Flash->success(__('Perfil guardado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível guardar o Perfil. Por favor tente novamente.'));
        }
        $this->set(compact('perfi', 'users1', 'users', 'user_perfi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Perfi id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $perfi = $this->Perfis->get($id);
        if ($this->Perfis->delete($perfi)) {
            $this->Flash->success(__('O perfil foi apagado.'));
        } else {
            $this->Flash->error(__('O perfil não pode ser apagado. Por favor tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
