<?php
namespace App\Controller;

use App\Controller\AppController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * Verbetes Controller
 *
 * @property \App\Model\Table\VerbetesTable $Verbetes
 *
 * @method \App\Model\Entity\Verbete[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VerbetesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->request->is('ajax')) {
            $model = 'Vernetes';
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
     * @param string|null $id Verbete id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $verbete = $this->Verbetes->get($id, [
            'contain' => ['Pessoas', 'Estados', 'Pedidos']
        ]);

        $this->set('verbete', $verbete);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $verbete = $this->Verbetes->newEntity();
        if ($this->request->is('post')) {
            $verbete = $this->Verbetes->patchEntity($verbete, $this->request->getData());
            if ($this->Verbetes->save($verbete)) {
                $this->Flash->success(__('The verbete has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The verbete could not be saved. Please, try again.'));
        }



        $pessoas = $this->Verbetes->Pessoas->find('list', ['keyField' => 'id', 'valueField' => 'nome'])->toArray();
        $estados = $this->Verbetes->Estados->find('list', ['keyField' => 'id', 'valueField' => 'designacao'])->toArray();
        $pedidos = $this->Verbetes->Pedidos->find('list', ['limit' => 200]);
        $this->set(compact('verbete', 'pessoas', 'estados', 'pedidos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Verbete id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $verbete = $this->Verbetes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $verbete = $this->Verbetes->patchEntity($verbete, $this->request->getData());
            if ($this->Verbetes->save($verbete)) {
                $this->Flash->success(__('The verbete has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The verbete could not be saved. Please, try again.'));
        }
        $pessoas = $this->Verbetes->Pessoas->find('list', ['limit' => 200]);
        $estados = $this->Verbetes->Estados->find('list', ['limit' => 200]);
        $pedidos = $this->Verbetes->Pedidos->find('list', ['limit' => 200]);
        $this->set(compact('verbete', 'pessoas', 'estados', 'pedidos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Verbete id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $verbete = $this->Verbetes->get($id);
        if ($this->Verbetes->delete($verbete)) {
            $this->Flash->success(__('The verbete has been deleted.'));
        } else {
            $this->Flash->error(__('The verbete could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function xls() {
        $out = explode(',', $_COOKIE["Filtro"]);
        $arr = array();
        $id = 'Verbetes.id LIKE '. $out[0];
        $nome = 'Pessoas.nome LIKE "%'.$out[1].'%"';
        $datacriacao = 'Verbetes.datacriacao LIKE "%'.$out[2].'%"';
        $datadistribuicao = 'Verbetes.datadistribuicao LIKE "%'.$out[3].'%"';
        $datainicioefectiva = 'Verbetes.datainicioefectiva LIKE "%'.$out[4].'%"';

        if($out[0] != null){
            array_push($arr, $id);
        }
        if($out[1] != null){
            array_push($arr, $nome);
        }
        if($out[2] != null){
            array_push($arr, $datacriacao);
        }
        if($out[3] != null){
            array_push($arr, $datadistribuicao);
        }
        if($out[4] != null){
            array_push($arr, $datainicioefectiva);
        }
        if($arr == null){
            $verbetes = $this->Verbetes->find('all')->contain(['Pessoas']);
        }
        else{
            $verbetes = $this->Verbetes->find('all', array('conditions'=>$arr))->contain(['Pessoas']);
        }

        $this->autoRender = false;
        $path = TMP . "verbetes.xlsx";
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Pessoa');
        $sheet->setCellValue('C1', 'Data de criação');
        $sheet->setCellValue('D1', 'Data Distribuição');
        $sheet->setCellValue('E1', 'Data Inicio Efectivo');
        
        $linha = 2;
        foreach ($verbetes as $row) {
            $sheet->setCellValue('A' . $linha, $row->id);
            $sheet->setCellValue('B' . $linha, $row->pessoa->nome);
            $sheet->setCellValue('C' . $linha, $row->datacriacao);
            $sheet->setCellValue('D' . $linha, $row->datadistribuicao);
            $sheet->setCellValue('E' . $linha, $row->datainicioefectiva);
            $linha++;
        }

        foreach(range('A','E') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $spreadsheet->getActiveSheet()->getStyle('A1:E1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('74A0F9');
        
        $writer = new Xlsx($spreadsheet);
        $writer->save($path);

        $this->response->withType("application/vnd.ms-excel");
        return $this->response->withFile($path, array('download' => true, 'name' => 'Lista_Verbetes.xlsx'));
    }
}
