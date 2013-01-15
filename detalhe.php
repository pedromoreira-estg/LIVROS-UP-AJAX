<?php
	$id = $_POST['id'];
	include_once 'config.php';
	$db = new mysqli($host,$user,$pass,$dbase) or die("erro = ligacao falhou a $host");
	
	$sql= "SELECT ano,preco,sinopse FROM livros WHERE id='$id'";
	
	$result = $db->query($sql);
	
	if ($db->errno) {
		die($db->error);
	}
	
	$detlivro = $result->fetch_object();
	
	echo json_encode($detlivro);
?>