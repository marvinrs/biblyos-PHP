<?php require "verifica_cliente.php"; ?>
<!-- SMARV Informática MEI (91)98156-5857-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Alteracao de Dados do Livro</title>
</head>

<body>
	
<?php 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO
$nome = $_POST ["nome"];
$autor = $_POST ["autor"];
$datcad	= $_POST ["DataCad"];

echo $nome;
echo $autor;


$id = $_GET ["id"];
//Converte a data do formato YYYY-MM-DD para YYYYMMDD
$datcad_convertida = str_replace("-","",$datcad);
echo $datcad_convertida;
//Realiza conexão com banco de dados
include("conexao.php");
//Grava query de atualização
$altera="UPDATE livros SET nome='$nome',autor='$autor',data_cadastro='$datcad_convertida' WHERE id='$id'";		
//Associa a query com a conexão
$sucesso=mysqli_query($conexao,$altera) or die (mysqli_error($conexao)); 
if($sucesso):
		echo "<script>
					alert('Cadastro Alterado com sucesso.');
					window.location='/biblyos/consulta_livros.php';
			</script>";
	else:	 	
		echo "<script>
				alert('Erro! Verifique se o cadastro ja consta na lista!');
				window.location='/biblyos/consulta_livros.php';
			</script>";
	endif;
	
mysqli_close($cx);	
?> 
</body>
</html>
<!-- SMARV Informática MEI (91)98156-5857-->