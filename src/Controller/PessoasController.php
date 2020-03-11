<?php
namespace App\Controller;

use App\Controller\AppController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * Pessoas Controller
 *
 * @property \App\Model\Table\PessoasTable $Pessoas
 *
 * @method \App\Model\Entity\Pessoa[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PessoasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->request->is('ajax')) {
            $model = 'Pessoas';
            $this->loadComponent('Dynatables');

            $query = $this->Dynatables->setDefaultDynatableRequestValues($this->request->getQueryParams());

            $validOps = ['id', 'nome','created','modified'];
            $convArray = ['id' => $model.'.id',
                'nome' => $model.'.nome',
                'created' => $model.'.created',
                'modified' => $model.'.modified'];
            $strings = ['nome'];

            // $contain = ['Types'];
            $totalRecordsCount = $this->$model->find('all')->count();
            $conditions = $this->Dynatables->parseQueries($query,$validOps,$convArray,$strings);
            $queryRecordsCount = $this->$model->find('all')->where($conditions)->count();
            $sorts = $this->Dynatables->parseSorts($query,$validOps,$convArray);
            $records = $this->$model->find('all')->where($conditions)->order($sorts)->limit($query['perPage'])->offset($query['offset'])->page($query['page']);
            $this->set(compact('totalRecordsCount', 'queryRecordsCount', 'records'));
            
        } else {
            //$types = $this->Users->Types->find('list', ['limit' => 200]);
            //$this->set(compact('types'));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Pessoa id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pessoa = $this->Pessoas->get($id, [
            'contain' => ['Pais']
        ]);

        $this->set('pessoa', $pessoa);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pessoa = $this->Pessoas->newEntity();
        if ($this->request->is('post')) {
            $pessoa = $this->Pessoas->patchEntity($pessoa, $this->request->getData());

            if ($this->Pessoas->save($pessoa)) {
                $this->Flash->success(__('The pessoa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pessoa could not be saved. Please, try again.'));
        }
     //   $pais = $this->Pessoas->Pais->find('list', ['limit' => 200]);
        $this->set('pais', $this->Pessoas->Pais->find('all'));

        $this->set(compact('pessoa'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pessoa id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pessoa = $this->Pessoas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoa = $this->Pessoas->patchEntity($pessoa, $this->request->getData());
            if ($this->Pessoas->save($pessoa)) {
                $this->Flash->success(__('The pessoa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pessoa could not be saved. Please, try again.'));
        }

        $pais = $this->Pessoas->Pais->find('list', ['limit' => 200]);
        $this->set(compact('pessoa', 'pais'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pessoa id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pessoa = $this->Pessoas->get($id);
        if ($this->Pessoas->delete($pessoa)) {
            $this->Flash->success(__('The pessoa has been deleted.'));
        } else {
            $this->Flash->error(__('The pessoa could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function xls() {
        $out = explode(',', $_COOKIE["Filtro"]);

        if($out[0] != null && $out[1] != null){
            $pessoas = $this->Pessoas->find('all',array(
                'conditions'=>array(
                    'id LIKE "%'.$out[0].'%"',
                    'nome LIKE "%'.$out[1].'%"'
            )));   
        } elseif($out[1] == null && $out[0] != null){
            $pessoas = $this->Pessoas->find('all', array('conditions'=>array('id LIKE "%'.$out[0].'%"')));

        } elseif($out[0] == null && $out[1] != null){
            $pessoas = $this->Pessoas->find('all', array('conditions'=>array('nome LIKE "%'.$out[1].'%"')));

        } else{
            $pessoas = $this->Pessoas->find('all')->toArray();
        }

        $this->autoRender = false;
        $path = TMP . "pessoas.xlsx";

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
    
        $sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Nome');
        $sheet->setCellValue('C1', 'CC');
        $sheet->setCellValue('D1', 'NIF');
        $sheet->setCellValue('E1', 'Data de nascimento');
        $sheet->setCellValue('F1', 'Data de criação');
      
        $linha = 2;
        foreach ($pessoas as $row) {
            $sheet->setCellValue('A' . $linha, $row->id);
            $sheet->setCellValue('B' . $linha, $row->nome);
            $sheet->setCellValue('C' . $linha, $row->cc);
            $sheet->setCellValue('D' . $linha, $row->nif);
            $sheet->setCellValue('E' . $linha, $row->data_nascimento); 
            $sheet->setCellValue('F' . $linha, $row->created);    
            $linha++;
        }

        foreach(range('A','F') as $columnID) {
            $sheet->getColumnDimension($columnID)
                ->setAutoSize(true);
        }

        $spreadsheet->getActiveSheet()->getStyle('A1:F1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('74A0F9');
        
        $writer = new Xlsx($spreadsheet);
        $writer->save($path);

        $this->response->withType("application/vnd.ms-excel");
        return $this->response->withFile($path, array('download' => true, 'name' => 'Lista_Pessoas.xlsx'));
        
    }
}
