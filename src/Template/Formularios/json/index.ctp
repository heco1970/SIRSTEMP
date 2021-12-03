<?php
$data = [];
$records = $records->toArray();
foreach ($records as $record) {
  $data[] = [
    'nome_prestador_trabalho' => $record->nome_prestador_trabalho,
    'pedido' => $record['pedido']['id'],
    'equipa' => $record['team']['nome'],
  ];
}

echo json_encode([
  'records' => $data,
  'queryRecordCount' => $queryRecordsCount,
  'totalRecordCount' => $totalRecordsCount
]);
