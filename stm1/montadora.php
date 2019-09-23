<?php 

require 'head.php';
require 'config.php';

$data =  file(MNT_FILE);


?>

<?php if(!empty($_GET['msg'])):  ?>
	<div>
		<h4><?= $_GET['msg'] ?></h4>
	</div>
<?php endif ?>

<table class="mon-table">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $id => $dt): ?>
			<tr>
				<td><?= $dt ?></td>
				<td><a href="deletemont.php?id=<?= $id ?>">&times;</a></td>
			</tr>
		<?php endforeach ?>

	</tbody>
</table>

<form class="form-mon" action="addmontadora.php" method="POST">
	<fieldset class="main-form">
		<legend>Adicionar Montadora</legend>
		<input class="input-mon" type="text" name="nome" placeholder="Nome da Montadora">
		<input class="btn-mon" type="submit" value="Adicionar">
	</fieldset>

</form>
	
</body>
</html>