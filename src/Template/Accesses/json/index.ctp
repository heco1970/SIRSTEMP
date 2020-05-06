<?php
$data = [];
foreach ($records as $access) {
  $data[] = [
    'created' => $access->created->i18nFormat('dd/MM/yyyy HH:mm:ss'),
    'browser' => $access->browser,
    'browser_version' => $access->browser_version,
    'os' => $access->os, 
    'os_version' => $access->os_version,
    'device' => $access->device, 
    'user' => $admin?$access->user->username:''
  ];
}

echo json_encode([
  'records' => $data,
  'queryRecordCount' => $queryRecordsCount,
  'totalRecordCount' => $totalRecordsCount
]);
