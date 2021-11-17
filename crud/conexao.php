<?php
	// Conexão do Banco de Dados
		$servidor = 'localhost';
		$usuario = 'root';
		$senha = '';
		$banco = 'biblyos';

		$conexao = mysqli_connect($servidor, $usuario, $senha);
		
		if($conexao){
			mysqli_select_db($conexao, $banco);
		}else{
			echo '<h1>Falha na conexão. Erro.</h1>';
		}
?>