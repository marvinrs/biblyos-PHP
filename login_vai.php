<?php 
// Inicia sessões 
session_start(); 
 
// Email e Senha informada no login 
$email = isset($_POST["email"]) ? addslashes(trim($_POST["email"])) : FALSE; 
// Recupera a senha, (a criptografando em Whirlpool) - não criptografa
$senha_usuario = isset($_POST["senha"]) ? addslashes(trim($_POST["senha"])) : FALSE; 
//echo $login;
//echo $senha_usuario;
// Usuário não forneceu a senha ou o login 
if(!$email || !$senha_usuario) 
{ 
	echo "Você deve digitar sua senha e email!"; 
	exit; 
} 
 
/** 
* Executa a consulta no banco de dados. 
* Caso o número de linhas retornadas seja 1 o login é válido, 
* caso 0, inválido. 
*/
include("crud/conexao.php");
$SQL 	   	= "SELECT * FROM usuarios WHERE email='$email'";
$result_id 	= @mysqli_query($conexao,$SQL);
$cont   	= mysqli_affected_rows($conexao);
// Caso o usuário tenha digitado um login válido o número de linhas será 1.. 
if($cont > 0) 
{
	// Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão 
	$dados = @mysqli_fetch_array($result_id); 
	// Agora verifica a senha 
	if(!strcmp($senha_usuario, $dados["senha"])) 
	{
	// TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário 
		$_SESSION["id"] = $dados["id"];
		$_SESSION["nome_usuario"] = stripslashes($dados["nome"]); 
		$_SESSION["email_usuario"]= $dados["email"]; 
		if($_SESSION["nome_usuario"] == 'admin'){
			header("Location: gerencia_livros.php");
		}
		else{
			header("Location: consulta_livros.php");
		}
		exit; 
	}
	else
	// Senha inválida 
	{
		echo "Senha invalida!"; 
		exit; 
	}
}
// Login inválido 
else
{
	echo "Login inexistente!"; 
	exit; 
}
?>