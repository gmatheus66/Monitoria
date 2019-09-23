<?php 

require 'head.php';
require 'config.php';

$id = $_GET['id'];

if (!isset($id)) {
	redirect("carro.php");
}

$data = file(CRS_FILE);


$carros = array_map('explodir', $data);

//var_dump($id);
//var_dump($carros[$id]);

?>

 <table class="info-table">
 	<thead>
 		<tr>
 			<th>Nome</th>
 			<th>Tipo</th>
 			<th>Velocidade</th>
 			<th>Montadora</th>
 			<th>Delete</th>
 		</tr>
 	</thead>
	<tbody>
		<tr>
			<td><?= $carros[$id]['Nome'] ?></td>
			<td><?= $carros[$id]['Tipo'] ?></td>
			<td><?= $carros[$id]['Velocidade'] ?></td>
			<td><?= $carros[$id]["Montadora"] ?></td>
			<td><a href="deletecarro.php?id=<?= $id ?>">&times;</a></td>
		</tr>
	</tbody>



 </table>


 	
 </body>
 </html>