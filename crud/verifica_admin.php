<?php 

// Inicia sessão de admin
	session_start();
//vertifica se é usuario admin logado, se nao for nao prosegue
if($_SESSION["email_usuario"] !== 'admin@admin.com'){
	session_destroy();
	exit;
	header("Location: login.html");
}
// Verifica se existe os dados da sessão de login 
if(!isset($_SESSION["id"]) || !isset($_SESSION["nome_usuario"])) 
{ 
	// Usuário não logado! Redireciona para a página de login 
	header("Location: login.html");
	session_destroy();
	exit; 
}

	 
?>