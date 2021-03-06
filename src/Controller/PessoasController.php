<?php

declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Cake\ORM\TableRegistry;
use Cake\ORM\Table;
use \Cake\Utility\Security;


ob_start();

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

            $validOps = ['id', 'nome', 'cc', 'nif', 'datanascimento', 'createdfirst', 'createdlast'];
            $convArray = [
                'id' => $model . '.id',
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
            ])->contain(['Naturezas', 'Entidadejudiciais']);

        $pedidos = $this->Pedidos->find()->where(['pessoa_id' => $id])->contain(['Processos', 'Teams', 'States']);
        $crimes = $this->Crimes->find()->where(['pessoa_id' => $id])->contain(['Tipocrimes', 'Processos']);

        $distrito = $this->Pessoas->CodigosPostais->find()->where(['CodigosPostais.id' => $pessoa->codigos_postai->id])->contain(['Distritos'])->first();
        $concelho = $this->Concelhos->find()->where(['Concelhos.CodigoConcelho' => $pessoa->codigos_postai->CodigoConcelho, 'Concelhos.CodigoDistrito' => $pessoa->codigos_postai->CodigoDistrito])->first();

        $this->set('pessoa', $pessoa);
        $this->set(compact('contactos', 'crimes', 'processos', 'pedidos', 'distrito', 'concelho'));
    }

    public function saveConcelhoID()
    {
        $this->autoRender = false;
        $this->globalConcID = $this->request->getQuery('keyword');
    }

    public function fregAutoComplete($concID = 0)
    {
        $this->autoRender = false;

        $this->log($concID);

        $search = h($this->request->getQuery('term'));
        $concelhoSelecionadoID = $concID;

        $this->log('1');

        $concelhos = $this->Pessoas->CodigosPostais->Concelhos
            ->find()
            ->where(['id like' => $concelhoSelecionadoID . '%']);

        $this->log('2');
        $this->log($concelhos);

        $freguesia = null;

        $data = [];
        $data2 = [];

        foreach ($concelhos as $conc) {
            $freguesia = $this->Pessoas->CodigosPostais
                ->find()
                ->select(['id', 'NomeLocalidade'])
                ->where(['CodigoConcelho like' => $conc->CodigoConcelho . '%', 'NomeLocalidade like' => $search . '%'])
                ->group('NomeLocalidade')
                ->order(['NomeLocalidade' => 'ASC']);
            //$data2[] = ['id' => $conc->id, 'Designacao' => $conc->Designacao];
        }

        /*foreach($concelhos as $conc){            
            $data2[] = ['id' => $conc->id, 'Designacao' => $conc->Designacao];
        }*/

        /*$freguesias = $this->Pessoas->CodigosPostais
        ->find()
        ->where(['NomeLocalidade like'=>$search.'%'])
        ->limit(20);*/

        if (is_array($freguesia) || is_object($freguesia)) {
            foreach ($freguesia as $freg) {
                $data[] = ['id' => $freg->id, 'text' => $freg->NomeLocalidade];
            }
        }

        $data = ['results' => $data];
        echo json_encode($data);
    }

    public function concelhosByDistritos()
    {
        $this->autoRender = false;

        $distritoSelecionadoID = h($this->request->getQuery('keyword'));

        $distritos = $this->Pessoas->CodigosPostais->Distritos
            ->find()
            ->where(['id like' => $distritoSelecionadoID . '%']);

        $concelhos = null;

        $data = [];
        $data2 = [];

        foreach ($distritos as $distrit) {
            $concelhos = $this->Pessoas->CodigosPostais->Concelhos
                ->find()
                ->where(['CodigoDistrito like' => $distrit->CodigoDistrito . '%']);
        }

        foreach ($concelhos as $conc) {
            $data[] = ['id' => $conc->id, 'Designacao' => $conc->Designacao];
        }

        //$data = ['results'=>$data];
        echo json_encode($data);
    }

    public function fregByConc()
    {
        $this->autoRender = false;

        $concelhoSelecionadoID = h($this->request->getQuery('keyword'));

        $concelhos = $this->Pessoas->CodigosPostais->Concelhos
            ->find()
            ->where(['id like' => $concelhoSelecionadoID . '%']);

        $freguesia = null;

        $data = [];
        $data2 = [];

        foreach ($concelhos as $conc) {
            $freguesia = $this->Pessoas->CodigosPostais
                ->find()
                ->select(['id', 'NomeLocalidade'])
                ->where(['CodigoConcelho like' => $conc->CodigoConcelho . '%'])
                ->group('NomeLocalidade')
                ->order(['NomeLocalidade' => 'ASC']);
            //$data2[] = ['id' => $conc->id, 'Designacao' => $conc->Designacao];
        }

        foreach ($freguesia as $freg) {
            $data[] = ['id' => $freg->id, 'NomeLocalidade' => $freg->NomeLocalidade];
        }

        //$data = ['results'=>$data];

        $this->log($data);
        echo json_encode($data);
    }

    public function nextId()
    {
        $result = $this->Pessoas->query("SELECT Auto_increment FROM information_schema.tables AS NextId  WHERE table_name='pessoas' AND table_schema='cac3l'");
        return $result[0]['NextId']['Auto_increment'];
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pessoa = $this->Pessoas->newEntity();
        if ($this->request->is(array('post', 'put'))) {
            $pessoa = $this->Pessoas->patchEntity($pessoa, $this->request->getData());
            $pessoa->estado = 1;
            $codigo_postal = $this->request->getData('codigo_postal');
            $codigo_postal1 = $this->request->getData('codigo_postal1');
            $codigoid = $this->Pessoas->CodigosPostais->find()->where(['NumCodigoPostal' => $codigo_postal, 'ExtCodigoPostal' => $codigo_postal1])->first();

            $cc = $this->request->getData('cc');
            $nif = $this->request->getData('nif');
            if (is_numeric($cc)) {
                $errors = 1;
            }
            if (is_numeric($nif)) {
                $errors = 1;
            }

            if (isset($codigoid->id)) {
                $pessoa->codigos_postai_id = $codigoid->id;
            }

            if (!empty($pessoa->codigos_postai_id)) {
                if ($this->Pessoas->save($pessoa)) {
                    $this->Flash->success(__('O registo foi gravado.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('O registo n??o foi gravado. Tente novamente.'));
            } else {
                $this->Flash->error(__('O registo n??o foi gravado. Tente novamente.'));
                $this->Flash->error(__('O c??digo postal inserido n??o est?? correto.'));
            }
        }

        $data = [];
        $lista = $this->Pessoas
            ->find()
            ->select(['id'])
            ->order(['id' => 'DESC']);

        foreach ($lista as $pessoa) {
            $data[] = ['id' => $pessoa->id];
        }

        $idUltimoRegisto = array_sum($data[0]);
        $idProximoRegisto = $idUltimoRegisto + 1;
        $this->set('nextUser', $idProximoRegisto);

        $this->set('distritos', $this->Pessoas->CodigosPostais->Distritos->find('list', ['keyField' => 'id', 'valueField' => 'Designacao']));
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
            ->where(['CodigoDistrito like' => $keyword . '%']));

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

        /*$this->log($pessoa['codigos_postai']['CodigoDistrito']);
        $this->log($pessoa['codigos_postai']['CodigoConcelho']);
        $this->log($pessoa['codigos_postai']['id']);*/

        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoa = $this->Pessoas->patchEntity($pessoa, $this->request->getData());
            $pessoa->estado = 1;
            $codigo_postal = $this->request->getData('codigo_postal');
            $codigo_postal1 = $this->request->getData('codigo_postal1');
            $codigoid = $this->Pessoas->CodigosPostais->find()->where(['NumCodigoPostal' => $codigo_postal, 'ExtCodigoPostal' => $codigo_postal1])->first();

            $cc = $this->request->getData('cc');
            $nif = $this->request->getData('nif');
            if (is_numeric($cc)) {
                $errors = 1;
            }
            if (is_numeric($nif)) {
                $errors = 1;
            }

            if (isset($codigoid->id)) {
                $pessoa->codigos_postai_id = $codigoid->id;
            }

            if (!empty($pessoa->codigos_postai_id)) {
                if ($this->Pessoas->save($pessoa)) {
                    $this->Flash->success(__('O registo foi gravado.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('O registo n??o foi gravado. Tente novamente.'));
            } else {
                $this->Flash->error(__('O registo n??o foi gravado. Tente novamente.'));
                $this->Flash->error(__('O c??digo postal inserido n??o est?? correto.'));
            }
        }

        $this->set('distritos', $this->Pessoas->CodigosPostais->Distritos->find('list', ['keyField' => 'id', 'valueField' => 'Designacao']));
        $this->set('pais', $this->Pessoas->Pais->find('list', ['keyField' => 'id', 'valueField' => 'paisNome']));
        $this->set('centro_educs', $this->Pessoas->CentroEducs->find('list', ['keyField' => 'id', 'valueField' => 'designacao']));
        $this->set('estb_pris', $this->Pessoas->EstbPris->find('list', ['keyField' => 'id', 'valueField' => 'designacao']));
        $this->set('estadocivils', $this->Pessoas->Estadocivils->find('list', ['keyField' => 'id', 'valueField' => 'estado']));
        $this->set('generos', $this->Pessoas->Generos->find('list', ['keyField' => 'id', 'valueField' => 'genero']));
        $this->set('unidadeoperas', $this->Pessoas->Unidadeoperas->find('list', ['keyField' => 'id', 'valueField' => 'designacao']));

        $codpostal = $this->Pessoas->CodigosPostais->find('list', ['keyField' => 'id', 'valueField' => 'NomeLocalidade'])->where(['id' => $pessoa['codigos_postai']['id']]);
        $cod_postal_1 = $this->request->getQuery('codigo_postal');
        $cod_postal_2 = $this->request->getQuery('codigo_postal1');
        $distrito_id = $this->Pessoas->CodigosPostais->find()->select('CodigoDistrito')->where(['NumCodigoPostal' => $cod_postal_1, 'ExtCodigoPostal' => $cod_postal_2]);
        $concelhos_id = $this->Pessoas->CodigosPostais->find()->select('CodigoConcelho')->where(['NumCodigoPostal' => $cod_postal_1, 'ExtCodigoPostal' => $cod_postal_2]);

        //$distrito = $this->Pessoas->CodigosPostais->Distritos->find('list', ['keyField' => 'id', 'valueField' => 'Designacao'])->where(['id' => $pessoa['codigos_postai']['CodigoDistrito']]);
        //$concelho = $this->Pessoas->CodigosPostais->Conselhos->find('list', ['keyField' => 'id', 'valueField' => 'Designacao'])->where(['id' => $pessoa['codigos_postai']['CodigoConcelho']]);
        //$freguesia = $this->Pessoas->CodigosPostais->find('list', ['keyField' => 'id', 'valueField' => 'NomeLocalidade'])->where(['id' => $pessoa['codigos_postai']['id']]);

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

        if ($crimes < 1 &&  $processos < 1 &&  $pedidos < 1 &&  $contactos < 1) {
            $pessoa = $this->Pessoas->get($id);
            if ($this->Pessoas->delete($pessoa)) {
                $this->Flash->success(__('O registo foi apagado.'));
            } else {
                $this->Flash->error(__('O registo n??o foi apagado. Tente novamente.'));
            }
        } else {
            $this->Flash->error(__('N??o ?? poss??vel apagar o registo, pois este est?? associado a outras tabelas.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function xls()
    {
        $out = explode(',', $_COOKIE["Filtro"]);
        $arr = array();

        if (!empty($out)) {
            $id = 'id LIKE "%' . $out[0] . '%"';
            $nome = 'nome LIKE "%' . $out[1] . '%"';
            $cc = 'cc LIKE "%' . $out[2] . '%"';
            $nif = 'nif LIKE "%' . $out[3] . '%"';
            $datanascimento = 'data_nascimento LIKE "%' . $out[4] . '%"';
        }

        if ($out[0] != null) {
            array_push($arr, $id);
        }
        if ($out[1] != null) {
            array_push($arr, $nome);
        }
        if ($out[2] != null) {
            array_push($arr, $cc);
        }
        if ($out[3] != null) {
            array_push($arr, $nif);
        }
        if ($out[4] != null) {
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
        $sheet->setCellValue('E1', 'Data de cria????o');

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

    public function loadCodigos()
    {
        $codigos_postai_id = $this->request->getData('codigos_postai_id');

        $cod_postal_1 = $this->request->getQuery('keyword');
        $cod_postal_2 = $this->request->getQuery('keyword1');

        $distrito_id = $this->Pessoas->CodigosPostais->find()->select('CodigoDistrito')->where(['NumCodigoPostal' => $cod_postal_1, 'ExtCodigoPostal' => $cod_postal_2]);
        $concelhos_id = $this->Pessoas->CodigosPostais->find()->select('CodigoConcelho')->where(['NumCodigoPostal' => $cod_postal_1, 'ExtCodigoPostal' => $cod_postal_2]);

        $distrito = $this->Distritos->find('list', ['keyField' => 'id', 'valueField' => 'Designacao'])->where(['CodigoDistrito' => $distrito_id]);
        $concelhos = $this->Concelhos->find('list', ['keyField' => 'id', 'valueField' => 'Designacao'])->where(['CodigoConcelho' => $concelhos_id, 'CodigoDistrito' => $distrito_id]);
        $freguesia = $this->Pessoas->CodigosPostais->find('list', ['keyField' => 'id', 'valueField' => 'NomeLocalidade'])->where(['id' => $codigos_postai_id]);

        $this->set('distritos', $distrito);
        $this->set('concelhos', $concelhos);
        $this->set('freguesias', $freguesia);

        $this->set('_serialize', ['distrito']);
    }

    public function pdf()
    {
        // Recolhe dados do json
        $name = "Registo de Pessoas";       // Nome do ficheiro
        $mode = "P";                        // Modo do ficheiro
        $pageize = "A3";                                                      // Tamanho do ficheiro
        $header = array('N??', 'Nome', 'CC/BI', 'NIF', 'Data de nascimento');  // Cabe??alho para a tabela
        $size = array(10, 100, 40, 40, 50);                                   // Tamanho do cabe??alho

        $out = explode(',', $_COOKIE["Filtro"]);
        $arr = array();

        if (!empty($out)) {
            $id = 'id LIKE "%' . $out[0] . '%"';
            $nome = 'nome LIKE "%' . $out[1] . '%"';
            $cc = 'cc LIKE "%' . $out[2] . '%"';
            $nif = 'nif LIKE "%' . $out[3] . '%"';
            $datanascimento = 'data_nascimento LIKE "%' . $out[4] . '%"';
        }

        if ($out[0] != null) {
            array_push($arr, $id);
        }
        if ($out[1] != null) {
            array_push($arr, $nome);
        }
        if ($out[2] != null) {
            array_push($arr, $cc);
        }
        if ($out[3] != null) {
            array_push($arr, $nif);
        }
        if ($out[4] != null) {
            array_push($arr, $datanascimento);
        }
        if ($arr == null) {
            $recordsPessoas = $this->Pessoas->find('all')->toArray();
        } else {
            $recordsPessoas = $this->Pessoas->find('all', array('conditions' => $arr));
        }

        //$recordsPessoas = $this->Pessoas->find('all')->toArray();                    // Registos para preencher a tabela
        $records = [];

        // Constru????o de linha para cada registo recebido
        foreach ($recordsPessoas as $row) {
            $records[$row->id] =
                [
                    $row->id,
                    $row->nome,
                    $row->cc,
                    $row->nif,
                    (isset($row->data_nascimento) ? $row->data_nascimento->i18nFormat('dd/MM/yyyy') : "")
                ];
        }

        $this->set(compact('name', 'mode', 'pageize', 'header', 'size', 'records'));     // Enviar dados do json para o pdf
        $this->render('/Pdf/layout_1');                                                 // Localiz????o do layout do pdf 1

        // Renderiza????o do documento utilizando o template desenvolvido para o efeito
        return $this->response->withHeader('Content-Type', 'application/pdf');
    }
}
