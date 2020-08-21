<?php
$data = [];
foreach ($records as $record) {
  $data[] = [
    'created' => $record->created->i18nFormat('dd/MM/yyyy'),
    'modified' => $record->modified->i18nFormat('dd/MM/yyyy'),
    'descricao' => $record->descricao,
    //'pessoa' => $record->pessoa->nome,
    'processo' => $record->processo->nip,
    'ocorrencia' => $record->ocorrencia,
    'registo' => $record->registo,
    'qte' => $record->qte,
    'apenaspre' => $record->descricao,
    'id' => $record->id,
  ];
}

echo json_encode([
  'records' => $data,
  'queryRecordCount' => $queryRecordsCount,
  'totalRecordCount' => $totalRecordsCount
]);
