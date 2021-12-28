<?php 
$data = [];
foreach($concelhos as $index=>$conc){
    $data[] = ['ID' => $index, 'Designacao' => $conc];
}

echo json_encode($data);

?>