<?php
	header("Content-Type: text/html; charset=UTF-8");
?>
<html>
	<head>
		<meta charset="UTF-8">
		<script src="/JQuery/jquery-1.8.3.min.js"></script>
		<script>
			$(document).ready(init);
			
			function init() {
				$("form div.ilivro").click(getdetail);
			}
			
			function getdetail(e) {
				thediv = $(e.target);
				theid  = thediv.attr('xid');
				$.post('detalhe.php',{id:theid},function (data) {
				
				var detailobj = $.parseJSON(data);
				alert(detailobj.ano);
				
				var detailHTML = $("<div/>");
				
				var detailTXT = detailobj.ano+' '+detailobj.preco+'<br/>'+detailobj.sinopse;
				detailHTML.html(detailTXT);
				thediv.append(detailHTML);
				});
			}
			
			
		</script>
		<style>
			div {
				margin-top: 5px;
				margin-bottom: 5px;
				background-color: yellow;
				color: maroon;
			}
			
			div input {
				width: 20px;
				margin-left: 10px;
			}
		</style>
	</head>
</html>
<?php
	
	include_once 'config.php';
	
	// ligar à bd
	
	$db = new mysqli($host,$user,$pass,$dbase) or die("erro = ligacao falhou a $host");
	
	$sql= "SELECT id,titulo,autor FROM livros";
	
	$result = $db->query($sql);
	
	if ($db->errno) {
		die($db->error);
	}
	

	
?>
<form action="compra.php" method="post">
<?php
	while($livro = $result->fetch_object()) {
		
		echo "<DIV class='ilivro' xid='$livro->id' >";
		echo $livro->titulo." de ".$livro->autor;
		echo "<input type='text' value='0' name='quantidade[$livro->id]'>";
		echo "</DIV>";
	}
?>

	<input type = "submit">

</form>