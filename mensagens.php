
<?php 

function mensagens($mensagem) {

return "<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>mensagens</title>
</head>
<body>
<form action='index.php' method='POST'>
<br>
<br>
<table>
	<tr>
		<td>
			mensagem:
		</td>
		<td>
			$mensagem
		</td>
	</tr>
</table>
<br>
<br>
<button>Voltar</button>

</body>
</html>";

}

?>