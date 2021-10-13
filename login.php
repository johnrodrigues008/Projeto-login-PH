<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>
<body>
	


<?php
	include_once 'conexao.php';

	if(isset($_POST['usuario'])) {
		// 
		if($_POST['usuario'] != ''){
			//
			$_SESSION['usuario'] = $_POST['usuario'];
			$_SESSION['senha'] = $_POST['senha'];

			$chave = $_POST['usuario'];
			$senha = $_POST['senha'];

			$sql = "SELECT * FROM usuarios WHERE usuario = '$chave'";

			// executa a query
			if ($resultado = mysqli_query($conexao,$sql)){
				$campos = mysqli_fetch_array($resultado);

				$usuario = $campos['usuario'] ?? '';

				if ($campos['senha'] == $senha){

					$_SESSION['usuario'] = $campos['usuario'];
					$_SESSION['senha'] = $campos['senha'];
					$_SESSION['incluir'] = $campos['incluir'];
					$_SESSION['alterar'] = $campos['alterar'];
					$_SESSION['excluir'] = $campos['excluir'];
					$_SESSION['consultar'] = $campos['consultar'];
					$_SESSION['ativo'] = $campos['ativo'];
					$_SESSION['comprar'] = $campos['comprar'];
					$_SESSION['vender'] = $campos['vender'];

					if($campos['ativo'] == 'S'){
						header('Location: ./index.php');
					}
					else
					{
						echo '<br> Usuario não ativo, não pode logar<br>';
					}
				}
				else
				{
					echo '<br> senha diferente, usuario não cadastrado';
				}
				
			}
		}
	}

?>
	<fieldset>
		<form action="login.php" method="POST">
			<table>
				<tr>
					<td>Usuário:</td>
					<td><input type="text" name="usuario"></td>
				</tr>
				<tr>
					<td>Senha:</td>
					<td><input type="text" name="senha"></td>
				</tr>
			</table>
			<br>
			<button>Logar</button>
		</form>
		<br>
		<br>
		<a href="fechar.php"><button>Sair</button></a>
	</fieldset>
</body>
</html>