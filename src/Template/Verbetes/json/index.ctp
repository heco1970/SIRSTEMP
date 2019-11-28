<?php
$data = [];
foreach ($records as $record) {
  $data[] = [
    'created' => $record->created->i18nFormat('yyyy-MM-dd HH:mm:ss'),
    'modified' => $record->modified->i18nFormat('yyyy-MM-dd HH:mm:ss'),
    'pessoa' => $record->pessoa->nome,
    'criacao' => $record->datacriacao,
    'distribuicao' => $record->datadistribuicao,
      'efectivo' => $record->datainicioefectiva,
    'id' => $record->id,
  ];
}

