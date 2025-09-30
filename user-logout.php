<!DOCTYPE html>
<?php 
    require_once "includes/banco.php";
	require_once "includes/login.php";
    require_once "includes/funcoes.php";
?>
<html lang="pt-br">
<head>
	<title>Listagem de jogos</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="estilos/style.css" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<title>???</title>
</head>
<body>
	<div id="corpo">
        <?php
            logout();
            echo msg_sucesso("Você saiu do sistema.");
            echo voltar();
        ?>
	</div>
</body>
</html>
	