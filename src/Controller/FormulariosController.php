<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Formularios Controller
 *
 * @property \App\Model\Table\FormulariosTable $Formularios
 *
 * @method \App\Model\Entity\Formulario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FormulariosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        // $formularios = $this->paginate($this->Formularios);
        // $this->set(compact('formularios'));

        if ($this->request->is('ajax')) {
            $model = 'Formularios';
            $this->loadComponent('Dynatables');
      
            $query = $this->Dynatables->setDefaultDynatableRequestValues($this->request->getQueryParams());
          
            $validOps = ['id', 'dr_ds', 'nome_prestador_trabalho', 'actividade_exercida'];
            $convArray = [
              'id' => $model.'.id',
              'dr_ds' => $model.'.dr_ds',
              'nome_prestador_trabalho' => $model.'.nome_prestador_trabalho',
              'actividade_exercida' => $model.'.actividade_exercida'
            ];

            $strings = [ 'dr_ds', 'nome_prestador_trabalho', 'actividade_exercida'];
      
            $conditions = $contain = [];
          
            $totalRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();
            
            $parsedQueries = $this->Dynatables->parseQueries($query, $validOps, $convArray, $strings, '', '');
      
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
     * @param string|null $id Formulario id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formulario = $this->Formularios->get($id, [
            'contain' => []
        ]);

        $this->set('formulario', $formulario);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formulario = $this->Formularios->newEntity();
        if ($this->request->is('post')) {
            $formulario = $this->Formularios->patchEntity($formulario, $this->request->getData());
            if ($this->Formularios->save($formulario)) {
                $this->Flash->success(__('O registo foi gravado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O registo não foi gravado. Tente novamente.'));
        }
        
        $this->set('teams', $this->Formularios->Teams->find('list', ['keyField' => 'id', 'valueField' => 'nome']));
        $this->set('pedidos', $this->Formularios->Pedidos->find('list', ['keyField' => 'id', 'valueField' => 'id']));
        $this->set(compact('formulario'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Formulario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formulario = $this->Formularios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formulario = $this->Formularios->patchEntity($formulario, $this->request->getData());
            if ($this->Formularios->save($formulario)) {
                $this->Flash->success(__('O registo foi gravado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O registo não foi gravado. Tente novamente.'));
        }
        $this->set('teams', $this->Formularios->Teams->find('list', ['keyField' => 'id', 'valueField' => 'nome']));
        $this->set('pedidos', $this->Formularios->Pedidos->find('list', ['keyField' => 'id', 'valueField' => 'id']));
        $this->set(compact('formulario'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Formulario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $formulario = $this->Formularios->get($id);
        if ($this->Formularios->delete($formulario)) {
            $this->Flash->success(__('O registo foi apagado.'));
        } else {
            $this->Flash->error(__('O registo não foi apagado. Tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);      
    }

    public function xls()
    {

    }
}
