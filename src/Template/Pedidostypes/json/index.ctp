<?php
$data = [];
foreach ($records as $record) {
  $data[] = [
    'descricao' => $record->descricao,
    'created' => $record->created->i18nFormat('dd/MM/yyyy HH:mm:ss'),
    'modified' => $record->modified->i18nFormat('dd/MM/yyyy HH:mm:ss'),
    'id' => $record->id,
  ];
}

echo json_encode([
  'records' => $data,
  'queryRecordCount' => $queryRecordsCount,
  'totalRecordCount' => $totalRecordsCount
]);

