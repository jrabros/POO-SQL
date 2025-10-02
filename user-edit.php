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
	<title>edit</title>
</head>
<body>
	<div id="corpo">
        <?php
            if(!is_logado()){
                echo msg_erro("Favor, efetue o <a href='user-login.php'>login</a> para acessar essa página");
            } else {
                if(!isset($_POST['usuario'])){
                    include "user-edit-form.php";
                } else {
                    $usuario = $_POST['usuario'] ?? null;
                    $nome = $_POST['nome'] ?? null;
                    $tipo = $_POST['tipo'] ?? null;
                    $senha1 = $_POST['senha1'] ?? null;
                    $senha2 = $_POST['senha2'] ?? null;

                    $q = "update usuarios set usuario = '$usuario', nome = '$nome'";

                    if(empty($senha1) || is_null($senha1)){
                        echo msg_aviso("Senha não alterada");
                    } else {
                        if($senha1 === $senha2){
                            $senha = gerarHash($senha1);
                            $q .= ", senha = '$senha'";
                            echo msg_sucesso("Senha alterada com sucesso");
                        } else {
                            echo msg_erro("Senhas não conferem. Tente novamente.");
                        }
                    }
                    $q .= " where usuario = '" . $_SESSION['user'] . "'";
                    if($banco->query($q)){
                        echo msg_sucesso("Usuário alterado com sucesso");
                        logout();
                        echo msg_aviso("Por favor, efetue o login novamente");
                    } else {
                        echo msg_erro("Não foi possível alterar os dados do usuário: " . $banco->error);
                    }
                } 
            }
            echo voltar()
        ?>
	</div>
    <?php require_once "rodape.php";?>
</body>
</html>
	