<?php

namespace App\Controller;

use App\Controller\AppController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * Pedidos Controller
 *
 * @property \App\Model\Table\PedidosTable $Pedidos
 *
 * @method \App\Model\Entity\Pedido[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PedidosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->request->is('ajax')) {
            $model = 'Pedidos';
            $this->loadComponent('Dynatables');

            $query = $this->Dynatables->setDefaultDynatableRequestValues($this->request->getQueryParams());

            $validOps = ['id', 'pessoa', 'processo','equiparesponsavel','state','datarecepcao','datatermoprevisto','dataefectivatermo'];
            $convArray = [
                'id' => $model . '.id',
                'pessoa' => 'Pessoas.nome',
                'processo' => 'Processos.nip',
                'equiparesponsavel' => 'Teams.nome',
                'state' => $model.'.state_id',
                'datarecepcao' => $model . '.datarecepcao',
                'datatermoprevisto' => $model . '.datatermoprevisto',
                'dataefectivatermo' => $model . '.dataefectivatermo'
            ];
            $strings = ['pessoa','processo','equiparesponsavel','datarecepcao','datarecepcao','datatermoprevisto','dataefectivatermo'];
            $date_start = []; //data inicial
            $date_end = [];  //data final

            
            $contain = ['Processos', 'Pessoas', 'States', 'PedidosTypes', 'PedidosMotives', 'Pais', 'Teams'];
            $conditions = [];

            $totalRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

            $parsedQueries = $this->Dynatables->parseQueries($query, $validOps, $convArray, $strings, $date_start, $date_end);

            $conditions = array_merge($conditions, $parsedQueries);
            $queryRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

            $sorts = $this->Dynatables->parseSorts($query, $validOps, $convArray);
            $records = $this->$model->find('all')->where($conditions)->contain($contain)->order($sorts)->limit($query['perPage'])->offset($query['offset'])->page($query['page']);
            $this->set(compact('totalRecordsCount', 'queryRecordsCount', 'records'));
        } else {
            $estados = $this->Pedidos->States->find('list', array(
                'keyField' => 'id',
                'valueField' => 'designacao'
            ))->toArray();
            $this->set(compact('estados'));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pedido = $this->Pedidos->get($id, [
            'contain' => ['Processos', 'Pessoas', 'States', 'Pedidostypes', 'Pedidosmotives', 'Pais', 'Teams']
        ]);
        $this->set('pedido', $pedido);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $pedido = $this->Pedidos->newEntity();
        if ($this->request->is('post')) {
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->getData());

            $pessoa_nome = $this->request->getData('pessoa');
            $processo_nome = $this->request->getData('processo');

            $pessoa_id = $this->Pedidos->Pessoas->find()->select(['id'])->where(['nome' => $pessoa_nome]);
            $pedido->pessoa_id = $pessoa_id;

            $pedido->processo_id = $this->Pedidos->Processos->find()->where(['nip' => $processo_nome])->select('id');;


            if ($this->Pedidos->save($pedido)) {
                $this->Flash->success(__('O registo foi gravado.'));

                if($id != null){
                    $this->redirect(array('controller' => 'Pessoas', 'action' => 'view/'.$id));
                }
                else{
                    return $this->redirect(['action' => 'index']);
                }
            }
            else{
                $this->Flash->error(__('O registo não foi gravado. Tente novamente.'));
            }
        } else if ($this->request->is('ajax')) {
            $this->autoRender = false;
            if (!empty($this->request->query['term'])) {
                $term = h($this->request->query['term']);
                $pessoas = $this->Pedidos->Pessoas->find('list', ['keyField' => 'id', 'valueField' => 'nome', 'conditions' => ['nome LIKE' => '%' . $term . '%'], 'limit' => 20]);
                $result = [];
                foreach ($pessoas as $id => $name) {
                    $result[] = ['text' => $name, 'id' => $id];
                }
                echo json_encode(['results' => $result]);
                return;
            }
        }

        $pessoa = [];

        if($id != null){
            $pessoa = $this->Pedidos->Pessoas->get($id);
        }

        $processos = $this->Pedidos->Processos->find('list', ['limit' => 200]);
        $pessoas = $this->Pedidos->Pessoas->find('list', ['limit' => 200]);
        $states = $this->Pedidos->States->find('list', ['limit' => 200]);
        $pedidostypes = $this->Pedidos->PedidosTypes->find('list', ['limit' => 200]);
        $pedidosmotives = $this->Pedidos->PedidosMotives->find('list', ['limit' => 200]);
        $teams = $this->Pedidos->Teams->find('list', ['limit' => 200]);
        $pais = $this->Pedidos->Pais->find('list', ['limit' => 200]);

        $this->set(compact('pedido', 'processos', 'pessoas', 'pessoa', 'pedidostypes', 'pedidosmotives', 'pais', 'teams', 'states'));
    }
    
    public function search()
    {

        $this->request->allowMethod('ajax');

        $keyword = $this->request->getQuery('term');

        $terms = $this->Pedidos->Pessoas->find('list', array(
            'conditions' => array(
                'Pessoas.nome LIKE' => trim($keyword) . '%'
            )
        ));
        echo json_encode($terms);
    }
    public function searchPedido()
    {

        $this->request->allowMethod('ajax');

        $keyword = $this->request->getQuery('term');

        $terms = $this->Pedidos->Processos->find('list', [
            'conditions' => ['Processos.nip LIKE' => trim($keyword) . '%']
        ]);

        echo json_encode($terms);
    }

    public function gestor()
    {
        $this->request->allowMethod('ajax');
        $id = $this->request->getQuery('keyword');
        $this->loadModel('UsersTeams');
        $gestor = $this->UsersTeams->find('list', ['keyField' => function ($row) {
            return $row->user->id;
        }, 'valueField' => function ($row) {
            return $row->user->username;
        }])->contain(['Users'])->where(['UsersTeams.team_id' => $id]);

        $this->set(compact('gestor'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pedido = $this->Pedidos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->getData());
            if ($this->Pedidos->save($pedido)) {
                $this->Flash->success(__('O registo foi gravado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O registo não foi gravado. Tente novamente.'));
        }
        
        $processos = $this->Pedidos->Processos->find('list', ['keyField' => 'id', 'valueField' => 'processo_id']);
        $pessoas = $this->Pedidos->Pessoas->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $states = $this->Pedidos->States->find('list', ['keyField' => 'id', 'valueField' => 'designacao']);
        $pedidostypes = $this->Pedidos->PedidosTypes->find('list', ['keyField' => 'id', 'valueField' => 'descricao']);
        $pedidosmotives = $this->Pedidos->PedidosMotives->find('list', ['keyField' => 'id', 'valueField' => 'descricao']);
        $teams = $this->Pedidos->Teams->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $pais = $this->Pedidos->Pais->find('list', ['keyField' => 'id', 'valueField' => 'paisNome']);

        $this->set(compact('pedido', 'processos', 'pessoas', 'pedidostypes', 'pedidosmotives', 'pais', 'teams', 'states'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $pedido = $this->Pedidos->get($id);
        if ($this->Pedidos->delete($pedido)) {
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
        $nome = 'Pessoas.nome LIKE "%' . $out[0] . '%"';

        if ($out[0] != null) {
            array_push($arr, $nome);
        }
        if ($arr == null) {
            $pedidos = $this->Pedidos->find('all')->contain(['Pessoas']);
        } else {
            $pedidos = $this->Pedidos->find('all', array('conditions' => $arr))->contain(['Pessoas']);
        }

        $this->autoRender = false;
        $path = TMP . "pedidos.xlsx";

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Pessoa');
        $sheet->setCellValue('B1', 'Data de criação');

        $linha = 2;
        foreach ($pedidos as $row) {
            $sheet->setCellValue('A' . $linha, $row->pessoa->nome);
            $sheet->setCellValue('B' . $linha, $row->created);
            $linha++;
        }

        foreach (range('A', 'B') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $spreadsheet->getActiveSheet()->getStyle('A1:B1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('74A0F9');

        $writer = new Xlsx($spreadsheet);
        $writer->save($path);

        $this->response->withType("application/vnd.ms-excel");
        return $this->response->withFile($path, array('download' => true, 'name' => 'Lista_Pedidos.xlsx'));
    }
}
