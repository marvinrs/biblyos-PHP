<!-- SMARV Informática MEI (91)98156-5857-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- Aqui Verifica se o usuario admin está logado -->
<?php require "crud/verifica_admin.php";?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Biblyos - Admin - Gerencia Livros</title>
<style type="text/css">

<!-- estilo da barra de rolagem -->

div.rolagem {
    background-color: #eee;
    width: 1330px;
    height: 170px;
    overflow: auto;
	border: 2px dotted red;
}

<!-- Estilo do menu -->
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}



<!-- Estilo da tabela -->

table {
    border-collapse: collapse;
    width: 50%;	
    border: 1px solid black;
}

th, td {
    text-align: left;
    padding: 3px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #ba0000;
    color: white;  
}

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
<form id="documento" name="documento" method="post" action="crud/incluir_livro_admin.php" onsubmit="return is_cnpj(document.documento.CNPJ.value); return false;">
  <table width="100%" border="0">
      <tr><div align="center"><img src=img/logo.png></div></tr>
	  <tr>	  
	  <div class="topnav">
		<a class="active" href="gerencia_livros.php">Ver Livros</a>
		<a href="crud/sair.php">Sair</a>
	  </div>
	  </tr>
	  <tr><th colspan="2" align="center" valign="top"><h2>Cadastro de Novos Livros</h2></th>
	  </tr>
    <tr>
      <td width="138">Nome do Livro:</td>
      <td width="835"><input name="nome_livro" type="text" id="nome_livro" value="Digite o nome do livro" size="45" title="Digite o nome do livro" maxlength="80" required=""/>
        <span class="style1">*</span></td>
    </tr>
	<tr>
      <td width="138">Autor do Livro:</td>
      <td width="835"><input name="autor" type="text" id="autor" value="Digite o autor" size="50" title="Digite o nome do autor" maxlength="80" required=""/>
        <span class="style1">*</span></td>
    </tr>	
    <tr>
      <td>Data de Cadastro:</td>
      <td><input type="date" required="required" maxlength="10" name="DataCad" id="DataCad" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" min="2012-01-01" max="2300-08-03" />
        <!-- <input type="text" name="DataRec" placeholder="data" id="DataRec" size="6" pattern="\s*(\S\s*){6,}" maxlength="10" required=""/> <span class="style1">*</span><span class="style3"> Formato DDMMAAAA</span> -->
      </td>
	</tr>	
    <tr>
      <td colspan="2"><p>		
        <input name="cadastrar" type="submit" id="cadastrar" value="Confirmar" /> 
        <br />		
          <input name="limpar" type="reset" id="limpar" value="Limpar Campos preenchidos!"/>
          <br />
          <span class="style1">* Campos com * s&atilde;o obrigat&oacute;rios!          </span></p>
      </td>
    </tr>
  </table>
</form>

<script>
//Muda o campo de texto ao pressionar Enter
$("input, select", "form") // busca input e select no form
.keypress(function(e){ // evento ao presionar uma tecla válida keypress
   
   var k = e.which || e.keyCode; // pega o código do evento
   
   if(k == 13){ // se for ENTER
      e.preventDefault(); // cancela o submit
      $(this)
      .closest('tr') // seleciona a linha atual
      .next() // seleciona a próxima linha
      .find('input, select') // busca input ou select
      .first() // seleciona o primeiro que encontrar
      .focus(); // foca no elemento
   }

});
</script>	
	<!-- Lista cada documento-->	
	<?php 
	include("crud/conexao.php");	
	$sql = mysqli_query($conexao, "SELECT *,date_format(data_cadastro,'%d/%m/%Y') data_cadastro FROM livros ORDER BY nome");	
	//echo '<div class="rolagem">';	
	echo '<table width="100%" border="1">';
	echo '<thead><tr>';
	echo '<th align="center">Nome do Livro</th>';
	echo '<th align="center">Autor</th>';
	echo '<th align="center">Data Cadastro</th>';
	echo '</tr></thead>';	
	echo '<tbody>';
	while($aux = mysqli_fetch_assoc($sql)) { 
		echo '<tr>';
		echo '<td>'.$aux["nome"].'</td>';
		echo '<td>'.$aux["autor"].'</td>';
		echo '<td>'.$aux["data_cadastro"].'</td>';
		echo '<td align=center><a href=edicao_admin.php?id='.$aux['id'].'><img src=img/editar.png></a></td>';
		echo '<td align=center><a href=crud/deletar_admin.php?id='.$aux['id'].'><img src=img/excluir.png></a></td>';		
		echo '</tr>';
		}
	echo '</tbody></table>';//</div>';


?>	
</body>
</html>
<!-- SMARV Informática MEI (91)98156-5857-->

