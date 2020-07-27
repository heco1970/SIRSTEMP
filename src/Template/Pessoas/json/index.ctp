<?php
$data = [];
foreach ($records as $record) {
  $data[] = [
    'id' => $record->id,
    'nome' => $record->nome,
    'cc' => $record->cc,
    'nif' => $record->nif,
    'datanascimento' => $record->data_nascimento->i18nFormat('dd/MM/yyyy'), 
    'observacoes' => substr($record->observacoes,0,20),  
  ];
}

echo json_encode([
  'records' => $data,
  'queryRecordCount' => $queryRecordsCount,
  'totalRecordCount' => $totalRecordsCount
]);

