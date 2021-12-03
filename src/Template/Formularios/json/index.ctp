<?php
$data = [];
foreach ($records as $record) {
  $data[] = [
    'nome_prestador_trabalho' => $record->nome_prestador_trabalho,
    'actividade_exercida' => $record->actividade_exercida,
    'dr_ds' => $record->dr_ds,
    'id' => $record->id,
  ];
}

echo json_encode([
  'records' => $data,
  'queryRecordCount' => $queryRecordsCount,
  'totalRecordCount' => $totalRecordsCount
]);
