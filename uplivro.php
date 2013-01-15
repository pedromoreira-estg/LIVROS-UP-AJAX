<?php
header('Content-Type: text/html; charset=utf-8'); 

//localização temporaria do ficheiro
$file = $_FILES['upfile']['tmp_name'];


// $sfile = file_get_contents($file); 

// echo "<pre>";
// echo $sfile;
// echo "</pre>";

$livros = file($file,FILE_SKIP_EMPTY_LINES);



include_once('config.php');
$db = new mysqli($host,$user,$pass,$dbase) or die("erro = ligacao falhou a $host");

echo("<br>ligação ok</br>");

foreach($livros as $livro) {

echo("-111-");
$campos = explode(';',$livro);
	
	$t = $campos[0];
	$q = $campos[1];
	$a = $campos[2];
	$e = $campos[3];
	$y = $campos[4];
	$p = $campos[5];
	$s = $campos[6];
	
	
$sql = "INSERT INTO livros (titulo,autor,quantidade,sinopse,preco,editora,ano) VALUES('$t','$a','$q','$s','$p','$e','$y')";

$db->query($sql);





}

?>