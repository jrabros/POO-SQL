<?php 
    require_once "includes/banco.php";
	require_once "includes/login.php";
    require_once "includes/funcoes.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Listagem de jogos</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="estilos/style.css" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<title>???</title>
    <style>
        div#corpo {
            width: 300px;
            margin: auto;
            border: 1px solid black;
            padding: 10px;
            border-radius: 10px;
        }
        td {
            padding: 5px;
        }
    </style>
</head>
<body>
	<div id="corpo">
        <?php
            $u = $_POST['usuario'] ?? null;
            $s = $_POST['senha'] ?? null;
            if(is_null($u) || is_null($s)) {
                require "user-login-form.php";
            } else {
                $q = "select usuario, nome, senha, tipo from usuarios where usuario = '$u' LIMIT 1";
                $busca = $banco->query($q);
                if(!$busca) {
                    msg_erro('Falha na busca por usuário');
                } else {
                    if($busca->num_rows > 0) {
                        $reg = $busca->fetch_object();
                    if(testarHash($s, $reg->senha)) {
                        echo msg_sucesso('Logado com sucesso');
                        $_SESSION['user'] = $reg->usuario;
                        $_SESSION['nome'] = $reg->nome;
                        $_SESSION['tipo'] = $reg->tipo;
                    } else {
                        echo msg_erro('Senha inválida');     
                        }
                    }
                    else {
                        echo msg_erro('Usuário inexistente');
                    }
                }
            }
            echo voltar();
        ?>
	</div>
</body>
</html>