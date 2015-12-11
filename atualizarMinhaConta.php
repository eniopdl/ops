<!-- INCIANDO AS VARIAVEIS SESSION -->
<?php
ob_start();
session_start();
//CONEXAO COM BANCO
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Ops</title>
	<link rel="icon" href="imagems/icone.png">
	<link href="css/estilos.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../..//css/AdminLTE.min.css">
	<!-- iCheck -->
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
			<!-- MENU -->
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
                             <!-- MENU -->
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
	
<div class="container">
	<section>
		<!-- INTERFACE DA PAGINA E CAPTURANDO OS DADOS PREENCHENDO OS COMPONENTES TEXT  -->
		<div class="form-horizontal">
			<h1 class="text-center">Atualizar Minha Conta</h1>
			<hr>
			<form action="" method="POST" >
				
				<div class="form-group">
					<label class="control-label col-xs-3">Login:</label>
					<div class="col-xs-6">
						<input type="text" name="login" class="form-control" placeholder="<?php echo $_SESSION['loginuser']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3">Email:</label>
					<div class="col-xs-6">
						<input type="text" name="email" class="form-control" placeholder="<?php echo $_SESSION['email']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3">Senha:</label>
					<div class="col-xs-6">
						<input type="text" name="senha" class="form-control" placeholder="<?php echo $_SESSION['senha']; ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-offset-3 col-xs-10">
						<button type="submit" name="atualizar" class="btn btn-info">Atualizar</button>
						<a href="minhaconta.php" class="btn btn-danger btn-mini"><i class="icon-remove"></i>  Cancelar</a>
					</div>
				</div>
			</form>
		</div>
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


<?php
//CAPTURO OS DADOS
	if(isset( $_POST["atualizar"])){


$user = $_SESSION['user'];
$login = $_POST['login'];
$pass = $_POST['senha'];
$email = $_POST['email'];
//ATUALIZAR USUARIO	
$sql = "UPDATE `bdops`.`usuario` SET `login` = '$login', `senha` = '$pass', `email` = '$email' WHERE `usuario`.`login` = '$user';";
$resultado = mysqli_query ($conexao,$sql) or die("erro na query"); 
		
		echo "<script> alert ('Atualizado com sucesso'); location.href='minhaconta.php'</script>"; exit;
	}


	?>
