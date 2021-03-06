<?php
$data = [];
foreach ($records as $record) {
  $data[] = [
    'created' => $record->created->i18nFormat('dd/MM/yyyy HH:mm:ss'),
    'entjudicial' => $record->entidadejudiciai->descricao,
    'natureza' => $record->natureza->designacao,
    'nip' => $record->nip,
    'ultima' => $record->ultimaalteracao,
    'processo' => $record->processo_id,
    'id' => $record->id,
  ];
}

echo json_encode([
  'records' => $data,
  'queryRecordCount' => $queryRecordsCount,
  'totalRecordCount' => $totalRecordsCount
]);
