<?php
ob_start();
session_start();

include("connection.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<title>Home</title>
<meta name="description" content="aqui você encontra conteudo na area de infraestrutura">
<link rel="icon" href="imagem/icone.png">
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>
<header>

          <ul>
          &nbsp &nbsp &nbsp <img src="imagem/logo.png"  height="100px" alt="ops"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
			<a href="sair.php">Sair</a> 
          </ul>         
        
        
       
</header>

<nav>

<ul>
<li><a href="index.php">Início</a></li>
<li><a href="postar.php">Postagens</a></li>
<li><a href="minhaconta.php">Minha Conta</a></li>
<li><a href="minhapostagem.php">Minha Postagem</a></li>
<li><a href="servico.php">Criar Postagem</a></li>
<li><a href="contato.php">Contato</a></li>
</ul>
</nav>

<section>
<div class="form">
      <h1>Atualizar Minha Conta</h1>
	  <hr>
      <form action="" method="POST" >
	    
		
        <p>Login:<input type="text" name="login" value="<?php echo $_SESSION['user']; ?>"></p>
        <p>Senha:<input type="password" name="senha" value="<?php echo $_SESSION['senha']; ?>"></p>
		<p>Email:<input type="text" name="email"  value="<?php echo $_SESSION['email']; ?>" </p>
        <p class="submit"><input type="submit" name="atualizar" value="Atualizar"></p>
      </form>
    </div>

</section>

<footer>
<h5>Desenvolvido por Enio, Queila, Marcos, Flávia, Felipe.Todos direitos reservados 2015</h5>
</footer>

</body>
</html>
<?php

	if(isset( $_POST["atualizar"])){


$user = $_SESSION['user'];
$login = $_POST['login'];
$pass = $_POST['senha'];
$email = $_POST['email'];	
$sql = "UPDATE `bdops`.`usuario` SET `login` = '$login', `senha` = '$pass', `email` = '$email' WHERE `usuario`.`login` = '$user';";
$resultado = mysqli_query ($conexao,$sql) or die("erro na query"); 
		
		echo "<script> alert ('Atualizado com sucesso'); location.href='minhaconta.php'</script>"; exit;
	}


	?>
