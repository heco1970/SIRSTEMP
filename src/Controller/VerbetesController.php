<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Verbetes Controller
 *
 * @property \App\Model\Table\VerbetesTable $Verbetes
 *
 * @method \App\Model\Entity\Verbete[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VerbetesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->request->is('ajax')) {
            $model = 'Vernetes';
            $this->loadComponent('Dynatables');

            $query = $this->Dynatables->setDefaultDynatableRequestValues($this->request->getQueryParams());

            $validOps = ['id', 'pessoa_id', 'created', 'modified'];
            $convArray = ['id' => $model . '.id',
                'pessoa_id' => $model . '.pessoa_id',
                'created' => $model . '.created',
                'modified' => $model . '.modified'];
            $strings = ['pessoa_id'];

            // $contain = ['Types'];
            $totalRecordsCount = $this->$model->find('all')->count();
            $conditions = $this->Dynatables->parseQueries($query, $validOps, $convArray, $strings);
            $queryRecordsCount = $this->$model->find('all')->count();
            $sorts = $this->Dynatables->parseSorts($query, $validOps, $convArray);
            $records = $this->$model->find('all')->order($sorts)->limit($query['perPage'])->offset($query['offset'])->page($query['page']);
            $this->set(compact('totalRecordsCount', 'queryRecordsCount', 'records'));
        } else {
            //$types = $this->Users->Types->find('list', ['limit' => 200]);
            //$this->set(compact('types'));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Verbete id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $verbete = $this->Verbetes->get($id, [
            'contain' => ['Pessoas', 'Estados', 'Pedidos']
        ]);

        $this->set('verbete', $verbete);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $verbete = $this->Verbetes->newEntity();
        if ($this->request->is('post')) {
            $verbete = $this->Verbetes->patchEntity($verbete, $this->request->getData());
            if ($this->Verbetes->save($verbete)) {
                $this->Flash->success(__('The verbete has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The verbete could not be saved. Please, try again.'));
        }



        $pessoas = $this->Verbetes->Pessoas->find('list', ['keyField' => 'id', 'valueField' => 'nome'])->toArray();
        $estados = $this->Verbetes->Estados->find('list', ['keyField' => 'id', 'valueField' => 'designacao'])->toArray();
        $pedidos = $this->Verbetes->Pedidos->find('list', ['limit' => 200]);
        $this->set(compact('verbete', 'pessoas', 'estados', 'pedidos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Verbete id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $verbete = $this->Verbetes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $verbete = $this->Verbetes->patchEntity($verbete, $this->request->getData());
            if ($this->Verbetes->save($verbete)) {
                $this->Flash->success(__('The verbete has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The verbete could not be saved. Please, try again.'));
        }
        $pessoas = $this->Verbetes->Pessoas->find('list', ['limit' => 200]);
        $estados = $this->Verbetes->Estados->find('list', ['limit' => 200]);
        $pedidos = $this->Verbetes->Pedidos->find('list', ['limit' => 200]);
        $this->set(compact('verbete', 'pessoas', 'estados', 'pedidos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Verbete id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $verbete = $this->Verbetes->get($id);
        if ($this->Verbetes->delete($verbete)) {
            $this->Flash->success(__('The verbete has been deleted.'));
        } else {
            $this->Flash->error(__('The verbete could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
