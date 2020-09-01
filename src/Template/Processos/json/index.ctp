<?php
$data = [];
foreach ($records as $record) {
  $data[] = [
    'created' => $record->created->i18nFormat('dd/MM/yyyy HH:mm:ss'),
    'entjudicial' => $record->entidadejudiciai->descricao,
    'natureza' => $record->natureza,
    'nip' => $record->nip,
    'ultima' => $record->ultimaalteracao,
<<<<<<< HEAD
    'processo' => $record->processo_id,
    'id' => $record->id,
=======
    'id' => $record->processo_id,
>>>>>>> 80ce1419f0d6761a36dd578858d27e3190ceeaa2
  ];
}

echo json_encode([
  'records' => $data,
  'queryRecordCount' => $queryRecordsCount,
  'totalRecordCount' => $totalRecordsCount
]);
