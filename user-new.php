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
            if(!is_admin()){
                echo msg_erro('Area restrita, apenas administradores');
            } else {
                if(!isset($_POST['usuario'])){
                    require "user-new-form.php";
                } else {
                    $usuario = $_POST['usuario'] ?? null;
                    $nome = $_POST['nome'] ?? null;
                    $senha1 = $_POST['senha1'] ?? null;
                    $senha2 = $_POST['senha2'] ?? null;
                    $tipo = $_POST['tipo'] ?? null;
                    
                    if($senha1 === $senha2){
                        echo msg_sucesso("certo pra gravar");
                    } else {
                        echo msg_erro("Senhas não conferem");
                        require "user-new-form.php";
                    }
                }
            }
            echo voltar();
        ?>
	</div>
</body>
</html>
	