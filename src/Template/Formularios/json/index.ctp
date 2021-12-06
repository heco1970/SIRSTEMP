<?php
$data = [];
$records = $records->toArray();
foreach ($records as $record) {
  $data[] = [
    'designacao_entidade' => $record->designacao_entidade,
    'nome_prestador_trabalho' => $record->nome_prestador_trabalho,
    'pedido' => $record['pedido']['id'],
    'equipa' => $record['team']['nome'],
    'id' => $record->id
  ];
}

echo json_encode([
  'records' => $data,
  'queryRecordCount' => $queryRecordsCount,
  'totalRecordCount' => $totalRecordsCount
]);
