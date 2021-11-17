<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cadastrar Cliente</title>
</head>
<body>
	
	<?php
	 // conexão
		
		include("conexao.php");
		
	 // insere dados na tabela
		$nome = $_POST['nome'];
		// se usasse uma codificação $senha = sha1($_POST['senha']);
		$senha = $_POST['senha'];
		$email = $_POST['email'];
	 	$insere_dados = "INSERT INTO usuarios (nome,email,senha,tipo) VALUES('$nome', '$email', '$senha', 'cliente')"; 
		//insere se não há repetição de nome
		/*$insere_dados = "INSERT INTO usuarios(nome,senha,tipo) 
			SELECT '$nome', '$senha', 'cliente'
			FROM DUAL
			WHERE NOT EXISTS(SELECT nome FROM usuarios WHERE nome = '$nome')";*/
		

	 	mysqli_query($conexao, $insere_dados) or die(mysqli_error($conexao));

	 	echo '<h3>Usuário:</h3><h3>Nome: '.$nome.' - Senha: xxx - Foram inseridos!</h3><br>';
				

	?>
<
<!-- Faz voltar pra página anterior-->
<script>

	setTimeout(function voltar() {
		history.go(-2);;
	}, 2000)

</script>

</body>
</html>