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

	<title>Pesquisar Usuario</title>
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
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" ><img src="imagems/logo.png" width="50px"></a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li>
						<a href="areaadm.php">Início</a>
					</li>
					<li>
						<a href="postaradm.php">Postagens</a>
					</li>
					<li>
						<a href="contatoadm.php">Contato</a>
					</li>
					<li>
						<a href="servicoadm.php">Criar Postagem</a>
					</li>
					<li>
						<a href="postaradm.php">Pesquisar Postagem</a>
					</li>
					<li>
						<a href="visualisarUsuario.php">Pesquisar Usuário</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<h4><?php
						echo $_SESSION['useradm'];
						?>
						</h4>
					</li>
					<li>
						<a href="sair.php">Sair</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
<div class="container" id="conteudo">
        <section class="container-fluid">
            <h3 class="text-center">Lista de Usuário Cadastardo</h3>
            <hr/>
			<form action="" method="POST">
				<div class="col-sm-12 controls">
					<input   type="text" class="form-control" name="codigo" value="" placeholder="Informe o Código do Usuario a ser excluido ou editado"> 
                    <p class="submit"> <input id="btn-login" type="submit" class="btn btn-danger" name="excluir" value="Excluir"> <input id="btn-login" type="submit" class="btn btn-danger" name="editar" value="Editar"> </p>
                  	                                      
                 </div>

			</form>
             <br>
			 <div class="form-goup">
				    <table border=1 width=99% height=30% align="center" cellpadding=1 cellspacing=1> 
					<td>Código</td>   
					<td>Usuário</td> 
					<td>Senha</td> 
					<td>Email</td>  
					</tr> 		
					<?php
						$resultado = mysqli_query ($conexao,	"SELECT * FROM usuario");
						$linhas = mysqli_num_rows ($resultado);
							for ($i=0 ; $i<$linhas ; $i++)
						{
							$reg = mysqli_fetch_row($resultado);						
						echo " <td>$reg[0]</td> <td>$reg[1]</td> <td>$reg[2]</td> <td>$reg[3]</td></tr>";

						 
						}
					?>
				</table>
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
		
			$codigo = $_POST["codigo"];
			$_SESSION['codigo'] = $codigo;
			if($codigo==""){
								echo "<script> alert ('Preencha o campo'); location.href='visualisarUsuario.php'</script>"; exit;

							}
		$sql = "DELETE FROM usuario WHERE id=$codigo";
		$resultado = mysqli_query ($conexao,$sql); 
		$linhas = mysqli_affected_rows($conexao);
	if($linhas==1)
		{ 
		echo "<script> alert ('Usuário excluído com sucesso!'); location.href='visualisarUsuario.php'</script>"; exit;

		}
		
		else
		{ 
		echo "<script> alert ('Usuário não encontrado!'); location.href='visualisarUsuario.php'</script>"; exit;

		}
	
	}


if(isset( $_POST['editar'])){
			
			$codigo = $_POST["codigo"];
		
		if($codigo==""){
			echo "<script> alert ('Preencha o campo'); location.href='visualisarUsuario.php'</script>"; exit;

		}


	
	$check2 = mysqli_query ($conexao,	"SELECT * FROM usuario WHERE id='$codigo'") or die ("erro na query");
	$linhas2 = mysqli_num_rows($check2);
	if($linhas2){
		$dadosUsuario = mysqli_fetch_array($check2);
		
			
		$user = $dadosUsuario["login"];
		$email = $dadosUsuario["email"];
		$pass = $dadosUsuario["senha"];

		$_SESSION['nome'] = $user;
		$_SESSION['email'] = $email;
		$_SESSION['senha'] = $pass;
		
		header("Location: atualizarUsuarioADM.php"); exit;
	}

	}


	
	?>
