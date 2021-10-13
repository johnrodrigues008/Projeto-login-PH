<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>teste 1</title>
</head>
<body>
<?php

session_start();



$_SESSION['coisa'] = 'luciano hulk';


$_SESSION['acao'] = 'incluir';


$coisa = 'hulk';
?>

Olá

<br>

<?php echo $coisa; ?>

<br>

<a href="teste2.php">Clique aqui para ir para o teste 2</a>

</body>
</html>