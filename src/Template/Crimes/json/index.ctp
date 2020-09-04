<?php
$data = [];
foreach ($records as $record) {
  $data[] = [
    'created' => $record->created->i18nFormat('dd/MM/yyyy'),
    //'modified' => $record->modified->i18nFormat('dd/MM/yyyy'),
    'tipocrime' => $record->tipocrime->descricao,
    'processo' => $record->processo->nip,
    'ocorrencia' => $record->ocorrencia,
    'registo' => $record->registo,
    'qte' => $record->qte,
    'apenaspre' => $record->descricao,
    'id' => $record->id,
  ];
  $this->log($record);
}

echo json_encode([
  'records' => $data,
  'queryRecordCount' => $queryRecordsCount,
  'totalRecordCount' => $totalRecordsCount
]);
