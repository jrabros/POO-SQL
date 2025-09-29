<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Listagem de jogos</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="estilos/style.css" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
	<?php
	require_once "includes/banco.php";
	require_once "includes/funcoes.php";
	$ordem = $_GET['o'] ?? "n";
	$chave = $_GET['c'] ?? "";

	?>
	<div id="corpo">
		<h1><?php include_once 'topo.php'; ?>Escolha seu jogo</h1>
		<form method="get" id="busca" action="index.php">
			Odernar: <a href="index.php?o=n&c=<?php echo $chave; ?>">Nome</a> | <a href="index.php?o=p&c=<?php echo $chave; ?>">Produtora</a> | <a href="index.php?o=n1&c=<?php echo $chave; ?>">Nota Alta</a> | <a href="index.php?o=n2&c=<?php echo $chave; ?>">Nota Baixa</a> | <a href="index.php">Todos</a> | Buscar: <input type="text" name="c" size="10" maxlength="40" /><input type="submit" value="Ok" />
		</form>
		<table class="listagem">
			<?php
			$q = "select j.cod, j.nome, g.genero, j.capa, p.produtora from jogos j join generos g on j.genero = g.cod join produtoras p on j.produtora = p.cod";
			if (!empty($chave)) {
				$q .= " where j.nome like '%$chave%' or p.produtora like '%$chave%' or g.genero like '%$chave%'";
			}
			switch ($ordem) {
				case "p":
					$q .= " order by p.produtora";
					break;
				case "n1":
					$q .= " order by j.nota desc";
					break;
				case "n2":
					$q .= " order by j.nota asc";
					break;
				default:
					$q .= " order by j.nome";
			}
			$busca = $banco->query($q);
			if (!$busca) {
				echo "<tr><td> A busca não aconteceu";
			} else {
				if ($busca->num_rows == 0) {
					echo "Não há jogos cadastrados";
				} else {
					while ($reg = $busca->fetch_object()) {
						$t = thumb($reg->capa);
						echo "<tr>
							<td><img class='mini' src='$t'/></td>
							<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a>[$reg->genero]<br>$reg->produtora	<td>Adm</td>
						</tr>";
					}
				}
			}
			?>
		</table>
	</div>
	<?php
	include_once "rodape.php";
	?>
</body>