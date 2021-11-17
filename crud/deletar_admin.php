<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include "crud/verifica_admin.php";?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Exclui Livro</title>
</head>
<body background="background="clouds.gif"">	
	<?php
	
	include("conexao.php");

$id = $_GET["id"];

		//Aqui $conaxao é referente ao código conexao.php
     $deleta = mysqli_query($conexao,"DELETE FROM livros WHERE ID='$id'") or die(mysqli_error($conexao));

	if($deleta):
		echo "<script>
					alert('Documento excluido com sucesso.');
					window.location='/biblyos/gerencia_livros.php';
			</script>";
	else:
	 	echo "<script>
				alert('Infelizmente não foi possível excluir.');
				window.location='/biblyos/gerencia_livros.php';
			</script>";
	endif;

?>
		
</body>
</html>
<!-- SMARV Informática MEI (91)98156-5857-->