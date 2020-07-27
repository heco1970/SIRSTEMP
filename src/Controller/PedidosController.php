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

            $validOps = ['id', 'pessoa_id', 'createdfirst', 'createdlast'];
            $convArray = [
                'id' => $model.'.id',
                'pessoa_id' => $model.'.pessoa_id',
                'createdfirst' => $model.'.created',
                'createdlast' => $model.'.created'
            ];
            $strings = ['pessoa_id'];
            $date_start = ['createdfirst']; //data inicial
            $date_end = ['createdlast'];  //data final

            // $contain = ['Types'];
            $contain = ['Pessoas'];
            $conditions = [];
      
            $totalRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

            $parsedQueries = $this->Dynatables->parseQueries($query, $validOps, $convArray, $strings, $date_start, $date_end);

            $conditions = array_merge($conditions,$parsedQueries);
            $queryRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

            $sorts = $this->Dynatables->parseSorts($query,$validOps,$convArray);
            $records = $this->$model->find('all')->where($conditions)->contain($contain)->order($sorts)->limit($query['perPage'])->offset($query['offset'])->page($query['page']);
            //$this->log($records,'debug');
            $this->set(compact('totalRecordsCount', 'queryRecordsCount', 'records'));
        } else {
            //$types = $this->Users->Types->find('list', ['limit' => 200]);
            //$this->set(compact('types'));
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
            'contain' => ['Processos', 'Pessoas', 'States']
        ]);

        $this->set('pedido', $pedido);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pedido = $this->Pedidos->newEntity();
        if ($this->request->is('post')) {
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->getData());
            if ($this->Pedidos->save($pedido)) {
                $this->Flash->success(__('O registro foi gravado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O registro não foi gravado. Tente novamente.'));
        } else if ($this->request->is('ajax')) {
            $this->autoRender = false;   
            if (!empty($this->request->query['term'])) {
              $term = h($this->request->query['term']);
              $pessoas = $this->Pedidos->Pessoas->find('list', ['keyField' => 'id', 'valueField' => 'nome', 'conditions' => ['nome LIKE' => '%' . $term . '%' ],'limit' => 20]);
              $result = [];
              foreach ($pessoas as $id => $name) {
                $result[] = ['text' => $name, 'id' => $id];
              }
              echo json_encode(['results' => $result]);
              return;
            }
        }
        $processos = $this->Pedidos->Processos->find('list', ['limit' => 200]);



        $states = $this->Pedidos->States->find('list', ['limit' => 200]);
        $this->set(compact('pedido', 'processos', 'pessoas', 'states'));
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
                $this->Flash->success(__('O registro foi gravado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O registro não foi gravado. Tente novamente.'));
        }
        $processos = $this->Pedidos->Processos->find('list', ['limit' => 200]);
        $pessoas = $this->Pedidos->Pessoas->find('list', ['limit' => 200]);
        $states = $this->Pedidos->States->find('list', ['limit' => 200]);
        $this->set(compact('pedido', 'processos', 'pessoas', 'states'));
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
        $this->request->allowMethod(['post', 'delete']);
        $pedido = $this->Pedidos->get($id);
        if ($this->Pedidos->delete($pedido)) {
            $this->Flash->success(__('O registro foi apagado.'));
        } else {
            $this->Flash->error(__('O registro não foi apagado. Tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function xls() {
        $out = explode(',', $_COOKIE["Filtro"]);
        $arr = array();
        $nome = 'Pessoas.nome LIKE "%'.$out[0].'%"';

        if($out[0] != null){
            array_push($arr, $nome);
        }
        if($arr == null){
            $pedidos = $this->Pedidos->find('all')->contain(['Pessoas']);
        }
        else{
            $pedidos = $this->Pedidos->find('all', array('conditions'=>$arr))->contain(['Pessoas']);
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

        foreach(range('A','B') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $spreadsheet->getActiveSheet()->getStyle('A1:B1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('74A0F9');
        
        $writer = new Xlsx($spreadsheet);
        $writer->save($path);

        $this->response->withType("application/vnd.ms-excel");
        return $this->response->withFile($path, array('download' => true, 'name' => 'Lista_Pedidos.xlsx'));
    }
}
