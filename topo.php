<?php
    echo "<header class = 'pequeno'>";
    if(empty($_SESSION['user'])) {
       echo "<a href='user-login.php'>Entrar</a>"; 
    } else {
        echo "Olá, " . $_SESSION['nome'] . " | ";
        echo " Meus Dados | ";
        if(is_admin()) {
            echo "<a href = 'user-new.php'>Novo usuario</a> | ";
            echo "Novo jogo | ";
        }
        echo " | <a href='user-logout.php'>Sair<a>";
    }
    echo "</header>";
?>