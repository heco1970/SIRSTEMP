<?php 
$data = [];
foreach($freguesias as $index=>$freg){
    $data[] = ['ID' => $index, 'NomeLocalidade' => $freg];
}

echo json_encode($data);

?>