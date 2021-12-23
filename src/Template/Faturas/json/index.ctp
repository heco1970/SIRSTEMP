<?php
$data = [];
$records = $records->toArray();
$this->log('AQUIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII');
$this->log($records);
foreach ($records as $record) {
    $data[] = [
        'data' => $record->data,
        'referencia' => $record->referencia,
        'observacoes' => $record->observacoes,
        'utilizador' => $record->utilizador,
        'ultima_alteracao' => $record->ultima_alteracao,
        'ref_pagamento' => $record->ref_pagamento,
        'data_pagamento' => $record->data_pagamento,
        'valor' => $record->valor,
        'data_emissao' => $record->data_emissao,
        'num_fatura' => $record->num_fatura,
        'nip' => $record->nip,
        'pagamento' => $record['pagamento']['estado'],
        'unidade' => $record['unit']['designacao'],
        'entidadejudicial' => $record['entidadejudiciai']['descricao'],
        'id' => $record->id
    ];
}

echo json_encode([
    'records' => $data,
    'queryRecordCount' => $queryRecordsCount,
    'totalRecordCount' => $totalRecordsCount
]);
