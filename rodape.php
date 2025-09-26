<?php
    echo "<footer>
        <p>Acessado por " . $_SERVER['REMOTE_ADDR'] . "<br/>Projeto de Cadastro de Jogos - &copy; 2025<br/>Desenvolvido por João</p> " . date('d/m/y') . "</footer>";
    $banco->close();
?>
