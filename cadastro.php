<?php
require 'autoload.php';

$usuario = new App\Loja\Usuario($_POST['nome'], $_POST['senha'], $_POST['genero']);
$contato = new App\Loja\Contato($_POST['email'], $_POST['endereco'], $_POST['cep'], $_POST['telefone']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Curso Strings</title>
</head>
<body>

<div class="mx-5 my-5">
<h1>Cadastro feito com sucesso.</h1>
<p><?php print htmlspecialchars($usuario->getTratamento()); ?>, seguem os dados de sua conta:</p>
<ul class="list-group">
    <li class="list-group-item">Primeiro nome: <?php print htmlspecialchars($usuario->getNome()); ?></li>
    <li class="list-group-item">Sobrenome: <?php print htmlspecialchars($usuario->getSobrenome()); ?></li>
    <li class="list-group-item">Usuário: <?php print htmlspecialchars($contato->getNomeUsuario()); ?></li>
    <li class="list-group-item">Senha: <?php print htmlspecialchars($usuario->getSenha()); ?></li>
    <li class="list-group-item">Telefone: <?php print htmlspecialchars($contato->getTelefone()); ?></li> </li>
    <li class="list-group-item">Email: <?php print htmlspecialchars($contato->getEmail()); ?></li>
    <li class="list-group-item">Endereço: <?php print htmlspecialchars($contato->getEnderecoCep()); ?></li> </li>
</ul>
</div>
</body>
</html>
