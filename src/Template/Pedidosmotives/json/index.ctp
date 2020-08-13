<?php
$data = [];
foreach ($records as $record) {
  $data[] = [
    'descricao' => $record->descricao,
    'id' => $record->id,
  ];
}

echo json_encode([
  'records' => $data,
  'queryRecordCount' => $queryRecordsCount,
  'totalRecordCount' => $totalRecordsCount
]);

