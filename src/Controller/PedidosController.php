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

            $validOps = ['id', 'pessoa_id', 'created', 'modified'];
            $convArray = ['id' => $model . '.id',
                'pessoa_id' => $model . '.pessoa_id',
                'created' => $model . '.created',
                'modified' => $model . '.modified'];
            $strings = ['pessoa_id'];

            // $contain = ['Types'];
            $totalRecordsCount = $this->$model->find('all')->count();
            $conditions = $this->Dynatables->parseQueries($query, $validOps, $convArray, $strings);
            $queryRecordsCount = $this->$model->find('all')->count();
            $sorts = $this->Dynatables->parseSorts($query, $validOps, $convArray);
            $records = $this->$model->find('all')->order($sorts)->limit($query['perPage'])->offset($query['offset'])->page($query['page']);
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
                $this->Flash->success(__('The pedido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pedido could not be saved. Please, try again.'));
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
                $this->Flash->success(__('The pedido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pedido could not be saved. Please, try again.'));
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
            $this->Flash->success(__('The pedido has been deleted.'));
        } else {
            $this->Flash->error(__('The pedido could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function xls() {
        $out = explode(',', $_COOKIE["Filtro"]);

        if($out[0] != null && $out[1] != null){
            $pedidos = $this->Pedidos->find('all', 
                array('conditions'=>
                    array('Pedidos.id LIKE'=> $out[0], 'Pessoas.nome LIKE "%'.$out[1].'%"')
                ))->contain(['Pessoas']);

        } elseif($out[1] == null && $out[0] != null){
            $pedidos = $this->Pedidos->find('all', array('conditions'=>array('Pedidos.id LIKE'=> $out[0])))->contain(['Pessoas']);

        } elseif($out[0] == null && $out[1] != null){
            $pedidos = $this->Pedidos->find('all', array('conditions'=>array('Pessoas.nome LIKE "%'.$out[1].'%"')))->contain(['Pessoas']);

        } else{
            $pedidos = $this->Pedidos->find('all')->contain(['Pessoas']);
        }

        $this->autoRender = false;
        $path = TMP . "pedidos.xlsx";
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Pessoa');
        $sheet->setCellValue('C1', 'Data de criação');
        
        $linha = 2;
        foreach ($pedidos as $row) {
            $sheet->setCellValue('A' . $linha, $row->id);
            $sheet->setCellValue('B' . $linha, $row->pessoa->nome);
            $sheet->setCellValue('C' . $linha, $row->created);    
            $linha++;
        }

        foreach(range('A','C') as $columnID) {
            $sheet->getColumnDimension($columnID)
                ->setAutoSize(true);
        }

        $spreadsheet->getActiveSheet()->getStyle('A1:C1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('74A0F9');
        
        $writer = new Xlsx($spreadsheet);
        $writer->save($path);

        $this->response->withType("application/vnd.ms-excel");
        return $this->response->withFile($path, array('download' => true, 'name' => 'Lista_Pedidos.xlsx'));
        
    }
}
