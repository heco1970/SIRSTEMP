<?php
$data = [];
foreach ($records as $attemp) {
  $data[] = [
    'modified' => $attemp->modified->i18nFormat('dd/MM/yyyy HH:mm:ss'),
    'username' => $attemp->username,
    'state' => $attemp->user_state->descri,
    'id' => $attemp->id
  ];
}

echo json_encode([
  'records' => $data,
  'queryRecordCount' => $queryRecordsCount,
  'totalRecordCount' => $totalRecordsCount
]);
