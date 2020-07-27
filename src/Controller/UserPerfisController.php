<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * UserPerfis Controller
 *
 * @property \App\Model\Table\UserPerfisTable $UserPerfis
 *
 * @method \App\Model\Entity\UserPerfi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserPerfisController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    // public function index()
    // {
    //     $this->paginate = [
    //         'contain' => ['Perfis', 'Users']
    //     ];
    //     $userPerfis = $this->paginate($this->UserPerfis);

    //     $this->set(compact('userPerfis'));
    // }
    public function index()
    {
        if ($this->request->is('ajax')) {
            $model = 'UserPerfis';
            $this->loadComponent('Dynatables');

            $query = $this->Dynatables->setDefaultDynatableRequestValues($this->request->getQueryParams());

            $validOps = ['username', 'perfil', 'createdfirst', 'createdlast'];
            $convArray = [
                'username' => $model . '.user_id',
                'perfil' => $model . '.perfi_id',
                'createdfirst' => $model . '.created',
                'createdlast' => $model . '.created'
            ];
            $strings = [];
            $date_start = ['createdfirst']; //data inicial
            $date_end = ['createdlast'];  //data final
            $contain = ['Perfis', 'Users'];
            $conditions = [];

            $totalRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

            $parsedQueries = $this->Dynatables->parseQueries($query, $validOps, $convArray, $strings, $date_start, $date_end);

            $conditions = array_merge($conditions, $parsedQueries);
            $queryRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

            $sorts = $this->Dynatables->parseSorts($query, $validOps, $convArray);
            $records = $this->$model->find('all')->where($conditions)->contain($contain)->order($sorts)->limit($query['perPage'])->offset($query['offset'])->page($query['page']);

            $this->set(compact('totalRecordsCount', 'queryRecordsCount', 'records'));
        } else {
            $perfis = $this->UserPerfis->Perfis->find('list', array(
                'keyField' => 'id',
                'valueField' => 'perfil'
            ))->toArray();
            $users = $this->UserPerfis->Users->find('list', array(
                'keyField' => 'id',
                'valueField' => 'username'
            ))->toArray();
            $this->set(compact('perfis', 'users'));
        }
    }

    /**
     * View method
     *
     * @param string|null $id User Perfi id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userPerfi = $this->UserPerfis->get($id, [
            'contain' => ['Perfis', 'Users']
        ]);

        $this->set('userPerfi', $userPerfi);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userPerfi = $this->UserPerfis->newEntity();
        if ($this->request->is('post')) {
            $userPerfi = $this->UserPerfis->patchEntity($userPerfi, $this->request->getData());
            if ($this->UserPerfis->save($userPerfi)) {
                $this->Flash->success(__('O perfil de utilizador foi guardado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível guardar o perfil de utilizador. Por favor tente novamente.'));
        }
        $perfis = $this->UserPerfis->Perfis->find('list', array(
            'keyField' => 'id',
            'valueField' => 'perfil'
        ));

        $users = $this->UserPerfis->Users->find('list', array(
            'keyField' => 'id',
            'valueField' => 'username'
        ));
        $this->set(compact('userPerfi', 'perfis', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Perfi id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userPerfi = $this->UserPerfis->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userPerfi = $this->UserPerfis->patchEntity($userPerfi, $this->request->getData());
            if ($this->UserPerfis->save($userPerfi)) {
                $this->Flash->success(__('O perfil de utilizador foi guardado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível guardar o perfil de utilizador. Por favor tente novamente.'));
        }
        $perfis = $this->UserPerfis->Perfis->find('list', array(
            'keyField' => 'id',
            'valueField' => 'perfil'
        ));

        $users = $this->UserPerfis->Users->find('list', array(
            'keyField' => 'id',
            'valueField' => 'username'
        ));
        $this->set(compact('userPerfi', 'perfis', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Perfi id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userPerfi = $this->UserPerfis->get($id);
        if ($this->UserPerfis->delete($userPerfi)) {
            $this->Flash->success(__('The user perfi has been deleted.'));
        } else {
            $this->Flash->error(__('The user perfi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
