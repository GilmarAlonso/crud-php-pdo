<?php
function __autoload($classe){
	require_once 'classes/'.$classe.'.class.php'; 
}
$usuario = new Usuarios();
include "./layout/head.php";
include "./layout/menu.php";
?>
<div class="col-md-12">
	<fieldset>
		<legend>Os usuarios</legend>
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Id:</th>
					<th>Nome:</th>
					<th>E-mail:</th>
					<th>Ações:</th>
				</tr>
			<tbody>
				<?php	foreach ($usuario->lista() as $key => $user){ ?>
				<tr>
					<td><?= $user->id; ?></td>
					<td><?= $user->nome; ?></td>
					<td><?= $user->email; ?></td>
					<td>
						<a href='crud.php?acao=editar_usuario&id=<?= $user->id; ?>'
							class="btn btn-warning btn-circle">
							<i class="fa fa-pencil"></i>
						</a>
						<a href='crud.php?acao=deletar_usuario&id=<?=  $user->id; ?>'
							class="btn btn-danger btn-circle"
							onclick='return confirm(\"Deseja realmente deletar?\")'>
							<i class="fa fa-trash-o"></i>
						</a>
					</td>
				<?php } ?>
				</tr>
			</tbody>
		</table>
	</fieldset>
</div>
<?php 
include "./layout/footer.php";
?>
