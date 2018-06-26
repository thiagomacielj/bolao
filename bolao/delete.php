<?php 
	include("conexao.php");
	$id = $_GET["id"];
	if(mysql_query("delete from dados where id='$id'")){
		echo "Removido com sucesso!!";
		header('location:index.php');
		exit;
	}else{
		mysql_error();
	}
 ?>