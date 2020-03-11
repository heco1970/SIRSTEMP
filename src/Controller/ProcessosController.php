<?php
namespace App\Controller;

use App\Controller\AppController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * Processos Controller
 *
 * @property \App\Model\Table\ProcessosTable $Processos
 *
 * @method \App\Model\Entity\Processo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProcessosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->request->is('ajax')) {
            $model = 'Processos';
            $this->loadComponent('Dynatables');

            $query = $this->Dynatables->setDefaultDynatableRequestValues($this->request->getQueryParams());

            $validOps = ['id', 'entjudicial','created','modified'];
            $convArray = ['id' => $model.'.id',
                'entjudicial' => $model.'.entjudicial',
                'natureza' => $model.'.natureza',
                'nip' => $model.'.nip',
                'created' => $model.'.created',
                'modified' => $model.'.modified'];
            $strings = ['entjudicial'];

            // $contain = ['Types'];
            $totalRecordsCount = $this->$model->find('all')->count();
            $conditions = $this->Dynatables->parseQueries($query,$validOps,$convArray,$strings);
            $queryRecordsCount = $this->$model->find('all')->count();
            $sorts = $this->Dynatables->parseSorts($query,$validOps,$convArray);
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
     * @param string|null $id Processo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $processo = $this->Processos->get($id, [
            'contain' => ['Units', 'States']
        ]);

        $this->set('processo', $processo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $processo = $this->Processos->newEntity();
        if ($this->request->is('post')) {
            $processo = $this->Processos->patchEntity($processo, $this->request->getData());
            if ($this->Processos->save($processo)) {
                $this->Flash->success(__('The processo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The processo could not be saved. Please, try again.'));
        }


        $this->set('units', $this->Processos->Units->find('all'));
        $this->set('states', $this->Processos->States->find('all'));
       // $states = $this->Processos->States->find('list', ['limit' => 200]);
        $this->set(compact('processo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Processo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $processo = $this->Processos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $processo = $this->Processos->patchEntity($processo, $this->request->getData());
            if ($this->Processos->save($processo)) {
                $this->Flash->success(__('The processo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The processo could not be saved. Please, try again.'));
        }
        $units = $this->Processos->Units->find('list', ['limit' => 200]);
        $states = $this->Processos->States->find('list', ['limit' => 200]);
        $this->set(compact('processo', 'units', 'states'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Processo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $processo = $this->Processos->get($id);
        if ($this->Processos->delete($processo)) {
            $this->Flash->success(__('The processo has been deleted.'));
        } else {
            $this->Flash->error(__('The processo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function xls() {
        $out = explode(',', $_COOKIE["Filtro"]);

        if($out[0] != null && $out[1] != null && $out[2] != null && $out[3] != null){
            $processos = $this->Processos->find('all',array(
                'conditions'=>array(
                    'id LIKE "%'.$out[0].'%"',
                    'entjudicial LIKE "%'.$out[1].'%"',
                    'natureza LIKE "%'.$out[2].'%"',
                    'nip LIKE "%'.$out[3].'%"'
            )));
            // tudo preechido
        } elseif($out[0] == null && $out[1] != null && $out[2] != null && $out[3] != null){
            $processos = $this->Processos->find('all',array(
                'conditions'=>array(
                    'entjudicial LIKE "%'.$out[1].'%"',
                    'natureza LIKE "%'.$out[2].'%"',
                    'nip LIKE "%'.$out[3].'%"'
            )));
            // 1,2,3
        } elseif($out[1] == null && $out[2] != null && $out[3] != null && $out[0] != null){
            $processos = $this->Processos->find('all',array(
                'conditions'=>array(
                    'id LIKE "%'.$out[0].'%"',
                    'natureza LIKE "%'.$out[2].'%"',
                    'nip LIKE "%'.$out[3].'%"'
            )));
            // 0,2,3
        } elseif($out[2] == null && $out[3] != null && $out[1] != null && $out[0] != null){
            $processos = $this->Processos->find('all',array(
                'conditions'=>array(
                    'id LIKE "%'.$out[0].'%"',
                    'entjudicial LIKE "%'.$out[1].'%"',
                    'nip LIKE "%'.$out[3].'%"'
            )));
            // 0,1,3
        } elseif($out[3] == null && $out[0] != null && $out[1] != null && $out[2] != null){
            $processos = $this->Processos->find('all',array(
                'conditions'=>array(
                    'id LIKE "%'.$out[0].'%"',
                    'entjudicial LIKE "%'.$out[1].'%"',
                    'natureza LIKE "%'.$out[2].'%"'
            )));
            // 0,1,2
        }elseif($out[2] == null && $out[3] == null && $out[0] != null && $out[1] != null){
            $processos = $this->Processos->find('all',array(
                'conditions'=>array(
                    'id LIKE "%'.$out[0].'%"',
                    'entjudicial LIKE "%'.$out[1].'%"'
            )));
            // 0,1
        } elseif($out[1] == null && $out[3] == null && $out[0] != null && $out[2] != null){
            $processos = $this->Processos->find('all',array(
                'conditions'=>array(
                    'id LIKE "%'.$out[0].'%"',
                    'natureza LIKE "%'.$out[2].'%"',
            )));
            // 0,2
        } elseif($out[1] == null && $out[2] == null && $out[0] != null && $out[3] != null){
            $processos = $this->Processos->find('all',array(
                'conditions'=>array(
                    'id LIKE "%'.$out[0].'%"',
                    'nip LIKE "%'.$out[3].'%"'
            )));
            // 0,3
        } elseif($out[0] == null && $out[3] == null && $out[1] != null && $out[2] != null){
            $processos = $this->Processos->find('all',array(
                'conditions'=>array(
                    'entjudicial LIKE "%'.$out[1].'%"',
                    'natureza LIKE "%'.$out[2].'%"'
            )));
            // 1,2
        } elseif($out[0] == null && $out[2] == null && $out[1] != null && $out[3] != null){
            $processos = $this->Processos->find('all',array(
                'conditions'=>array(
                    'entjudicial LIKE "%'.$out[1].'%"',
                    'nip LIKE "%'.$out[3].'%"'
            )));
            // 1,3
        } elseif($out[0] == null && $out[1] == null && $out[2] != null && $out[3] != null){
            $processos = $this->Processos->find('all',array(
                'conditions'=>array(
                    'natureza LIKE "%'.$out[2].'%"',
                    'nip LIKE "%'.$out[3].'%"'
            )));
            // 2,3
        } elseif($out[1] == null && $out[2] == null && $out[3] == null && $out[0] != null){
            $processos = $this->Processos->find('all',array(
                'conditions'=>array(
                    'id LIKE "%'.$out[0].'%"'
            )));
            // 0
        } elseif($out[0] == null && $out[2] == null && $out[3] == null && $out[1] != null){
            $processos = $this->Processos->find('all',array(
                'conditions'=>array(
                    'entjudicial LIKE "%'.$out[1].'%"'
            )));
            // 1
        } elseif($out[0] == null && $out[1] == null && $out[3] == null && $out[2] != null){
            $processos = $this->Processos->find('all',array(
                'conditions'=>array(
                    'natureza LIKE "%'.$out[2].'%"'
            )));
            // 2
        } elseif($out[0] == null && $out[1] == null && $out[2] == null && $out[3] != null){
            $processos = $this->Processos->find('all',array(
                'conditions'=>array(
                    'nip LIKE "%'.$out[3].'%"'
            )));
            // 3
        } else {
            $processos = $this->Processos->find('all')->toArray();
            // nada preenchido
        }
        
        $this->autoRender = false;
        $path = TMP . "processos.xlsx";

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Entidade Judicial');
        $sheet->setCellValue('C1', 'Natureza');
        $sheet->setCellValue('D1', 'NIP');
        $sheet->setCellValue('E1', 'Data de criação');
        
        $linha = 2;
        foreach ($processos as $row) {
            $sheet->setCellValue('A' . $linha, $row->id);
            $sheet->setCellValue('B' . $linha, $row->entjudicial);
            $sheet->setCellValue('C' . $linha, $row->natureza);
            $sheet->setCellValue('D' . $linha, $row->nip);
            $sheet->setCellValue('E' . $linha, $row->created);    
            $linha++;
        }

        foreach(range('A','E') as $columnID) {
            $sheet->getColumnDimension($columnID)
                ->setAutoSize(true);
        }

        $spreadsheet->getActiveSheet()->getStyle('A1:E1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('74A0F9');
        
        $writer = new Xlsx($spreadsheet);
        $writer->save($path);

        $this->response->withType("application/vnd.ms-excel");
        return $this->response->withFile($path, array('download' => true, 'name' => 'Lista_Processos.xlsx'));
        
    }
}
