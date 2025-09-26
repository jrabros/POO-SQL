<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Jogo</title>
    <link rel="stylesheet" href="estilos/style.css" />
</head>
<body>
    <?php
        require_once "includes/banco.php";
        require_once "includes/funcoes.php";
    ?>
    <div id = "corpo">
        <?php
            include_once 'topo.php';
            $c = $_GET['cod'] ?? 0;
            $busca = $banco->query("select * from jogos where cod = $c");
        ?>
        <h1>Detalhes do Jogo</h1>
        <table class="detalhes">
            <?php
                if(!$busca){
                    echo "A busca deu erro";
                } else {
                    if($busca->num_rows == 1){
                        $reg = $busca->fetch_object();
                        echo "<tr><td rowspan='3'><img class=full src='" . thumb($reg->capa) . "'/>";
                        echo "<td><h2>$reg->nome</h2>";
                        echo "Nota: " . number_format($reg->nota, 1) . "/ 10.0 ";
                        echo "<tr><td><p>$reg->descricao</p>";
                        echo "<tr><td>Adm";
                    } else {
                        echo "<tr><td>Jogo inexistente";
                    }
                }
            ?>
        </table>
        <a href="index.php"> <img src="icones/icoback.png"/> </a>
    </div>
</body>
</html>