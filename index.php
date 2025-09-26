<!DOCTYPE html>
<html lang = "pt-br">
<head>
	<title>Listagem de jogos</title>
	<meta charset = "UTF-8"/>
	<link rel="stylesheet" href="estilos/style.css" />
</head>
<body>
	<?php
		require_once "includes/banco.php";
		require_once "includes/funcoes.php";
	?>
	<div id="corpo">
		<h1>Escolha seu jogo</h1>
		<table class="listagem">
			<?php
				$q = "select j.cod, j.nome, g.genero, j.capa, p.produtora from jogos j join generos g on j.genero = g.cod join produtoras p on j.produtora = p.cod";
				$busca = $banco->query($q);
				if(!$busca) {
					echo "<tr><td> A busca não aconteceu";
				} else {
					if ($busca->num_rows == 0){
						echo "Não há jogos cadastrados";
					} else {
						while ($reg = $busca->fetch_object()){
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
</body>