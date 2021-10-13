 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>teste 2</title>
</head>
<body>

<?php 

session_start();

echo $coisa;

echo "<br>";

print_r($_SESSION);

echo "<br>";

echo $_SESSION['coisa'];

?>


</body>
</html>