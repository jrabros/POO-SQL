<pre><?php
	$banco = new mysqli("localhost", "root", "", "bd_games");
	if($banco->connect_errno){
		echo "<p>Encontrei um erro $banco -> errno --> $banco->connect_error</p>";
		die();
	}
	
	$busca = $banco->query("select * from generos");
	if(!$busca) {
		echo "<p>A busca não aconteceu</p>";
	}
	else{
		while($reg = $busca->fetch_object()){
		print_r($reg);
		}
	}
?>