<?php
ob_start();
session_start();

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
<li><a href="contato.php">Contato</a></li>
<li><a href="servico.php">Servico</a></li>

</ul>
</nav>

<section>

<h2>Bem Vindo! &nbsp <?php
echo $_SESSION['user'];
?></h2>
<hr/>
<h5>“OPS” é um aplicativo via web capaz de informar para os usuários que o acessam, problemas relacionados à infraestrutura do local. Nesta versão será voltado para um ambiente interno, compartilhando informações.</h5>
<div class="banner">

</div>

</section>

<footer>
<h5>Desenvolvido por Enio, Queila, Marcos, Flávia, Felipe.Todos direitos reservados 2015</h5>
</footer>

</body>
</html>