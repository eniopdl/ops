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

	<title>Pesquisar Postagem</title>
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
            <h3 class="text-center">Informações Postadas</h3>
            <hr/>
			<form action="" method="POST">
				<div class="col-sm-12 controls">
                    <input   type="text" class="form-control" name="codigo" value="" placeholder="Informe o código da Postagem a ser excluido">
                    <br>
                    <p class="submit"> <input id="btn-login" type="submit" class="btn btn-danger" name="excluir" value="Excluir"> </p>
                  	                                       
                 </div>
			</form>
			<br>
			<div class="form-goup">
			<?php
			$resultado = mysqli_query ($conexao,	"SELECT * FROM postagem");
					$linhas = mysqli_num_rows ($resultado);
					echo "<p><b>Postagens</b></p>";
					echo " <table border=1 width=99% height=30% align='center' cellpadding=1 cellspacing=1><tr> <td aling='center'>Postagem</td>  <td>Nome do local</td> <td>Rua</td> <td>Bairro</td>";
					echo "<td>Cidade</td> <td>Estado</td> <td>Comentário</td> <td>Imagem</td> <td>Data</td> </tr>";
					for ($i=0 ; $i<$linhas ; $i++)
					{
						$reg = mysqli_fetch_row($resultado);  

						
						echo "<tr > <td>$reg[0]</td> <td>$reg[6]</td> <td>$reg[2]</td> <td>$reg[3]</td>";
						echo "<td>$reg[4]</td> <td>$reg[5]</td> <td aling='center'>$reg[7]</td>  ";
						echo "<td><img src='upload/postagens/$reg[7] '	width='50px' /></td>  <td>$reg[9]</td>  </tr>";
					    
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
		
		if($codigo==""){
		
		echo "<script> alert ('Preencha o campo'); location.href='postaradm.php'</script>"; exit;
		
		}


	$sql = "DELETE FROM `bdops`.`postagem` WHERE `postagem`.`id` = $codigo";
	$resultado = mysqli_query ($conexao,$sql); 
	$linhas = mysqli_affected_rows($conexao);
	if($linhas==1)
	{ 
		echo "<script> alert ('Postagem excluída com sucesso!'); location.href='postaradm.php'</script>"; exit;

	}
	
	else
	{ 
		echo "<script> alert ('Postagem não encontrada!'); location.href='postaradm.php'</script>"; exit;

	}
}

	
	
