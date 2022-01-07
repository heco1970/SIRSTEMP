<?php
$data = [];
$records = $records->toArray();
foreach ($records as $record) {
    $data[] = [
        'nome_jovem' => $record->nome_jovem,
        'nif' => $record->nif,
        'data_nascimento' => $record->data_nascimento->i18nFormat('dd/MM/yyyy'),
        'designacao_entidade' => $record->designacao_entidade,
        'data_inicio' => $record->data_inicio->i18nFormat('dd/MM/yyyy'),
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
