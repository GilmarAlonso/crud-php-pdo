<?php
function __autoload($classe){
    require_once 'classes/'.$classe.'.class.php'; 
}
$usuario = new Usuarios();
$user = null;
include "./layout/head.php";
include "./layout/menu.php";
if(isset($_GET['acao']) && $_GET['acao'] == 'editar_usuario'){
    $user = $usuario->detalhe($_GET['id']);
}
if(isset($_GET['acao']) && $_GET['acao'] == 'deletar_usuario'){
    $user = $usuario->exclui($_GET['id']);
    header('Location: index.php');
}
if(isset($_POST['id'])){
    $usuario->atualiza($_POST['nome'],$_POST['email'],$_POST['id']);
    $user = $usuario->detalhe($_POST['id']);
?>
<div class="alert alert-success">
    <h1 class="text-center">Usuario editado com sucesso!</h1>
</div>
<?php }
if(!isset($_POST['id']) && isset($_POST['nome'])){
    $usuario->insere($_POST['nome'],$_POST['email']);
?>
<div class="alert alert-success">
    <h1 class="text-center">Usuario inserido com sucesso!</h1>
</div>
<?php }
if($user != null){
?>
<div class="col-md-12">
    <fieldset>
        <legend>Editar usuario!</legend>
        <form method="post" action="#">
        <div class="form-group">
        <input type="hidden" name="id" value="<?=$user->id?>">
            <label for="nome">Nome:</label>
            <input type="text" required name="nome" class="form-control" value="<?=$user->nome?>"></input>
        </div>
        <div class="form-group">
            <label for="nome">E-mail:</label>
            <input type="email" required name="email" class="form-control" value="<?=$user->email?>"></input>
        </div>
        <div class="form-group">
            <button class="btn btn-success">Salvar</button>
        </div>
        </form>
    </fieldset>
</div>
<?php } else {?>
<div class="col-md-12">
    <fieldset>
        <legend>Criar usuario!</legend>
        <form method="post" action="#">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" required name="nome" class="form-control"></input>
        </div>
        <div class="form-group">
            <label for="nome">E-mail:</label>
            <input type="email" required name="email" class="form-control"></input>
        </div>
        <div class="form-group">
            <button class="btn btn-success">Salvar</button>
        </div>
        </form>
    </fieldset>
</div>
<?php } 
include "./layout/footer.php";
?>
