<?php
	include('class/Sorteio.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
	    <title>Sorteio Monetizze</title>
	    <link rel="stylesheet" href="assets/css/style.css">
	</head>

	<body>
	    <div>
	    	<h1>Sorteio Monetizze - Quero ser o ganhador!</h1>
	    	<img id="monetizze" src="assets/img/logo-monetizze.png" alt="Monetizze">
	        <?php 
	        	$jogo = new Sorteio(8, 6);

				$jogo->retornaQtdJogos();
				$jogo->retornaSorteio();

				echo $jogo->validaResultados(); 
			?>
	    </div>
	</body>

</html>