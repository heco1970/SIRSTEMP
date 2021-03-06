<?php
$data = [];
foreach ($records as $record) {
    $data[] = [
        'data' => $record->data->i18nFormat('dd/MM/yyyy'),
        'referencia' => $record->referencia,
        'observacoes' => $record->observacoes,
        'utilizador' => $record->utilizador,
        'ultima_alteracao' => $record->ultima_alteracao,
        'ref_pagamento' => $record->ref_pagamento,
        'data_pagamento' => $record->data_pagamento->i18nFormat('dd/MM/yyyy'),
        'valor' => $record->valor,
        'data_emissao' => $record->data_emissao->i18nFormat('dd/MM/yyyy'),
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
