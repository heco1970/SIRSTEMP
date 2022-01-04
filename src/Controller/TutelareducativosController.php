<?php

namespace App\Controller;

use App\Controller\AppController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Cake\Datasource\ConnectionManager;

/**
 * Tutelareducativos Controller
 *
 * @property \App\Model\Table\TutelareducativosTable $Tutelareducativos
 *
 * @method \App\Model\Entity\Tutelareducativo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TutelareducativosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->request->is('ajax')) {
            $model = 'Tutelareducativos';
            $this->loadComponent('Dynatables');

            $query = $this->Dynatables->setDefaultDynatableRequestValues($this->request->getQueryParams());

            $validOps = ['id', 'pedido', 'equipa', 'nome_jovem', 'designacao_entidade', 'nif', 'data_nascimento', 'data_inicio'];
            $convArray = [
                'id' => $model . '.id',
                'pedido' => $model . '.id_pedido',
                'equipa' => $model . '.id_equipa',
                'nome_jovem' => $model . '.nome_jovem',
                'designacao_entidade' => $model . '.designacao_entidade',
                'data_nascimento' => $model . '.data_nascimento',
                'data_inicio' => $model . '.data_inicio',
            ];

            $strings = ['nome_jovem', 'designacao_entidade'];

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
            $pedido = $this->Tutelareducativos->Pedidos->find('list', array(
                'keyField' => 'id',
                'valueField' => 'id'
            ))->toArray();

            $equipa = $this->Tutelareducativos->Teams->find('list', array(
                'keyField' => 'id',
                'valueField' => 'nome'
            ))->toArray();
            $this->set(compact('pedido', 'equipa'));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Tutelareducativo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tutelareducativo = $this->Tutelareducativos->get($id, [
            'contain' => ['Teams', 'Pedidos']
        ]);
        $this->set('tutelareducativo', $tutelareducativo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tutelareducativo = $this->Tutelareducativos->newEntity();
        if ($this->request->is('post')) {
            $tutelareducativo = $this->Tutelareducativos->patchEntity($tutelareducativo, $this->request->getData());
            if ($this->Tutelareducativos->save($tutelareducativo)) {
                $this->Flash->success(__('O registo foi gravado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O registo não foi gravado. Tente novamente.'));
        }
        $this->set('teams', $this->Tutelareducativos->Teams->find('list', ['keyField' => 'id', 'valueField' => 'nome']));
        $this->set('pedidos', $this->Tutelareducativos->Pedidos->find('list', ['keyField' => 'id', 'valueField' => 'id']));
        $this->set(compact('tutelareducativo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tutelareducativo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tutelareducativo = $this->Tutelareducativos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tutelareducativo = $this->Tutelareducativos->patchEntity($tutelareducativo, $this->request->getData());
            if ($this->Tutelareducativos->save($tutelareducativo)) {
                $this->Flash->success(__('O registo foi gravado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O registo não foi gravado. Tente novamente.'));
        }
        $this->set('teams', $this->Tutelareducativos->Teams->find('list', ['keyField' => 'id', 'valueField' => 'nome']));
        $this->set('pedidos', $this->Tutelareducativos->Pedidos->find('list', ['keyField' => 'id', 'valueField' => 'id']));
        $this->set(compact('tutelareducativo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tutelareducativo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $tutelareducativo = $this->Tutelareducativos->get($id);
        if ($this->Tutelareducativos->delete($tutelareducativo)) {
            $this->Flash->success(__('O registo foi apagado.'));
        } else {
            $this->Flash->error(__('O registo não foi apagado. Tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
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

    public function pdf()
    {
        // Recolhe dados do json
        $name = "Registo Seguro Tutelar Educativo";       // Nome do ficheiro
        $mode = "P";                        // Modo do ficheiro
        $pageize = "A3";                                                                  // Tamanho do ficheiro
        $header = array('ID Pedido', 'Equipa', 'Nome do Jovem', 'NIF', 'Entidade beneficiária');  // Cabeçalho para a tabela
        $size = array(35, 55, 70, 35, 70);                                            // Tamanho do cabeçalho
        $recordsTutelareducativos = $this->Tutelareducativos->find('all')->toArray();                    // Registos para preencher a tabela
        $records = [];

        // Construção de linha para cada registo recebido
        foreach ($recordsTutelareducativos as $row) {
            $records[$row->id] =
                [
                    $row->id_pedido,
                    $row->id_equipa,
                    $row->nome_jovem,
                    $row->nif,
                    $row->designacao_entidade
                ];
        }


        $this->set(compact('name', 'mode', 'pageize', 'header', 'size', 'records'));     // Enviar dados do json para o pdf
        $this->render('/Pdf/layout_1');                                                 // Localizção do layout do pdf 1

        // Renderização do documento utilizando o template desenvolvido para o efeito
        return $this->response->withHeader('Content-Type', 'application/pdf');
    }
}
