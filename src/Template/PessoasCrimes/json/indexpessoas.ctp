<?php
$data = [];
foreach ($records as $record) {
  $data[] = [
    'descricao' => $record->crime->descricao,
    'pessoa_id' => $record->pessoa_id,
    'crime_id' => $record->crime_id,
  ];
}

echo json_encode([
  'records' => $data,
  'queryRecordCount' => $queryRecordsCount,
  'totalRecordCount' => $totalRecordsCount
]);
