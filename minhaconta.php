<?php
ob_start();
session_start();

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

	<title>Minha Conta</title>
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
			<h1>Minha Conta</h1>
		</div>
	</div>
</div>

<div class="container" id="conteudo">
    <section id="sectionminhaconta" class="container-fluid">
        <h3 class="text-center">Meus Dados</h3>
        <hr/>
		<form  method="POST" class="text-center">
			<div class="bnt-group btn-group-lg" role="group">
				<button name='editar' class="btn btn-info btn-xs"><span class="glyphicon glyphicon-wrench"></span> Editar</button>
				<button name='excluir' class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Excluir</button>	
			</div>		
			<br />
		</form>
		<div id="divminhaconta">
			<?php
			$usuario = $_SESSION['user'];
			$resultado = mysqli_query ($conexao,	"SELECT * FROM usuario WHERE login='$usuario'");
			$linhas = mysqli_num_rows ($resultado);
			for ($i=0 ; $i<$linhas ; $i++)
			{
				$reg = mysqli_fetch_row($resultado);  
				
				echo " Usuário: &nbsp $reg[1] <br />Senha: &nbsp $reg[2]<br /> Email: &nbsp $reg[3] ";
				echo "<hr/>"; 
			}

			
			
			?>
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

if(isset( $_POST['excluir'])){
	
	
	$sql = "DELETE FROM usuario WHERE login='$usuario'";
	$resultado = mysqli_query ($conexao,$sql); 
	$linhas = mysqli_affected_rows($conexao);
	if($linhas==1)
	{ 
		echo "<script> alert ('Usuário excluído com sucesso!'); location.href='sair.php'</script>"; exit;

	}
	
	else
	{ 
		echo "<script> alert ('Usuário não encontrado!'); location.href='minhaconta.php'</script>"; exit;

	}
}

if(isset( $_POST['editar'])){
	
	
	$check2 = mysqli_query ($conexao,	"SELECT * FROM usuario WHERE login='$usuario'") or die ("erro na query");
	$linhas2 = mysqli_num_rows($check2);
	if($linhas2){
		$dadosUsuario = mysqli_fetch_array($check2);
		
		$codigo = $dadosUsuario["id"];	
		$nome = $dadosUsuario["nome"];
		$user = $dadosUsuario["login"];
		$email = $dadosUsuario["email"];
		$pass = $dadosUsuario["senha"];
		
		$_SESSION['codigo'] = $codigo;
		$_SESSION['nome'] = $nome;
		$_SESSION['loginuser'] = $user;
		$_SESSION['email'] = $email;
		$_SESSION['senha'] = $pass;
		
		header("Location: atualizarMinhaConta.php"); exit;
	}
}



?>
