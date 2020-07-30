<?php
$data = [];
foreach ($records as $record) {
  $data[] = [
    'user_id' => $record->user_id,
    'team_id' => $record->team_id,
  ];
}

echo json_encode([
  'records' => $data,
  'queryRecordCount' => $queryRecordsCount,
  'totalRecordCount' => $totalRecordsCount
]);
