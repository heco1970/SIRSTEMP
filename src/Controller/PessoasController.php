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

            $validOps = ['nome', 'cc', 'nif', 'datanascimento', 'createdfirst', 'createdlast'];
            $convArray = [
                'nome' => $model . '.nome',
                'cc' => $model . '.cc',
                'nif' => $model . '.nif',
                'datanascimento' => $model . '.data_nascimento',
                'createdfirst' => $model . '.created',
                'createdlast' => $model . '.created'
            ];
            $strings = ['nome', 'cc'];
            $date_start = ['createdfirst']; //data inicial
            $date_end = ['createdlast'];  //data final

            $contain = $conditions = [];
            // $contain = ['Types'];

            $totalRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

            $parsedQueries = $this->Dynatables->parseQueries($query, $validOps, $convArray, $strings, $date_start, $date_end);

            $conditions = array_merge($conditions, $parsedQueries);
            $queryRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

            $sorts = $this->Dynatables->parseSorts($query, $validOps, $convArray);
            $records = $this->$model->find('all')->where($conditions)->contain($contain)->order($sorts)->limit($query['perPage'])->offset($query['offset'])->page($query['page']);

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
            'contain' => ['Pais', 'Estadocivils', 'Generos', 'Unidadeoperas']
        ]);


        $this->loadModel('Contactos');
        $contactos = $this->Contactos->find()->where(['pessoa_id' => $id]);
        $this->set('pessoa', $pessoa);
        $this->set(compact('contactos'));
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
            $pessoa->estado = 1;
            if ($this->Pessoas->save($pessoa)) {
                $this->Flash->success(__('O registo foi gravado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O registo não foi gravado. Tente novamente.'));
        }

        $this->set('pais', $this->Pessoas->Pais->find('list', ['keyField' => 'id','valueField' => 'paisNome']));
        $this->set('estadocivils', $this->Pessoas->Estadocivils->find('list', ['keyField' => 'id','valueField' => 'estado']));
        $this->set('generos', $this->Pessoas->Generos->find('list', ['keyField' => 'id','valueField' => 'genero']));
        $this->set('unidadeoperas', $this->Pessoas->Unidadeoperas->find('list', ['keyField' => 'id','valueField' => 'designacao']));

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
                $this->Flash->success(__('O registro foi gravado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O registro não foi gravado. Tente novamente.'));
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
            $this->Flash->success(__('O registro foi apagado.'));
        } else {
            $this->Flash->error(__('O registro não foi apagado. Tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function xls()
    {
        $out = explode(',', $_COOKIE["Filtro"]);
        $arr = array();
        $nome = 'nome LIKE "%' . $out[0] . '%"';
        $cc = 'cc LIKE "%' . $out[1] . '%"';
        $nif = 'nif LIKE "%' . $out[2] . '%"';
        $datanascimento = 'data_nascimento LIKE "%' . $out[3] . '%"';

        if ($out[0] != null) {
            array_push($arr, $nome);
        }
        if ($out[1] != null) {
            array_push($arr, $cc);
        }
        if ($out[2] != null) {
            array_push($arr, $nif);
        }
        if ($out[3] != null) {
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
    }
}
