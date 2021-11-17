<!-- SMARV Informática MEI (91)98156-5857-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Incluindo Livro</title>
</head>

<body>
	
<?php 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
$nome = $_POST ["nome_livro"];
$autor = $_POST ["autor"];
$datacad = $_POST ["DataCad"];
//Converte a data do formato YYYY-MM-DD para YYYYMMDD
$datacad_convertido = str_replace("-","",$datacad);
//Obtém email do GET . pagina anterior.
$email_cliente=$_GET["email"];

include("conexao.php");
$inclui="INSERT INTO livros (nome,autor,data_cadastro,cadastrador) VALUES ('$nome','$autor','$datacad_convertido','$email_cliente')";	
$sucesso=mysqli_query($conexao,$inclui) or die(mysqli_error($conexao));
if($sucesso){
		echo "<script>
					alert('Cadastro Incluido com sucesso.');
					window.location='/biblyos/consulta_livros.php';
			</script>";
}
	else{
	 	echo "<script>
				alert('Erro! Verifique se o cadastro ja consta na lista!');
				window.location='/biblyos/consulta_livros.php';
			</script>";
	}
	
//mysqli_close($mysqli);
	
	
?> 
</body>
</html>
<!-- SMARV Informática MEI (91)98156-5857-->
