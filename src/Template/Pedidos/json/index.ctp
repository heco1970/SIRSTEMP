<?php
$data = [];
foreach ($records as $record) {
  $data[] = [
    'created' => $record->created->i18nFormat('dd/MM/yyyy'),
    //'modified' => $record->modified->i18nFormat('dd/MM/yyyy HH:mm:ss'),
    'processo' => $record->processo->nip,
    'pessoa' => $record->pessoa->nome,
    'referencia' => $record->referencia,
    'canalentrada' => $record->canalentrada,
    'datarecepcao' => $record->datarecepcao->i18nFormat('dd/MM/yyyy'),
    'origem' => $record->origem,
    //'Pedidostypes' => $record->Pedidostypes->descricao,
    'equiparesponsavel' => $record->equiparesponsavel,
    'state' => $record->state->designacao,
    'termino' => $record->termino->i18nFormat('dd/MM/yyyy'),
    'numeropedido' => $record->numeropedido,
    'datacriacao' => $record->datacriacao->i18nFormat('dd/MM/yyyy'),
    'dataatribuicao' => $record->dataatribuicao->i18nFormat('dd/MM/yyyy'),
    'datainicioefectivo' => $record->datainicioefectivo->i18nFormat('dd/MM/yyyy'),
    'datatermoprevisto' => $record->datatermoprevisto->i18nFormat('dd/MM/yyyy'),
    'dataefectivatermo' => $record->dataefectivatermo->i18nFormat('dd/MM/yyyy'),
    //'Pedidosmotives' => $record->Pedidosmotives->descricao,
    'pais' => $record->pai->paisNome,
    'concelho' => $record->concelho,
    'transferencias' => $record->transferencias,
    'gestor' => $record->gestor,
    'seguro' => $record->seguro,
    'periocidaderelatorios' => $record->periocidaderelatorios,
    'id' => $record->id,
  ];
  $this->log($record);
}

echo json_encode([
  'records' => $data,
  'queryRecordCount' => $queryRecordsCount,
  'totalRecordCount' => $totalRecordsCount
]);

