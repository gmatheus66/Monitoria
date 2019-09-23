<?php 


define('MNT_FILE','montadoras.csv');
define('CRS_FILE', 'carros.csv');



function redirect($url) {
    header('Location: ' . $url);
    exit();
}

function explodir($vl){

	$carrodata = explode(',', $vl);

	return [
		'Nome' => $carrodata[0],
		'Tipo' => $carrodata[1],
		'Velocidade' => $carrodata[2],
		'Montadora' => $carrodata[3]
	];

}


 ?>