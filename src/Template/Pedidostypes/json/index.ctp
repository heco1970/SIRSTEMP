<?php
$data = [];
foreach ($records as $record) {
  $data[] = [
    'descricao' => $record->descricao,
    'created' => $record->created->i18nFormat('dd/MM/yyyy'),
    'id' => $record->id,
  ];
}

echo json_encode([
  'records' => $data,
  'queryRecordCount' => $queryRecordsCount,
  'totalRecordCount' => $totalRecordsCount
]);

