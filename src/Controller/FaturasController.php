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
                'data_emissao' => $model . '.data_emissao',
                'valor' => $model . '.valor',
                'data_pagamento' => $model . '.data_pagamento',
                'ref_pagamento' => $model . '.ref_pagamento',
                'ultima_alteracao' => $model . '.ultima_alteracao',
                'utilizador' => $model . '.utilizador',
                'observacoes' => $model . '.observacoes',
                'referencia' => $model . '.referencia',
                'data' => $model . '.data',
            ];

            $strings = ['ref_pagamento', 'utilizador', 'observacoes', 'referencia'];

            $contain = ['Entidadejudiciais', 'Units', 'Pagamentos'];
            $conditions = [];

            $totalRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

            $parsedQueries = $this->Dynatables->parseQueries($query, $validOps, $convArray, $strings, [], []);

            $conditions = array_merge($conditions, $parsedQueries);
            $queryRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

            $sorts = $this->Dynatables->parseSorts($query, $validOps, $convArray);
            $records = $this->$model->find('all')->where($conditions)->contain($contain)->order($sorts)->limit($query['perPage'])->offset($query['offset'])->page($query['page']);
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

    public function xls()
    {
        $out = explode(',', $_COOKIE["Filtro"]);
        $arr = array();
        // $this->log($out);

        if (!empty($out)) {
            $pedido = 'Pedidos.id LIKE "' . $out[0] . '"';
            $equipa = 'Teams.id LIKE "%' . $out[1] . '%"';
            $nome_prestador_trabalho = 'nome_prestador_trabalho LIKE "%' . $out[2] . '%"';
            $designacao_entidade = 'designacao_entidade LIKE "%' . $out[3] . '%"';
        }

        if ($out[0] != null) {
            array_push($arr, $pedido);
        }
        if ($out[1] != null) {
            array_push($arr, $equipa);
        }
        if ($out[2] != null) {
            array_push($arr, $nome_prestador_trabalho);
        }
        if ($out[3] != null) {
            array_push($arr, $designacao_entidade);
        }
        if ($arr == null) {
            $formularios = $this->Formularios->find('all')->contain(['Teams', 'Pedidos']);
        } else {
            $formularios = $this->Formularios->find('all', array('conditions' => $arr))->contain(['Teams', 'Pedidos']);
        }

        $this->autoRender = false;
        $path = TMP . "pedidos.xlsx";

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Pedido');
        $sheet->setCellValue('B1', 'Equipa');
        $sheet->setCellValue('C1', 'Nome do Prestador de Trabalho/Tarefa');
        $sheet->setCellValue('D1', 'Designação da Entidade Beneficiária de Trabalho/Tarefa ');

        $linha = 2;
        foreach ($formularios as $row) {
            $sheet->setCellValue('A' . $linha, $row->pedido->id);
            $sheet->setCellValue('B' . $linha, $row->team->nome);
            $sheet->setCellValue('C' . $linha, $row->nome_prestador_trabalho);
            $sheet->setCellValue('D' . $linha, $row->designacao_entidade);
            $linha++;
        }

        foreach (range('A', 'H') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $spreadsheet->getActiveSheet()->getStyle('A1:H1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('74A0F9');

        $writer = new Xlsx($spreadsheet);
        $writer->save($path);

        $this->response->withType("application/vnd.ms-excel");
        return $this->response->withFile($path, array('download' => true, 'name' => 'Lista_Formularios.xlsx'));
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
            'contain' => ['Entidadejudiciais', 'Units', 'Pagamentos']
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
            $fatura->valor = substr($this->request->getData('valor'), 0, -2);

            if ($this->Faturas->save($fatura)) {
                $this->Flash->success(__('The fatura has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fatura could not be saved. Please, try again.'));
        }

        $this->set('unidades', $this->Faturas->Units->find('list', ['keyField' => 'id', 'valueField' => 'designacao']));
        $this->set('entidades', $this->Faturas->Entidadejudiciais->find('list', ['keyField' => 'id', 'valueField' => 'descricao']));
        $this->set('pagamentos', $this->Faturas->Pagamentos->find('list', ['keyField' => 'id', 'valueField' => 'estado']));
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
            $fatura->valor = substr($this->request->getData('valor'), 0, -2);

            if ($this->Faturas->save($fatura)) {
                $this->Flash->success(__('The fatura has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fatura could not be saved. Please, try again.'));
        }
        $this->set('unidades', $this->Faturas->Units->find('list', ['keyField' => 'id', 'valueField' => 'designacao']));
        $this->set('entidades', $this->Faturas->Entidadejudiciais->find('list', ['keyField' => 'id', 'valueField' => 'descricao']));
        $this->set('pagamentos', $this->Faturas->Pagamentos->find('list', ['keyField' => 'id', 'valueField' => 'estado']));
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
        $fatura = $this->Faturas->get($id);
        if ($this->Faturas->delete($fatura)) {
            $this->Flash->success(__('The fatura has been deleted.'));
        } else {
            $this->Flash->error(__('The fatura could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
