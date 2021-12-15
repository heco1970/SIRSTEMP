<?php
$data = [];
foreach ($records as $record) {
  $data[] = [
    'created' => $record->created->i18nFormat('dd/MM/yyyy HH:mm:ss'),
    'modified' => $record->modified->i18nFormat('dd/MM/yyyy HH:mm:ss'),
    'username' => $record->user->username,
    'perfil' => $record->perfi->perfil,
    'id' => $record->id,
  ];
}

echo json_encode([
  'records' => $data,
  'queryRecordCount' => $queryRecordsCount,
  'totalRecordCount' => $totalRecordsCount
]);
