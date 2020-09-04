<?php
$data = [];
foreach ($records as $record) {
  $data[] = [
    'pessoa_id' => $record->pessoa_id,
    'processo_id' => $record->processo_id,
    //'username' => $record->user->username,
    //'name' => $record->user->name,
  ];
}

echo json_encode([
  'records' => $data,
  'queryRecordCount' => $queryRecordsCount,
  'totalRecordCount' => $totalRecordsCount
]);
