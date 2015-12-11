<!-- INCIANDO AS VARIAVEIS SESSION -->
<?php
ob_start();
session_start();
//CONEXAO BANCO
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

  <title>Home</title>
  <link rel="icon" href="imagems/icone.png">
  <link href="css/estilos.css" rel="stylesheet">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" media="screen">

</head>

<body>
<!-- MENU ADM -->
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
            <a href="postagem.php">Postagens</a>
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
            //ADMINISTRADOR
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
  <section>
      <div class="form-horizontal">
      <h1 class="text-center">Atualizar Usuário</h1>
      <hr>
      <form method="POST" >

                    

            <div class="form-group">
                
            </div>
            <!-- INTERFACE -->
            <div class="form-group">
                <label class="control-label col-xs-3">nome de Usuario:</label>
                <div class="col-xs-6">
                    <input type="text" name="usuario" class="form-control" placeholder="<?php echo $_SESSION['nome']; ?>">
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
                    <a href="visualisarUsuario.php" class="btn btn-danger btn-mini"><i class="icon-remove"></i>  Cancelar</a>
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
</div>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>

</body>
</html>
<?php
//CAPTURA DADOS
	if(isset( $_POST["atualizar"])){
$nome =$_SESSION['nome'];
$user = $_POST['usuario'];
$pass = $_POST['senha'];
$email = $_POST['email'];	
$sql = "UPDATE `bdops`.`usuario` SET `login` = '$user', `senha` = '$pass', `email` = '$email' WHERE `usuario`.`login` = '$nome';";
$resultado = mysqli_query ($conexao,$sql) or die("erro na query"); 
    
    echo "<script> alert ('Atualizado com sucesso'); location.href='visualisarUsuario.php'</script>"; exit;
	}


	?>
