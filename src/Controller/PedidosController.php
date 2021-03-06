<?php

namespace App\Controller;

use App\Controller\AppController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Cake\ORM\TableRegistry;
use Cake\ORM\Table;

ob_start();

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

            $validOps = ['id', 'pessoa', 'processo', 'equiparesponsavel', 'state', 'pedidostype', 'datarecepcao', 'datatermoprevisto', 'dataefectivatermo'];
            $convArray = [
                'id' => $model . '.id',
                'pessoa' => 'Pessoas.nome',
                'processo' => 'Processos.processo_id',
                'equiparesponsavel' => 'Teams.id',
                'pedidostype' => 'Pedidostypes.id',
                'state' => $model . '.state_id',
                'datarecepcao' => $model . '.datarecepcao',
                'datatermoprevisto' => $model . '.datatermoprevisto',
                'dataefectivatermo' => $model . '.dataefectivatermo'
            ];
            $strings = ['pessoa', 'processo', 'pedidostype', 'equiparesponsavel', 'datarecepcao', 'datarecepcao', 'datatermoprevisto', 'dataefectivatermo'];
            $date_start = []; //data inicial
            $date_end = [];  //data final

            $contain = ['Processos', 'Pessoas', 'States', 'PedidosMotives', 'Pais', 'Teams', 'Pedidostypes'];
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
            $teams = $this->Pedidos->teams->find('list', array(
                'keyField' => 'id',
                'valueField' => 'nome'
            ))->toArray();
            $PedidosTypes = $this->Pedidos->PedidosTypes->find('list', array(
                'keyField' => 'id',
                'valueField' => 'descricao'
            ))->toArray();
            $this->set(compact('PedidosTypes', 'teams', 'estados'));
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
        $value = $this->request->getQuery('pessoa');

        $pedido = $this->Pedidos->get($id, [
            'contain' => ['Processos', 'Pessoas', 'States', 'Pedidostypes', 'Pedidosmotives', 'Pais', 'Teams']
        ]);
        $this->set('pedido', $pedido);
        $this->set(compact('value'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $pedido = $this->Pedidos->newEntity();
        $id = $id;

        $errors = null;
        $errors1 = null;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->getData());

            $processo_nome = $this->request->getData('processo_id');

             /*$processo_id = $this->Pedidos->Processos->find()->where(['processo_id' => $processo_nome])->select('id')->first();
            if (empty($processo_id)) {
                $errors1 = 1;
            } 

            $pedido->processo_id = $processo_id['id']; */

            if ($pedido->pais_id != 193) {
                $pedido->concelho_id = null;
            }

            if ($this->Pedidos->save($pedido)) {
                $this->Flash->success(__('O registo foi gravado.'));

                if (isset($_GET['pessoa'])) {
                    $this->redirect(array('controller' => 'Pessoas', 'action' => 'view/' . $_GET['pessoa']));
                } else {
                    return $this->redirect(['action' => 'index']);
                }
            } else {
                $this->Flash->error(__('O registo n??o foi gravado. Tente novamente.'));
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

        if ($id != null) {
            $pessoa = $this->Pedidos->Pessoas->get($id);
        }
        $this->set('pessoa', $pessoa);

        $data = [];
        $lista = $this->Pedidos
            ->find()
            ->select(['id'])
            ->order(['id' => 'DESC']);

        foreach ($lista as $pedido) {
            $data[] = ['id' => $pedido->id];
        }

        $idUltimoRegisto = array_sum($data[0]);
        $idProximoRegisto = $idUltimoRegisto + 1;
        $this->set('nextPedido', $idProximoRegisto);

        $processos = $this->Pedidos->Processos->find('list', ['keyField' => 'id', 'valueField' => 'processo_id']);
        $pessoas = $this->Pedidos->Pessoas->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $states = $this->Pedidos->States->find('list', ['keyField' => 'id', 'valueField' => 'designacao']);
        $pedidostypes = $this->Pedidos->PedidosTypes->find('list', ['keyField' => 'id', 'valueField' => 'descricao']);
        $pedidosmotives = $this->Pedidos->PedidosMotives->find('list', ['keyField' => 'id', 'valueField' => 'descricao']);
        $teams = $this->Pedidos->Teams->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $pais = $this->Pedidos->Pais->find('list', ['keyField' => 'id', 'valueField' => 'paisNome']);
        $concelhos = $this->Pedidos->Concelhos->find('list', ['keyField' => 'id', 'valueField' => 'Designacao']);
        $entradas = $this->Pedidos->find('list', ['keyField' => 'id', 'valueField' => 'canalentrada']);

        $this->set(compact('entradas', 'pedido', 'processos', 'errors', 'errors1', 'pessoas', 'pedidostypes', 'pedidosmotives', 'pais', 'teams', 'states', 'concelhos'));
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
        $this->Pedidos->Processos->setDisplayField('processo_id');
        $terms = $this->Pedidos->Processos->find('list')->where(
            ['Processos.processo_id LIKE' => trim($keyword) . '%'],
            ['Processos.processo_id' => 'string']
        )->setTypeMap(['Processos.processo_id' => 'string']);

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
            'contain' => ['CodigosPostais', 'Processos', 'Pessoas', 'States', 'PedidosTypes', 'PedidosMotives', 'Teams', 'Pais']
        ]);

        $this->log($pedido);

        $errors = null;
        $errors1 = null;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->getData());

            $processo_nome = $this->request->getData('processo_id');
            /*$processo_id = $this->Pedidos->Processos->find()->where(['processo_id' => $processo_nome])->select('id');
            if ($processo_id->isEmpty()) {
                $errors1 = 1;
            } 

            $pedido->processo_id = $processo_id; */

            if ($pedido->pais_id != 193) {
                $pedido->concelho_id = null;
            }

            if ($this->Pedidos->save($pedido)) {
                $this->Flash->success(__('O registo foi gravado.'));

                if (isset($_GET['pessoa'])) {
                    $this->redirect(array('controller' => 'Pessoas', 'action' => 'view/' . $_GET['pessoa']));
                } else {
                    return $this->redirect(['action' => 'index']);
                }
            } else {
                $this->Flash->error(__('O registo n??o foi gravado. Tente novamente.'));
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

        $entradas = $this->Pedidos->find('list', ['keyField' => 'id', 'valueField' => 'canalentrada']);
        $processos = $this->Pedidos->Processos->find('list', ['keyField' => 'id', 'valueField' => 'processo_id']);
        $pessoas = $this->Pedidos->Pessoas->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $states = $this->Pedidos->States->find('list', ['keyField' => 'id', 'valueField' => 'designacao']);
        $pedidostypes = $this->Pedidos->PedidosTypes->find('list', ['keyField' => 'id', 'valueField' => 'descricao']);
        $pedidosmotives = $this->Pedidos->PedidosMotives->find('list', ['keyField' => 'id', 'valueField' => 'descricao']);
        $teams = $this->Pedidos->Teams->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $pais = $this->Pedidos->Pais->find('list', ['keyField' => 'id', 'valueField' => 'paisNome']);
        $concelhos = $this->Pedidos->Concelhos->find('list', ['keyField' => 'id', 'valueField' => 'Designacao']);
        $codigosPostais = $this->Pedidos->CodigosPostais->find('list', ['keyField' => 'id', 'valueField' => 'NomeLocalidade'])->where(['id' => $pedido['codigos_postai']['id']]);

        $this->set(compact('codigosPostais', 'entradas', 'pedido', 'processos', 'errors', 'errors1', 'pessoas', 'pedidostypes', 'pedidosmotives', 'pais', 'teams', 'states', 'concelhos'));
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
            $this->Flash->error(__('O registo n??o foi apagado. Tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function xls()
    {
        $out = explode(',', $_COOKIE["Filtro"]);
        $arr = array();

        if (!empty($out)) {
            $id = 'Pedidos.id LIKE "%' . $out[0] . '%"';
            $processo = 'processo_id LIKE "%' . $out[1] . '%"';
            $nome = 'Pessoas.nome LIKE "%' . $out[2] . '%"';
            $equipa = 'Teams.id LIKE "%' . $out[3] . '%"';
            $tipo = 'Pedidostypes.id LIKE "%' . $out[4] . '%"';
        }

        if ($out[0] != null) {
            array_push($arr, $id);
        }
        if ($out[1] != null) {
            array_push($arr, $processo);
        }
        if ($out[2] != null) {
            array_push($arr, $nome);
        }
        if ($out[3] != null) {
            array_push($arr, $equipa);
        }
        if ($out[4] != null) {
            array_push($arr, $tipo);
        }
        if ($arr == null) {
            $pedidos = $this->Pedidos->find('all')->contain(['Pessoas', 'Pedidostypes', 'Teams', 'States']);
        } else {
            $pedidos = $this->Pedidos->find('all', array('conditions' => $arr))->contain(['Pessoas', 'Pedidostypes', 'Teams', 'States']);
        }

        $this->autoRender = false;
        $path = TMP . "pedidos.xlsx";

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Processo');
        $sheet->setCellValue('C1', 'Nome');
        $sheet->setCellValue('D1', 'Data de Rece????o');
        $sheet->setCellValue('E1', 'Equipa Respons??vel');
        $sheet->setCellValue('F1', 'Estado');
        $sheet->setCellValue('G1', 'Data termo previsto');
        $sheet->setCellValue('H1', 'Data termo efetivo');

        $linha = 2;
        foreach ($pedidos as $row) {
            $sheet->setCellValue('A' . $linha, $row->id);
            $sheet->setCellValue('B' . $linha, $row->processo_id);
            $sheet->setCellValue('C' . $linha, $row->pessoa->nome);
            $sheet->setCellValue('D' . $linha, $row->datarecepcao);
            $sheet->setCellValue('E' . $linha, $row->team->nome);
            $sheet->setCellValue('F' . $linha, $row->state->designacao);
            $sheet->setCellValue('G' . $linha, $row->datatermoprevisto);
            $sheet->setCellValue('H' . $linha, $row->datainicioefectivo);
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

    public function freguesiasByConselhos($concID = 0)
    {
        $this->autoRender = false;
        $this->log($concID);
        $search = h($this->request->getQuery('term'));
        $concelhoSelecionadoID = $concID;
        $freguesia = $this->request->getData('codigos_postai_id');
        $concelhos = null;
        $data = [];

        if ($freguesia == null) {
            $concelhos = $this->Pedidos->CodigosPostais->Concelhos
                ->find()
                ->where(['id like' => $concelhoSelecionadoID . '%']);

            foreach ($concelhos as $conc) {
                $freguesia = $this->Pedidos->CodigosPostais
                    ->find()
                    ->select(['id', 'NomeLocalidade'])
                    ->where(['CodigoConcelho like' => $conc->CodigoConcelho . '%', 'NomeLocalidade like' => $search . '%'])
                    ->group('NomeLocalidade')
                    ->order(['NomeLocalidade' => 'ASC']);
            }

            if (is_array($freguesia) || is_object($freguesia)) {
                foreach ($freguesia as $freg) {
                    $data[] = ['id' => $freg->id, 'text' => $freg->NomeLocalidade];
                }
            }
        } else {
            $concelhos = $this->Pedidos->CodigosPostais->Concelhos
                ->find()
                ->where(['id' => $this->Pedidos['codigos_postai']['CodigoConcelho']]);

            foreach ($concelhos as $conc) {
                $freguesia = $this->Pedidos->CodigosPostais
                    ->find()
                    ->select(['id', 'NomeLocalidade'])
                    ->where(['CodigoConcelho like' => $conc->CodigoConcelho . '%', 'NomeLocalidade like' => $search . '%'])
                    ->group('NomeLocalidade')
                    ->order(['NomeLocalidade' => 'ASC']);
            }

            if (is_array($freguesia) || is_object($freguesia)) {
                foreach ($freguesia as $freg) {
                    $data[] = ['id' => $freg->id, 'text' => $freg->NomeLocalidade];
                }
            }
        }

        $this->log($concelhos);

        $data = ['results' => $data];
        echo json_encode($data);
    }
}
