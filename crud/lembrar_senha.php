<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lembrar minha senha</title>
</head>
<body>
	
	<?php
	 // conexão
		
		include("conexao.php");
		
	 // busca dados da tabela
		$email = $_POST['email'];
		$pesquisa_senha = "SELECT senha FROM usuarios WHERE email = '$email'"; 
	 	$resultado = mysqli_query($conexao, $pesquisa_senha) or die(mysqli_error($conexao));
		while ($row = $resultado->fetch_assoc()) {
			echo "Sua senha é: ".$row['senha'];
			/*
			//Faz a configuração do envio de e-mail de acordo com a Locaweb
			$headers = "MIME-Version: 1.1\n";
			$headers .= "Content-type: text/html; charset=utf-8\n";
			$headers .= "X-Priority: 3\n";
			$headers .= "From: marvinregosantos@gmail.com\n";
			$headers .= "cc: ".$email."\n";

			if(!mail($email, "Recuperação Senha Biblyos","Sua senha do Sistema Biblyos Gerenciador de Bibliotecas é ".$row['senha'], $headers ,"-r"."marvinregosantos@gmail.com")){ // Se for Postfix
				$headers .= "Return-Path: " . "marvinregosantos@gmail.com" . "\n"; // Se "não for Postfix"
				//mail("ti@linave.com.br", "Cupom desconto", "Oi", $headers );
}
		*/	
		}
		
	

	?>
<!--<script>

	setTimeout(function voltar() {
		history.go(-2);;
	}, 4000)

</script>
-->
</body>
</html>