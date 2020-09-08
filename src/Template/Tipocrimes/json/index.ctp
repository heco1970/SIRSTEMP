<?php
$data = [];
foreach ($records as $record) {
  $data[] = [
    'created' => $record->created->i18nFormat('dd/MM/yyyy'),
    //'modified' => $record->modified->i18nFormat('dd/MM/yyyy'),
    'descricao' => $record->descricao,
    'id' => $record->id,
  ];
  $this->log($record);
}

echo json_encode([
  'records' => $data,
  'queryRecordCount' => $queryRecordsCount,
  'totalRecordCount' => $totalRecordsCount
]);
