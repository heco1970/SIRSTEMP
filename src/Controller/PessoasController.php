<?php

namespace App\Controller;

use App\Controller\AppController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Cake\ORM\TableRegistry;
use Cake\ORM\Table;

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
            'contain' => ['Pais', 'Estadocivils', 'CentroEducs', 'EstbPris', 'Generos', 'Unidadeoperas', 'CodigosPostais']
        ]);

        $this->loadModel('Contactos');
        $this->loadModel('Crimes');
        $this->loadModel('Processos');
        $this->loadModel('PessoasProcessos');
        $this->loadModel('Tipocrimes');
        $this->loadModel('Pedidos');
        $this->loadModel('Concelhos');
        

        $contactos = $this->Contactos->find()->where(['pessoa_id' => $id]);

        $subquery = $this->PessoasProcessos
            ->find()
            ->select(['PessoasProcessos.processo_id'])
            ->where(['PessoasProcessos.pessoa_id' => $id]);

        $processos = $this->Processos
        ->find()
        ->where([
            'Processos.id IN' => $subquery
        ])->contain(['Naturezas','Entidadejudiciais']);

        $pedidos = $this->Pedidos->find()->where(['pessoa_id' => $id])->contain(['Processos','Teams','States']);
        $crimes = $this->Crimes->find()->where(['pessoa_id' => $id])->contain(['Tipocrimes','Processos']);
        
        $distrito = $this->Pessoas->CodigosPostais->find()->where(['CodigosPostais.id' => $pessoa->codigos_postai->id])->contain(['Distritos'])->first();
        $concelho = $this->Concelhos->find()->where(['Concelhos.CodigoConcelho' => $pessoa->codigos_postai->CodigoConcelho, 'Concelhos.CodigoDistrito' => $pessoa->codigos_postai->CodigoDistrito])->first();

        $this->set('pessoa', $pessoa);
        $this->set(compact('contactos', 'crimes', 'processos', 'pedidos', 'distrito', 'concelho'));
    }

    public function fregAutoComplete(){
        $this->autoRender = false;

        $search = h($this->request->query['term']);
        $freguesias = $this->Pessoas->CodigosPostais->find()->where(['NomeLocalidade like'=>$search.'%'])->limit(20);
        
        $data = [];
        
        foreach($freguesias as $freg){
            $data[] = ['id' => $freg->id, 'text' => $freg->NomeLocalidade];
        }

        $data = ['results'=>$data];

        $this->log($this->request->query);
        echo json_encode($data);
    }

    public function concelhosByDistritos(){
        $this->autoRender = false;

        $distritoSelecionadoID = h($this->request->getQuery('keyword'));

        $distritos = $this->Pessoas->CodigosPostais->Distritos
        ->find()
        ->where(['id like'=> $distritoSelecionadoID.'%']);

        $concelhos;
        
        $data = [];
        $data2 = [];

        foreach($distritos as $distrit){
            $concelhos = $this->Pessoas->CodigosPostais->Concelhos
            ->find()
            ->where(['CodigoDistrito like'=> $distrit->CodigoDistrito.'%']);
        }

        foreach($concelhos as $conc){
            $data[] = ['id' => $conc->id, 'Designacao' => $conc->Designacao];
        }

        //$data = ['results'=>$data];

        //$this->log($data);
        echo json_encode($data);
    }

    public function fregByConc(){
        $this->autoRender = false;

        $concelhoSelecionadoID = h($this->request->getQuery('keyword'));

        $concelhos = $this->Pessoas->CodigosPostais->Concelhos
        ->find()
        ->where(['id like'=> $concelhoSelecionadoID.'%']);

        $freguesia;

        $data = [];
        $data2 = [];

        foreach($concelhos as $conc){
            $freguesia = $this->Pessoas->CodigosPostais
            ->find()
            ->select(['id', 'NomeLocalidade'])
            ->where(['CodigoConcelho like'=> $conc->CodigoConcelho.'%'])
            ->group('NomeLocalidade')
            ->order(['NomeLocalidade' => 'ASC']);
            //$data2[] = ['id' => $conc->id, 'Designacao' => $conc->Designacao];
        }

        foreach($freguesia as $freg){
            $data[] = ['id' => $freg->id, 'NomeLocalidade' => $freg->NomeLocalidade];
        }

        //$data = ['results'=>$data];

        $this->log($data);
        echo json_encode($data);
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
            $codigo_postal = $this->request->getData('codigo_postal');
            $codigo_postal1 = $this->request->getData('codigo_postal1');
            $codigoid = $this->Pessoas->CodigosPostais->find()->where(['NumCodigoPostal' => $codigo_postal, 'ExtCodigoPostal' => $codigo_postal1])->first();

            if(isset($codigoid->id)){
                $pessoa->codigos_postai_id = $codigoid->id;
            }

            if (!empty($pessoa->codigos_postai_id)) {
                if ($this->Pessoas->save($pessoa)) {
                    $this->Flash->success(__('O registo foi gravado.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('O registo não foi gravado. Tente novamente.'));
            } else {
                $this->Flash->error(__('O registo não foi gravado. Tente novamente.'));
                $this->Flash->error(__('O código postal inserido não está correto.'));
            }
        }

        $this->set('distritos', $this->Pessoas->CodigosPostais->Distritos->find('list', ['keyField' => 'id', 'valueField' => 'Designacao']));

        

        /*$distritoSelecionadoID = $this->request->getQuery('keyword');     
        //$distritoSelecionado = $this->request->getData('distrito');
        $this->log($distritoSelecionadoID);

        $this->set('concelhos', $this->Pessoas->CodigosPostais->Concelhos
        ->find('list', ['keyField' => 'id', 'valueField' => 'Designacao'])
        ->where(['CodigoDistrito like'=> $distritoSelecionadoID.'%']));*/

        //$this->log($this->Pessoas->CodigosPostais->Concelhos->find('list', ['keyField' => 'id', 'valueField' => 'Designacao'])->where(['CodigoDistrito like'=> $distritoSelecionadoID]));

        //$this->set('freguesias', $this->Pessoas->CodigosPostais->find('list', ['keyField' => 'id', 'valueField' => 'NomeLocalidade']));
        $this->set('pais', $this->Pessoas->Pais->find('list', ['keyField' => 'id', 'valueField' => 'paisNome']));
        $this->set('centro_educs', $this->Pessoas->CentroEducs->find('list', ['keyField' => 'id', 'valueField' => 'designacao']));
        $this->set('estb_pris', $this->Pessoas->EstbPris->find('list', ['keyField' => 'id', 'valueField' => 'designacao']));
        $this->set('estadocivils', $this->Pessoas->Estadocivils->find('list', ['keyField' => 'id', 'valueField' => 'estado']));
        $this->set('generos', $this->Pessoas->Generos->find('list', ['keyField' => 'id', 'valueField' => 'genero']));
        $this->set('unidadeoperas', $this->Pessoas->Unidadeoperas->find('list', ['keyField' => 'id', 'valueField' => 'designacao']));

        $this->set(compact('pessoa'));
    }

    public function concelhosDistrit()
    {
        $this->loadModel('Distritos');
        $this->loadModel('Concelhos');
        $this->request->allowMethod('ajax');

        $keyword = $this->request->getQuery('keyword');       

        $this->set('concelhos', $this->Pessoas->CodigosPostais->Concelhos
        ->find('list', ['keyField' => 'id', 'valueField' => 'Designacao'])
        ->where(['CodigoDistrito like'=> $keyword.'%']));

        $this->set('_serialize', ['concelhos']);
    }

    public function search()
    {
        $this->loadModel('Distritos');
        $this->loadModel('Concelhos');
        $this->request->allowMethod('ajax');

        $keyword = $this->request->getQuery('keyword');
        $keyword1 = $this->request->getQuery('keyword1');

        $codigo = $this->Pessoas->CodigosPostais->find()->select('CodigoDistrito')->where(['ExtCodigoPostal' => $keyword1, 'NumCodigoPostal' => $keyword]);
        $coddistrito = $this->Pessoas->CodigosPostais->find()->select('CodigoDistrito')->where(['NumCodigoPostal' => $keyword, 'ExtCodigoPostal' => $keyword1]);
        $codconcelho = $this->Pessoas->CodigosPostais->find()->select('CodigoConcelho')->where(['NumCodigoPostal' => $keyword, 'ExtCodigoPostal' => $keyword1]);

        $this->set('distritos', $this->Distritos->find('list', ['keyField' => 'id', 'valueField' => 'Designacao'])->where(['CodigoDistrito' => $codigo]));
        $this->set('concelhos', $this->Concelhos->find('list', ['keyField' => 'id', 'valueField' => 'Designacao'])->where(['CodigoConcelho' => $codconcelho, 'CodigoDistrito' => $coddistrito]));
        $this->set('freguesias', $this->Pessoas->CodigosPostais->find('list', ['keyField' => 'id', 'valueField' => 'NomeLocalidade'])->where(['ExtCodigoPostal' => $keyword1, 'NumCodigoPostal' => $keyword]));

        $this->set('_serialize', ['distritos']);
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
            'contain' => ['Pais', 'Estadocivils', 'CentroEducs', 'EstbPris', 'Generos', 'Unidadeoperas', 'CodigosPostais']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoa = $this->Pessoas->patchEntity($pessoa, $this->request->getData());
            $pessoa->estado = 1; 
            $codigo_postal = $this->request->getData('codigo_postal');
            $codigo_postal1 = $this->request->getData('codigo_postal1');
            $codigoid = $this->Pessoas->CodigosPostais->find()->where(['NumCodigoPostal' => $codigo_postal, 'ExtCodigoPostal' => $codigo_postal1])->first();

            if(isset($codigoid->id)){
                $pessoa->codigos_postai_id = $codigoid->id;
            }

            if (!empty($pessoa->codigos_postai_id)) {
                if ($this->Pessoas->save($pessoa)) {
                    $this->Flash->success(__('O registo foi gravado.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('O registo não foi gravado. Tente novamente.'));
            } else {
                $this->Flash->error(__('O registo não foi gravado. Tente novamente.'));
                $this->Flash->error(__('O código postal inserido não está correto.'));
            }
        }

        $this->set('pais', $this->Pessoas->Pais->find('list', ['keyField' => 'id', 'valueField' => 'paisNome']));
        $this->set('centro_educs', $this->Pessoas->CentroEducs->find('list', ['keyField' => 'id', 'valueField' => 'designacao']));
        $this->set('estb_pris', $this->Pessoas->EstbPris->find('list', ['keyField' => 'id', 'valueField' => 'designacao']));
        $this->set('estadocivils', $this->Pessoas->Estadocivils->find('list', ['keyField' => 'id', 'valueField' => 'estado']));
        $this->set('generos', $this->Pessoas->Generos->find('list', ['keyField' => 'id', 'valueField' => 'genero']));
        $this->set('unidadeoperas', $this->Pessoas->Unidadeoperas->find('list', ['keyField' => 'id', 'valueField' => 'designacao']));

        $codpostal = $this->Pessoas->CodigosPostais->find()->where(['CodigosPostais.id' => $pessoa->codigos_postai->id])->contain(['Distritos','Concelhos'])->first();

        $this->set(compact('pessoa', 'codpostal'));
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
        
        $this->loadModel('Crimes');
        $this->loadModel('PessoasProcessos');
        $this->loadModel('Pedidos');
        $this->loadModel('Contactos');
        
        $crimes = $this->Crimes->find('all')->where(['pessoa_id' => $id])->count();
        $processos = $this->PessoasProcessos->find('all')->where(['pessoa_id' => $id])->count();
        $pedidos = $this->Pedidos->find('all')->where(['pessoa_id' => $id])->count();
        $contactos = $this->Contactos->find('all')->where(['pessoa_id' => $id])->count();
        
        if ($crimes<1 &&  $processos<1 &&  $pedidos<1 &&  $contactos<1) {
            $pessoa = $this->Pessoas->get($id);
            if ($this->Pessoas->delete($pessoa)) {
                $this->Flash->success(__('O registo foi apagado.'));
            } else {
                $this->Flash->error(__('O registo não foi apagado. Tente novamente.'));
            }
        }else{
            $this->Flash->error(__('Não é possível apagar o registo, pois este está associado a outras tabelas.'));
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
