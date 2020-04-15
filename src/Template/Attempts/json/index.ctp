<?php
$data = [];
foreach ($records as $attemp) {
  $data[] = [
    'modified' => $attemp->modified->i18nFormat('yyyy-MM-dd HH:mm:ss'),
    'username' => $attemp->username,
    'ban' => $attemp->ban /* ? "Banido" : "Ativo"*/,
    'id' => $attemp->id
  ];
}

echo json_encode([
  'records' => $data,
  'queryRecordCount' => $queryRecordsCount,
  'totalRecordCount' => $totalRecordsCount
]);
