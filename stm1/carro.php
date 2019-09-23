<?php 
require 'head.php';
require 'config.php';

$data = file(MNT_FILE);

$data_crs = file(CRS_FILE);

$carro = [];


$carros = array_map('explodir', $data_crs);
//var_dump($carros);

?>

<?php if(!empty($_GET['msg'])):  ?>
	<div>
		<h4><?= $_GET['msg'] ?></h4>
	</div>
<?php endif ?>


<table class="crs-table">	
	<thead>
		<tr>
			<th>Nome</th>
			<th>Tipo</th>
			<th>Informações</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($carros as $id => $dd):?>
			<tr>
				<td><?= $dd['Nome'] ?></td>
				<td><?= $dd['Tipo'] ?></td>
				<td><a href="informacoes.php?id=<?= $id ?>"> Mais</a></td>
				<td><a href="deletecarro.php?id=<?= $id ?>">&times;</a></td>

			</tr>

		<?php endforeach ?>
	</tbody>
</table>



<form action="addcarro.php" method="POST" class="add-carro">
	<fieldset class="main-form-crs">
		<legend>Adicionar Carro</legend>
	<input class="ipt" type="text" name="nome" placeholder="Nome do Carro">
	<input class="ipt" type="text" name="tipo" placeholder="Tipo do Carro">
	<input class="ipt" type="number" name="velocidade" placeholder="Velocidade Maxima" >
	<!--select com as montadoras -->
	<select name="select-montadora" class="slt-mon">
		<?php foreach($data as $dt): ?>
			<option value="<?= $dt ?>"><?= $dt ?></option>		
		<?php endforeach ?>
	</select>
	<input class="btn-mon" type="submit" value="Adicionar">
	</fieldset>

</form>

	
</body>
</html>