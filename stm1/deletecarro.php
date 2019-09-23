<?php 

require 'config.php';

$id = $_GET['id'];

$data = file(CRS_FILE);

unset($data[$id]);

file_put_contents(CRS_FILE,  $data);

redirect("carro.php?msg=Carro Deletado");

?>