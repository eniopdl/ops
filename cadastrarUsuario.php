<?php

include("connection.php");

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<title>Cadastro</title>
<meta name="description" content="aqui você encontra conteudo na area de infraestrutura">
<link rel="icon" href="imagem/icone.png">
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>
<header>

          <ul>
          &nbsp &nbsp &nbsp <img src="imagem/logo.png"  height="100px" alt="ops"> 
			
          <a href="login.php">LOGIN</a>  &nbsp 
           <a href="cadastrarUsuario.php">CADASTRE-SE</a>
          </ul>         
        
        
       
</header>

<nav>

<ul>
<li><a href="index.php">Início</a></li>
<li><a href="postar.php">Postagens</a></li>
<li><a href="contato.php">Contato</a></li>
</ul>
</nav>

<section>
<div class="form">
      <h1>Cadastrar Usuário</h1>
	  <hr>
      <form action="cadastrarUsuario.php?pag=checkLogin" method="POST" >
		<p>Nome:<input type="text" name="nome" placeholder="Nome"></p>
        <p>Login:<input type="text" name="login"  placeholder="Login"></p>
        <p>Senha:<input type="password" name="senha"  placeholder="Senha"></p>
		<p>Email:<input type="text" name="email"  placeholder="Email"></p>
        <p class="submit"><input type="submit" name="commit" value="Cadastrar"></p>
      </form>
    </div>

</section>

<footer>
<h5>Desenvolvido por Enio, Queila, Marcos, Flávia, Felipe.Todos direitos reservados 2015</h5>
</footer>



</body>
</html>
<?php
	if(isset( $_GET["pag"])){
$nome = $_POST["nome"];
$user = $_POST["login"];
$pass = $_POST["senha"];
$email = $_POST["email"];
	if($user=="" OR $pass=="" OR $nome=="" OR $email=="" ){
echo "<script> alert ('Preencha todos os campos'); location.href='cadastrarUsuario.php'</script>";
}
$sql = "INSERT INTO usuario(nome, login, senha, email, permissao) VALUES ";
		$sql .= "('$nome','$user','$pass','$email','0')";
		$resultado = mysqli_query ($conexao,$sql) or die("erro na query"); 
		
		echo "<script> alert ('Usuário cadastrado com sucesso'); location.href='login.php'</script>"; exit;
	}

?>