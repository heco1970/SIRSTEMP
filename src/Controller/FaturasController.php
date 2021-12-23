<?php

namespace App\Controller;

use App\Controller\AppController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Cake\Datasource\ConnectionManager;

/**
 * Faturas Controller
 *
 * @property \App\Model\Table\FaturasTable $Faturas
 *
 * @method \App\Model\Entity\Fatura[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FaturasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        /* $faturas = $this->paginate($this->Faturas);
        $this->set(compact('faturas')); */

        if ($this->request->is('ajax')) {
            $model = 'Faturas';
            $this->loadComponent('Dynatables');

            $query = $this->Dynatables->setDefaultDynatableRequestValues($this->request->getQueryParams());

            $validOps = ['id', 'entidadejudicial', 'unidade', 'pagamento', 'num_fatura', 'nip', 'data_emissao', 'valor', 'data_pagamento', 'ref_pagamento', 'ultima_alteracao', 'utilizador', 'observacoes', 'referencia', 'data'];
            $convArray = [
                'id' => $model . '.id',
                'entidadejudicial' => $model . '.id_entidade',
                'unidade' => $model . '.id_unidade',
                'pagamento' => $model . '.id_pagamento',
                'nip' => $model . '.nip',
                'num_fatura' => $model . '.num_fatura',
                // 'data_emissao' => $model . '.data_emissao',
                'valor' => $model . '.valor',
                // 'data_pagamento' => $model . '.data_pagamento',
                'ref_pagamento' => $model . '.ref_pagamento',
                // 'ultima_alteracao' => $model . '.ultima_alteracao',
                // 'utilizador' => $model . '.utilizador',
                // 'observacoes' => $model . '.observacoes',
                // 'referencia' => $model . '.referencia',
                // 'data' => $model . '.data',
            ];

            $strings = ['nip', 'num_fatura', 'valor', 'ref_pagamento'];

            $contain = ['Entidadejudiciais', 'Units', 'Pagamentos'];
            $conditions = [];

            $totalRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

            $parsedQueries = $this->Dynatables->parseQueries($query, $validOps, $convArray, $strings, [], []);

            $conditions = array_merge($conditions, $parsedQueries);
            $queryRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

            $sorts = $this->Dynatables->parseSorts($query, $validOps, $convArray);
            $records = $this->$model->find('all')->where($conditions)->contain($contain)->order($sorts)->limit($query['perPage'])->offset($query['offset'])->page($query['page']);
            $this->log($records->toArray());
            $this->set(compact('totalRecordsCount', 'queryRecordsCount', 'records'));
        } else {
            $entidadejudicial = $this->Faturas->Entidadejudiciais->find('list', array(
                'keyField' => 'id',
                'valueField' => 'descricao'
            ))->toArray();

            $unidade = $this->Faturas->Units->find('list', array(
                'keyField' => 'id',
                'valueField' => 'designacao'
            ))->toArray();

            $pagamento = $this->Faturas->Pagamentos->find('list', array(
                'keyField' => 'id',
                'valueField' => 'estado'
            ))->toArray();
            $this->set(compact('entidadejudicial', 'unidade', 'pagamento'));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Fatura id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fatura = $this->Faturas->get($id, [
            'contain' => []
        ]);

        $this->set('fatura', $fatura);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fatura = $this->Faturas->newEntity();
        if ($this->request->is('post')) {
            $fatura = $this->Faturas->patchEntity($fatura, $this->request->getData());
            if ($this->Faturas->save($fatura)) {
                $this->Flash->success(__('The fatura has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fatura could not be saved. Please, try again.'));
        }
        $this->set(compact('fatura'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fatura id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fatura = $this->Faturas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fatura = $this->Faturas->patchEntity($fatura, $this->request->getData());
            if ($this->Faturas->save($fatura)) {
                $this->Flash->success(__('The fatura has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fatura could not be saved. Please, try again.'));
        }
        $this->set(compact('fatura'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fatura id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fatura = $this->Faturas->get($id);
        if ($this->Faturas->delete($fatura)) {
            $this->Flash->success(__('The fatura has been deleted.'));
        } else {
            $this->Flash->error(__('The fatura could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
