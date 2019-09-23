<?php 

require 'config.php';

$id = $_GET['id'];

$data = file(MNT_FILE);

unset($data[$id]);


file_put_contents(MNT_FILE,  $data);

redirect("montadora.php?msg=Montadora Deletada");



?>