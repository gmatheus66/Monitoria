<?php 

require 'config.php';


$nome = $_POST['nome']?? false;
$tipo = $_POST['tipo']?? false;
$velocidade = $_POST['velocidade']?? false;
$montadora = $_POST['select-montadora']?? false;
$montadora_dt = trim($montadora);

if ($nome ==  false || $tipo == false || $velocidade == false || $montadora == false) {
	redirect("carro.php?msg=Todos os campos precisam ser preenchidos");
}

$dados = join("," ,[$nome,$tipo, $velocidade, $montadora_dt]). "\n";

$handle = fopen(CRS_FILE, 'a');
fwrite($handle, $dados);
fclose($handle);

redirect("carro.php?msg=Carro Adicionado");

 ?>