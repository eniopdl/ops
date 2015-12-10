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
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Entrar</title>
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
                        <a href="cadastrarUsuario.php">Registrar</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <div class="container" id="conteudo">
            <section>
                <div class="container-fluid">    
                    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                        <div class="panel panel-info" >
                            <div class="panel-heading">
                                <div class="panel-title">Login</div>
                            </div>     
                            <div style="padding-top:30px" class="panel-body" >
                                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>       
                                <form id="loginform" class="form-horizontal" role="form" action="login.php?pag=checkLogin" method="POST">                  
                                    <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input  name="login" type="text" class="form-control" placeholder="Usuário">                                        
                                    </div>
                                    <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input name="senha" type="password" class="form-control" placeholder="Senha">
                                    </div>   
                                    <div class="input-group">
                                        <div class="checkbox">
                                            <label>
                                              <input id="login-remember" type="checkbox" name="remember" value="1"> Lembrar
                                            </label>
                                        </div>
                                    </div>
                                    <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                                        <div class="col-sm-12 controls form-inline">
                                            <p class="submit"> <input id="btn-login" type="submit" class="btn btn-success" name="logar" value="Entrar"> </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 control">
                                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                                Não tem uma conta! 
                                                <a href="cadastrarUsuario.php" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                                Crie uma agora.
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
if(isset( $_GET['pag'])){
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
            echo "<script> alert ('Logado com Sucesso Bem vindo!'); location.href='areauser.php'</script>"; exit;

        } else {
            echo "<script> alert ('Você não tem permissao!'); location.href='login.php'</script>"; exit;

        }
    }
} else {
    echo "<script> alert ('Senha incorreta'); location.href='login.php'</script>"; exit;
}
}

?>