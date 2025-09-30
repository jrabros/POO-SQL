<?php
	$banco = new mysqli("localhost", "root", "", "bd_games"); //  host, user, senha, banco
	// testar a conexao
	if($banco->connect_errno){
		echo "<p>Encontrei um erro $banco -> errno --> $banco->connect_error</p>";
		die();
	}
	// fazer uma busca
	//$busca = $banco->query("select * from generos");
	//if(!$busca) {
	//	echo "<p>A busca não aconteceu</p>";
	// }
	//else{
	//	while($reg = $busca->fetch_object()){
	//	print_r($reg);
	//	}
	//}
?>