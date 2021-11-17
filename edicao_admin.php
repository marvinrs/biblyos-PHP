<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- Aqui Verifica se o usuario admin está logado -->
<?php require "crud/verifica_admin.php";?>
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- SMARV Informática (91)98156-5857-->
<head>	        
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Edição de Livro</title>
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-size: x-small;
}
.style3 {color: #0000FF; font-size: x-small; }
-->
</style>
</head>

<body bgcolor="#FFFFF0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<?php 
	include("crud/conexao.php");
	//Coloca valor do CNPJ, Tipdoc e numnfc vindo via ahref em uma variável
	$id = $_GET ["id"];	
	//consulta tabela pra saber os outros valores da linha
	$sql = mysqli_query($conexao, "SELECT * FROM livros WHERE id='$id'") or die(mysqli_error($conexao));
	$aux = mysqli_fetch_assoc($sql);
?><!-- Pega os parâmetros da página anterior-->
<form id="documento" name="documento" method="post" action="crud/editar_admin.php?id=<?php echo $id?>" onsubmit="">
  <table width="100%" border="1">
	  <tr><div align="center"><img src=img/logo.png></div></tr>
	  <tr><th colspan="2" align="center" valign="top"><h2>Edição de Livro </h2></th>
	  </tr>
    <tr>
      <td width="138">Nome:</td>
      <td width="835"><input name="nome" type="text" value="<?php echo $aux["nome"]; ?>" placeholder="Digite o nome" id="nome" value="" size="80" title="Digite o nome do Livro" maxlength="80" required=""/>
        <span class="style1">*</span> <span class="style3"></span></td>
    </tr>
	</tr>
	  <tr>
      <td width="138">Autor:</td>
      <td width="835"><input name="autor" type="text" value="<?php echo $aux["autor"]; ?>" placeholder="Digite o autor do livro" id="autor" value="" size="80" title="Digite o nome do Livro" maxlength="80" required=""/>
        <span class="style1">*</span> <span class="style3"></span></td>
    </tr>
    <tr>
      <td>Data de Cadastro:</td>
      <td>	  
	  <?php
	  // transforma a data do formato YYYMMDD para YYYY-MM-DD para ser lido no campo tipo "date"
	  $datcad = $aux["data_cadastro"];
	  $DAT_TRACO_1 = substr_replace($datcad, '', 4, 0);;
	  $DAT_TRACO_2 = substr_replace($DAT_TRACO_1, '', 7, 0);;
	  ?>
	    <input type="date" value="<?php echo $DAT_TRACO_2; ?>" required="required" maxlength="10" name="DataCad" id="DataCad" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" min="2012-01-01" max="2300-08-03" />        
          </td>
	</tr>		
    <tr>	
      <td colspan="2"><p>
        <input name="cadastrar" type="submit" id="cadastrar" value="Confirmar" /> 
        <br />		
          <span class="style1">* Campos com * s&atilde;o obrigat&oacute;rios!          </span></p>
		  <br />
		  <input type="button" value="Voltar" onClick="history.go(-1)">
      </td>
    </tr>
	
  </table>
</form>
</body>
</html>
<!-- SMARV Informática (91)98156-5857-->