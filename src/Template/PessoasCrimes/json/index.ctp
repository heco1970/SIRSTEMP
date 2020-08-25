<?php
$data = [];
foreach ($records as $record) {
  $data[] = [
    'pessoa_id' => $record->pessoa_id,
    'crime_id' => $record->crime_id,
  ];
}

echo json_encode([
  'records' => $data,
  'queryRecordCount' => $queryRecordsCount,
  'totalRecordCount' => $totalRecordsCount
]);
