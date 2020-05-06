<?php
$data = [];
foreach ($records as $record) {
  $data[] = [
    'created' => $record->created->i18nFormat('dd/MM/yyyy HH:mm:ss'),
    //'modified' => $record->modified->i18nFormat('dd/MM/yyyy HH:mm:ss'),
    'pessoa' => $record->pessoa->nome,
    'criacao' => $record->datacriacao->i18nFormat('dd/MM/yyyy'),
    'distribuicao' => $record->datadistribuicao->i18nFormat('dd/MM/yyyy'),
    'efectivo' => $record->datainicioefectiva->i18nFormat('dd/MM/yyyy'),
    'id' => $record->id,
  ];
}

echo json_encode([
  'records' => $data,
  'queryRecordCount' => $queryRecordsCount,
  'totalRecordCount' => $totalRecordsCount
]);