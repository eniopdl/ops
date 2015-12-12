
<?php
//conexao com banco
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

  <title>Cadastre-se</title>
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
<!-- menu da apgina index -->

  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" ><img src="imagems/logo.png" width="50px"></a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li>
            <a href="index.php">Início</a>
          </li>
          <li>
            <a href="postar.php">Postagens</a>
          </li>
          <li>
            <a href="contato.php">Contato</a>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
              <li>
               <a href="login.php" >Login</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- interface cadastrar usuario -->

  <div class="container" id="conteudo">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1>Cadastro de Usuário</h1>
      </div>
    </div>
    <section>
      <div class="container-fluid">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
          <div class="panel panel-info" >
            <div class="panel-heading">
              <div class="panel-title text-center">Registrar-se</div>
            </div>     
            <div style="padding-top:30px" class="panel-body" >
              <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>       
              <form  action="cadastrarUsuario.php?pag=checkLogin" method="POST" id="loginform" class="form-horizontal" role="form">                  
                <div style="margin-bottom: 25px" class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input  name="login" type="text" class="form-control" name="username" value="" placeholder="Usuário">                                        
                </div>
                <div style="margin-bottom: 25px" class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                  <input  name="email" type="text" class="form-control" name="username" value="" placeholder="Email">                                        
                </div>
                <div style="margin-bottom: 25px" class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input name="senha" type="password" class="form-control" name="password" placeholder="Senha">
                </div>
                <div style="margin-top:10px" class="form-group form-vertical ">
                  <!-- Button -->
                  <div class="col-sm-12 controls">
                    <p class="submit" id="btn-login"><input class="btn btn-success" type="submit" name="commit" value="Cadastrar">
                    <a id="btn-login" href="index.php" class="btn btn-danger">Cancelar</a></p>
                    <!--<a id="btn-fblogin" href="#" class="btn btn-primary">Login com Facebook</a>-->
                  </div>
                </div>
                <div class="form-group text-right">
                    <div class="col-md-12 control">
                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                          Ir para tela de
                          <a href="login.php" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                          LOGIN
                          </a>
                        </div>
                    </div>
                </div>      
              </form>     
            </div>                     
          </div>  
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
//captura acao do form 
if(isset( $_GET["pag"])){

     
//recebendo dados da interface 
  $user = $_POST["login"];
  $email = $_POST["email"];
  $pass = $_POST["senha"];
  //verifica se os campos preenchidos
  if($user=="" OR $email=="" OR $pass=="" ){
    echo "<script> alert ('Preencha todos os campos'); location.href='cadastrarUsuario.php'</script>"; exit;
  }
  //insere o usuario
  $sql = "INSERT INTO usuario( login, email, senha,  permissao) VALUES ";
  $sql .= "('$user','$email','$pass','0')";
  $resultado = mysqli_query ($conexao,$sql) or die("erro na query"); 
  
  echo "<script> alert ('Usuário cadastrado com sucesso'); location.href='login.php'</script>"; exit;
}

?>