<!-- INCIANDO AS VARIAVEIS SESSION -->
<?php
ob_start();
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Home</title>
	<link rel="icon" href="imagems/icone.png">
	<link href="css/estilos.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" media="screen">

</head>

<body>

	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" ><img src="imagems/logo.png" width="50px"></a>
			</div>
			<!-- MENU USUARIO CADASTRADO -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li>
						<a href="areauser.php">Início</a>
					</li>
					<li>
						<a href="postaruser.php">Postagens</a>
					</li>
                     <li>
                        <a href="postagemCurtidaUser.php">Postagens Curtidas</a>
                    </li>
                    					
					<li>
						<a href="servico.php">Criar Postagem</a>
					</li>
					<li>
						<a href="contatouser.php">Contato</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<h4> <?php
						echo $_SESSION['user'];
						?>
						</h4>
					</li>
			 <li class="dropdown"> 
                    <a href="WebInicio.aspx" class="dropdown-toggle" data-toggle="dropdown"><img src="imagems/perfil.png"  /><b class="caret"></b>
                         <ul class="dropdown-menu">
                             
                             <li><a href="minhaconta.php">Meu Perfil</a></li>
					         <li><a href="minhapostagem.php">Minha Postagem</a></li>
					         <li><a href="sair.php">Sair</a></li>
					                     
                         </ul>
                         
                         </a> 
                     </li>
					
				</ul>
			</div>
		</div>
	</nav>
	<div class="container" id="conteudo">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h1>Bem vindo ao Ops!</h1>
			</div>
		</div>
		<section id="sliderhome">
            <div id="slider" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#meuSlider" data-slide-to="0" class="active"></li>
                    <li data-target="#meuSlider" data-slide-to="1"></li>
                    <li data-target="#meuSlider" data-slide-to="2"></li>
                </ol>
                <!-- EFEITO IMAGEM   -->
                <div class="carousel-inner">
                    <div class="item active"><img src="imagems/img7.jpg" alt="Slider 1" /></div>
                    <div class="item"><img src="imagems/img8.jpg" alt ="Slide 2" /></div>
                    <div class="item"><img src="imagems/img9.jpg" alt="Slide 3" /></div>
                </div>
                <a class="left carousel-control" href="#meuSlider" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#meuSlider" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>

        </section>
        <section>
            <div class="row-fluid">
                <div class="span12">
                    <h4 class="text-center">“OPS” é um aplicativo via web capaz de informar para os usuários que o acessam, problemas relacionados à infraestrutura do local. Nesta versão será voltado para um ambiente interno, compartilhando informações.</h4>
                </div>
            </div>
            <div role="main" class="col-md-6 col-md-push-3"></div>
            <aside role="complementary" class="col-md-3 col-md-push-3"></aside>
        </section>
		<footer id="footer-gradiente">
			<nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
				<div class="row">
					<div class="span12">
						<p class="text-center">&copy; Ops - Todos os direitos Resevados 2015.</p>
					</div>
				</div>
			</nav>
		</footer>
	</div>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>

</body>

</html>