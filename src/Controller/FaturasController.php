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

    /* public function xls()
    {
        $out = explode(',', $_COOKIE["Filtro"]);
        $arr = array();

        if (!empty($out)) {
            $id = 'id LIKE "%' . $out[0] . '%"';
            $nome = 'nome LIKE "%' . $out[1] . '%"';
            $cc = 'cc LIKE "%' . $out[2] . '%"';
            $nif = 'nif LIKE "%' . $out[3] . '%"';
            $datanascimento = 'data_nascimento LIKE "%' . $out[4] . '%"';
        }

        if ($out[0] != null) {
            array_push($arr, $id);
        }
        if ($out[1] != null) {
            array_push($arr, $nome);
        }
        if ($out[2] != null) {
            array_push($arr, $cc);
        }
        if ($out[3] != null) {
            array_push($arr, $nif);
        }
        if ($out[4] != null) {
            array_push($arr, $datanascimento);
        }
        if ($arr == null) {
            $pessoas = $this->Pessoas->find('all')->toArray();
        } else {
            $pessoas = $this->Pessoas->find('all', array('conditions' => $arr));
        }

        $this->autoRender = false;
        $path = TMP . "pessoas.xlsx";

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Nome');
        $sheet->setCellValue('B1', 'CC');
        $sheet->setCellValue('C1', 'NIF');
        $sheet->setCellValue('D1', 'Data de nascimento');
        $sheet->setCellValue('E1', 'Data de criação');

        $linha = 2;
        foreach ($pessoas as $row) {
            $sheet->setCellValue('A' . $linha, $row->nome);
            $sheet->setCellValue('B' . $linha, $row->cc);
            $sheet->setCellValue('C' . $linha, $row->nif);
            $sheet->setCellValue('D' . $linha, $row->data_nascimento);
            $sheet->setCellValue('E' . $linha, $row->created);
            $linha++;
        }

        foreach (range('A', 'E') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $spreadsheet->getActiveSheet()->getStyle('A1:E1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('74A0F9');

        $writer = new Xlsx($spreadsheet);
        $writer->save($path);

        $this->response->withType("application/vnd.ms-excel");
        return $this->response->withFile($path, array('download' => true, 'name' => 'Lista_Pessoas.xlsx'));
    } */

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
            $valor = substr($this->request->getData('valor'), 0, -2);  // returns the value without ' €'
            $fatura->valor = $valor;
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
            $valor = substr($this->request->getData('valor'), 0, -2);  // returns the value without ' €'
            $fatura->valor = $valor;
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
