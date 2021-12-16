<?php

namespace App\Controller;

use App\Controller\AppController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Cake\Datasource\ConnectionManager;

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

            $validOps = ['pedido', 'equipa', 'nome_prestador_trabalho', 'designacao_entidade'];
            $convArray = [
                'pedido' => $model . '.id_pedido',
                'equipa' => $model . '.id_equipa',
                'nome_prestador_trabalho' => $model . '.nome_prestador_trabalho',
                'designacao_entidade' => $model . '.designacao_entidade',
            ];

            $strings = ['nome_prestador_trabalho', 'designacao_entidade'];

            $contain = ['Pedidos', 'Teams'];
            $conditions = [];

            $totalRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

            $parsedQueries = $this->Dynatables->parseQueries($query, $validOps, $convArray, $strings, [], []);

            $conditions = array_merge($conditions, $parsedQueries);
            $queryRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

            $sorts = $this->Dynatables->parseSorts($query, $validOps, $convArray);
            $records = $this->$model->find('all')->where($conditions)->contain($contain)->order($sorts)->limit($query['perPage'])->offset($query['offset'])->page($query['page']);
            $this->set(compact('totalRecordsCount', 'queryRecordsCount', 'records'));
        } else {
            $pedido = $this->Formularios->Pedidos->find('list', array(
                'keyField' => 'id',
                'valueField' => 'id'
            ))->toArray();

            $equipa = $this->Formularios->Teams->find('list', array(
                'keyField' => 'id',
                'valueField' => 'nome'
            ))->toArray();
            $this->set(compact('pedido', 'equipa'));
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
            'contain' => ['Teams', 'Pedidos']
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
        $out = explode(',', $_COOKIE["Filtro"]);
        $arr = array();
        $this->log($out);

        if (!empty($out)) {
            $pedido = 'Pedidos.id LIKE "%' . $out[0] . '%"';
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
        return $this->response->withFile($path, array('download' => true, 'name' => 'Lista_Pedidos.xlsx'));
    }

    public function idPedidoAutoComplete()
    {
        $this->autoRender = false;
        $this->loadModel('Pedidos');
        $query = $this->request->getQueryParams();

        if (!empty($query['search'])) {

            $connection = ConnectionManager::get('default');

            $pedidos = $connection->execute("SELECT id FROM pedidos WHERE id LIKE '%" . h($query['search']) . "%'")->fetchAll('assoc');

            $pedidostosend = [];

            foreach ($pedidos as $pedido) {
                array_push($pedidostosend, [
                    "id" => $pedido['id'],
                    "text" => $pedido['id']
                ]);
            }
        }

        echo json_encode(['results' => $pedidostosend], JSON_UNESCAPED_UNICODE);
    }
}
