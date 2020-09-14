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

            $validOps = ['processo', 'nip', 'natureza', 'entjudicial', 'createdfirst', 'createdlast'];
            $convArray = [
                'processo' => $model . '.processo_id',
                'nip' => $model . '.nip',
                'natureza' => $model . '.natureza_id',
                'entjudicial' => $model . '.entidadejudiciai_id',
                'createdfirst' => $model . '.created',
                'createdlast' => $model . '.created'
            ];
            $strings = ['nip'];
            $date_start = ['createdfirst']; //data inicial
            $date_end = ['createdlast'];  //data final

            $contain = ['Entidadejudiciais', 'Naturezas'];
            $conditions = [];

            $totalRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

            $parsedQueries = $this->Dynatables->parseQueries($query, $validOps, $convArray, $strings, $date_start, $date_end);

            $conditions = array_merge($conditions, $parsedQueries);
            $queryRecordsCount = $this->$model->find('all')->where($conditions)->contain($contain)->count();

            $sorts = $this->Dynatables->parseSorts($query, $validOps, $convArray);
            $records = $this->$model->find('all')->where($conditions)->contain($contain)->order($sorts)->limit($query['perPage'])->offset($query['offset'])->page($query['page']);

            $this->set(compact('totalRecordsCount', 'queryRecordsCount', 'records'));
        } else {
            $entidadesjudiciais = $this->Processos->Entidadejudiciais->find('list', array(
                'keyField' => 'id',
                'valueField' => 'descricao'
            ))->toArray();

            $natureza = $this->Processos->Naturezas->find('list', array(
                'keyField' => 'id',
                'valueField' => 'designacao'
            ))->toArray();
            $this->set(compact('entidadesjudiciais', 'natureza'));
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
            'contain' => ['Units', 'States', 'Entidadejudiciais', 'Naturezas']
        ]);
        $pessoa_id = $this->request->getQuery('pessoa');


        $this->loadModel('PessoasProcessos');
        $this->loadModel('Pessoas');
        $this->loadModel('Crimes');

        $subquery = $this->PessoasProcessos
            ->find()
            ->select(['PessoasProcessos.pessoa_id'])
            ->where(['PessoasProcessos.processo_id' => $id]);

        $pessoas = $this->Pessoas
            ->find()
            ->where([
                'Pessoas.id IN' => $subquery
            ]);


        $crimes = $this->Crimes
            ->find()
            ->where(['processo_id' => $id])
            ->contain(['Tipocrimes']);

        $this->set('processo', $processo);
        $this->set(compact('pessoas', 'crimes', 'pessoa_id'));
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
                $this->Flash->success(__('O registo foi gravado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O registo não foi gravado. Tente novamente.'));
        }

        $this->set('units', $this->Processos->Units->find('list', ['keyField' => 'id', 'valueField' => 'designacao']));
        $this->set('states', $this->Processos->States->find('list', ['keyField' => 'id', 'valueField' => 'designacao']));
        $this->set('entidades', $this->Processos->Entidadejudiciais->find('list', ['keyField' => 'id', 'valueField' => 'descricao']));
        $this->set('naturezas', $this->Processos->Naturezas->find('list', ['keyField' => 'id', 'valueField' => 'designacao']));

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
        $pessoa_id = $this->request->getQuery('pessoa');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $processo = $this->Processos->patchEntity($processo, $this->request->getData());

            if ($this->Processos->save($processo)) {
                $this->Flash->success(__('O registo foi gravado.'));
                if (isset($pessoa_id)) {
                    $this->redirect(['controller' => 'Pessoas', 'action' => 'view/' . $pessoa_id]);
                } else {
                    return $this->redirect(['action' => 'index']);
                }
            } else {
                $this->Flash->error(__('O registo não foi gravado. Tente novamente.'));
            }
        }

        $entidadejudiciais = $this->Processos->Entidadejudiciais->find('list', ['keyField' => 'id', 'valueField' => 'descricao']);
        $units = $this->Processos->Units->find('list', ['keyField' => 'id', 'valueField' => 'designacao']);
        $naturezas = $this->Processos->Naturezas->find('list', ['keyField' => 'id', 'valueField' => 'designacao']);
        $states = $this->Processos->States->find('list', ['keyField' => 'id', 'valueField' => 'designacao']);

        $this->set(compact('processo', 'entidadejudiciais', 'pessoa_id', 'units', 'states', 'naturezas'));
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
        //$this->request->allowMethod(['post', 'delete']);
        $processo = $this->Processos->get($id);
        $pessoa_id = $this->request->getQuery('pessoa');
        if ($this->Processos->delete($processo)) {
            $this->Flash->success(__('O registo foi apagado.'));
        } else {
            $this->Flash->error(__('O registo não foi apagado. Tente novamente.'));
        }
        if (isset($pessoa_id)) {
            $this->redirect(['controller' => 'Pessoas', 'action' => 'view/' . $pessoa_id]);
        } else {
            return $this->redirect(['action' => 'index']);
        }
    }

    public function xls()
    {
        $out = explode(',', $_COOKIE["Filtro"]);
        $arr = array();

        $natureza = 'natureza LIKE "%' . $out[0] . '%"';
        $nip =  'nip LIKE "%' . $out[1] . '%"';

        if ($out[0] != null) {
            array_push($arr, $natureza);
        }
        if ($out[1] != null) {
            array_push($arr, $nip);
        }
        if ($out[2] != null && $out[3] == null) {
            $createdfirst = 'Processos.created LIKE "%' . $out[2] . '%"';
            array_push($arr, $createdfirst);
        }
        if ($out[2] == null && $out[3] != null) {
            $createdlast = 'Processos.created LIKE "%' . $out[3] . '%"';
            array_push($arr, $createdlast);
        }
        if ($out[2] != null && $out[3] != null) {
            $createdfirst = 'Processos.created >= "' . $out[2] . '"';
            $createdlast = 'Processos.created <= "' . $out[3] . ' 23:59"';
            array_push($arr, $createdfirst);
            array_push($arr, $createdlast);
        }
        if ($arr == null) {
            $processos = $this->Processos->find('all')->contain(['Entidadejudiciais']);
        } else {
            $processos = $this->Processos->find('all', array('conditions' => $arr))->contain(['Entidadejudiciais']);
        }

        $this->autoRender = false;
        $path = TMP . "processos.xlsx";

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Entidade Judicial');
        $sheet->setCellValue('B1', 'Natureza');
        $sheet->setCellValue('C1', 'NIP');
        $sheet->setCellValue('D1', 'Data de criação');

        $linha = 2;
        foreach ($processos as $row) {
            $sheet->setCellValue('A' . $linha, $row->entidadejudiciai->descricao);
            $sheet->setCellValue('B' . $linha, $row->natureza);
            $sheet->setCellValue('C' . $linha, $row->nip);
            $sheet->setCellValue('D' . $linha, $row->created);
            $linha++;
        }

        foreach (range('A', 'D') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $spreadsheet->getActiveSheet()->getStyle('A1:D1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('74A0F9');

        $writer = new Xlsx($spreadsheet);
        $writer->save($path);

        $this->response->withType("application/vnd.ms-excel");
        return $this->response->withFile($path, array('download' => true, 'name' => 'Lista_Processos.xlsx'));
    }
}
