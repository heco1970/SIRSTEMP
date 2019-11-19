<?php
$data = [];
foreach ($records as $record) {
  $data[] = [
    'created' => $record->created->i18nFormat('yyyy-MM-dd HH:mm:ss'),
    'modified' => $record->modified->i18nFormat('yyyy-MM-dd HH:mm:ss'),
    'username' => $record->username,
    'name' => $record->name,
    'type' => $record->type->name,
    'id' => $record->id,
  ];
}

echo json_encode([
  'records' => $data,
  'queryRecordCount' => $queryRecordsCount,
  'totalRecordCount' => $totalRecordsCount
]);
