<?Php

$dataretirada = '2023-01-01';
$datadevolucao = date('Y-m-d', strtotime($dataretirada . ' + 30 days'));
echo $datadevolucao;
?>