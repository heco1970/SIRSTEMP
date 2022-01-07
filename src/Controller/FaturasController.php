<?php

namespace App\Controller;

use App\Controller\AppController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

    public function pdf()
    {
        // Recolhe dados do json
        $name = "Registo de Faturas/Custas";        // Nome do ficheiro
        $mode = "P";                                // Modo do ficheiro
        $pageize = "A3";                                                                                          // Tamanho do ficheiro
        $header = array('Nº', 'Valor', 'Entidade Judicial', 'Estado Pagamento', 'Data');             // Cabeçalho para a tabela
        $size = array(20, 45, 60, 60, 60);                                                                        // Tamanho do cabeçalho

        $out = explode(',', $_COOKIE["Filtro"]);
        $arr = array();

        if (!empty($out)) {
            $num_fatura = 'num_fatura LIKE "%' . $out[0] . '%"';
            $valor = 'valor LIKE "%' . $out[1] . '%"';
            $id_entidadejudiciai = 'id_entidade LIKE "%' . $out[2] . '%"';
            $id_pagamento = 'id_pagamento LIKE "%' . $out[3] . '%"';
            $data = 'data LIKE "%' . $out[4] . '%"';
        }

        if ($out[0] != null) {
            array_push($arr, $num_fatura);
        }
        if ($out[1] != null) {
            array_push($arr, $valor);
        }
        if ($out[2] != null) {
            array_push($arr, $id_entidadejudiciai);
        }
        if ($out[3] != null) {
            array_push($arr, $id_pagamento);
        }
        if ($out[4] != null) {
            array_push($arr, $data);
        }
        if ($arr == null) {
            $recordsFaturas = $this->Faturas->find('all')->contain(['Pagamentos', 'Entidadejudiciais'])->toArray();
        } else {
            $recordsFaturas = $this->Faturas->find('all', array('conditions' => $arr))->contain(['Pagamentos', 'Entidadejudiciais'])->toArray();
        }

        $records = [];

        // Construção de linha para cada registo recebido
        foreach ($recordsFaturas as $row) {
            $valor = number_format($row->valor, 2, '.', '');
            $records[$row->id] =
                [
                    $row->num_fatura,
                    //$row->valor . '€',
                    $valor .'€',
                    $row->entidadejudiciai->descricao,
                    $row->pagamento->estado,
                    (isset($row->data) ? $row->data->i18nFormat('dd/MM/yyyy') : "")
                ];
        }

        $this->set(compact('name', 'mode', 'pageize', 'header', 'size', 'records'));     // Enviar dados do json para o pdf
        $this->render('/Pdf/layout_1');                                                 // Localizção do layout do pdf 1

        // Renderização do documento utilizando o template desenvolvido para o efeito
        return $this->response->withHeader('Content-Type', 'application/pdf');
    }

    public function xls()
    {
        $out = explode(',', $_COOKIE["Filtro"]);
        $arr = array();
        // $this->log($out);

        if (!empty($out)) {
            $num_fatura = 'num_fatura LIKE "%' . $out[0] . '%"';
            $valor = 'valor LIKE "%' . $out[1] . '%"';
            $id_entidadejudiciai = 'id_entidade LIKE "%' . $out[2] . '%"';
            $id_pagamento = 'id_pagamento LIKE "%' . $out[3] . '%"';
            $data = 'data LIKE "%' . $out[4] . '%"';
        }

        if ($out[0] != null) {
            array_push($arr, $num_fatura);
        }
        if ($out[1] != null) {
            array_push($arr, $valor);
        }
        if ($out[2] != null) {
            array_push($arr, $id_entidadejudiciai);
        }
        if ($out[3] != null) {
            array_push($arr, $id_pagamento);
        }
        if ($out[4] != null) {
            array_push($arr, $data);
        }
        if ($arr == null) {
            $recordsFaturas = $this->Faturas->find('all')->contain(['Pagamentos', 'Entidadejudiciais']);
        } else {
            $recordsFaturas = $this->Faturas->find('all', array('conditions' => $arr))->contain(['Pagamentos', 'Entidadejudiciais']);
        }

        $this->autoRender = false;
        $path = TMP . "faturas.xlsx";

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Nº Fatura/Custa');
        $sheet->setCellValue('B1', 'Valor');
        $sheet->setCellValue('C1', 'Entidade Judicial');
        $sheet->setCellValue('D1', 'Estado Pagamento');
        $sheet->setCellValue('E1', 'Data');

        $linha = 2;
        foreach ($recordsFaturas as $row) {
            $sheet->setCellValue('A' . $linha, $row->num_fatura);
            $sheet->setCellValue('B' . $linha, $row->valor . '€');
            $sheet->setCellValue('C' . $linha, $row->entidadejudiciai->descricao);
            $sheet->setCellValue('D' . $linha, $row->pagamento->estado);
            $sheet->setCellValue('E' . $linha, (isset($row->data) ? $row->data->i18nFormat('dd/MM/yyyy') : ""));
            $linha++;
        }

        foreach (range('A', 'H') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $spreadsheet->getActiveSheet()->getStyle('A1:H1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('74A0F9');

        $writer = new Xlsx($spreadsheet);
        $writer->save($path);

        $this->response->withType("application/vnd.ms-excel");
        return $this->response->withFile($path, array('download' => true, 'name' => 'Lista_Faturas.xlsx'));
    }
}
