<?php
ob_start();
session_start();
if(isset($_SESSION['user'])){
 header("Location: areauser.php"); exit; 
} else if(isset($_SESSION['useradm'])){
 header("Location: areaadm.php"); exit; 
}


include("connection.php");

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<title>Entrar</title>
<meta name="description" content="aqui você encontra conteudo na area de infraestrutura">
<link rel="icon" href="imagem/icone.png">
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>
<header>

          <ul>
          &nbsp &nbsp &nbsp <img src="imagem/logo.png"  height="100px" alt="ops"> 
			
       <a href="login.php">LOGIN</a>  &nbsp 
       <a href="cadastrarUsuario.php">CADASTRE-SE</a> &nbsp 
	   
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
      <h1>Login</h1>
	  <hr>
      <form action="login.php?pag=checkLogin" method="POST">
        <p><input name="login" type="text" placeholder="Login"></p>
        <p><input name="senha" type="password" placeholder="Senha"></p>
        <p class="submit"> <input type="submit" name="logar" value="Entrar"> </p>

		</form>

	  </div>

</section>

<footer>
<h5>Desenvolvido por Enio, Queila, Marcos, Flávia, Felipe.Todos direitos reservados 2015</h5>
</footer>

</body>
</html>

<?php
	if(isset( $_POST['logar'])){
$user = $_POST["login"];
$pass = $_POST["senha"];

	if($user=="" OR $pass==""){
echo "<script> alert ('Preencha todos os campos'); location.href='login.php' </script>";exit;
}
$check = mysqli_query ($conexao,	"SELECT * FROM usuario WHERE login='$user' AND senha='$pass'") or die ("erro na query");
$linhas = mysqli_num_rows($check);
if($linhas > 0) {

$check2 = mysqli_query ($conexao,	"SELECT permissao FROM usuario WHERE login='$user'") or die ("erro na query");
$linhas2 = mysqli_num_rows($check2);
	if($linhas2){
$dadosUsuario = mysqli_fetch_array($check2);
	if($dadosUsuario["permissao"] == 1){
	$_SESSION['useradm'] = $user;
	echo "<script> alert ('Bem vindo ao painel de controle!'); location.href='areaadm.php'</script>"; exit;

} else if($dadosUsuario["permissao"] == 0){
$_SESSION['user'] = $user;
echo "<script> alert ('Bem vindo!'); location.href='areauser.php'</script>"; exit;

} else {
echo "<script> alert ('Você não tem permissao!'); location.href='login.php'</script>"; exit;

}
}
} else {
echo "<script> alert ('Senha incorreta'); location.href='login.php'</script>"; exit;
}
}

?>