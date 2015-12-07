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

    <title>Criar Postagem</title>
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
        <section class="container-fluid">
            <h3 class="text-center">Cadastrar Postagem</h3>
            <hr/>
           
            <div class="form" >
    
              <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="enviaarquivo" id="enviaarquivo">
              
                <fieldset>

                  <div class="form-group">
                      <label class="col-md-4 control-label" for="textinput">Nome do Local:</label>  
                      <div class="col-md-4">
                          <input id="textinput" name="local" placeholder="Local" class="form-control input-md" type="text">
                      </div>
                  </div>


               
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="textinput">Rua:</label>  
                      <div class="col-md-4">
                          <input id="textinput" name="rua" placeholder="Rua ..." class="form-control input-md" type="text">
                      </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                      <label class="col-md-4 control-label"  for="textinput">Bairro:</label>  
                      <div class="col-md-4">
                          <input id="textinput" name="bairro" placeholder="Bairro" class="form-control input-md" type="text">
                      </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                      <label class="col-md-4 control-label"  for="textinput">Cidade:</label>  
                      <div class="col-md-4">
                          <input id="textinput" name="cidade" placeholder="Cidade" class="form-control input-md" type="text">
                      </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                      <label class="col-md-4 control-label"  for="textinput">Estado:</label>  
                      <div class="col-md-4">
                          <input id="textinput" name="estado" placeholder="Estado" class="form-control input-md" type="text">
                      </div>
                  </div>

                  <!-- Textarea -->
                  <div class="form-group">
                      <label class="col-md-4 control-label"  for="textarea">Comentar:</label>
                      <div class="col-md-4">                     
                        <textarea class="form-control" rows="7" id="textarea" name="comentar"></textarea>
                    </div>
                </div>
                 <!-- carreaga imagem na pasta uploads-->
                <div class="form-group">
                  <label class="col-md-4 control-label"  for="textarea"></label>
                  <div class="col-md-4">
                   <input type="file" name="arq" id="arq">
                  </div>
                </div>

                
                

            <!-- Button -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="singlebutton"></label>
              <div class="col-md-4">
                <button id="singlebutton" name="envia" value="Postar"  class="btn btn-info">Postar</button>
                <a href="areauser.php" class="btn btn-danger btn-large">Cancelar</a>
            </div>
        </div>

    </fieldset>
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
//verifica se o botão foi clicado
$usuario = $_SESSION['user']; 

if(isset($_POST['envia'])){

$local = trim(strip_tags($_POST["local"]));
$rua = trim(strip_tags($_POST["rua"]));
$bairro = trim(strip_tags($_POST["bairro"]));
$cidade = trim(strip_tags($_POST["cidade"]));
$estado = trim(strip_tags($_POST["estado"]));

$comentar = trim(strip_tags($_POST["comentar"]));


  //variável que armazena a pasta de upload da postagem
  
  $pasta = 'uploads/';
   
  //verifica se o arquivo foi enviado se já, exibe a mensagem
  if(file_exists($pasta.$_FILES['arq']['name'])){
    echo "O arquivo já existe.<br>";
  }else{
  //coloco como primeiro parâmetro do $FILES o nome arq pois é o nome da caixa de inserção de arquivo no formulário

    /*Quando você envia um arquivo por um formulário para o PHP ele vai direto para uma pasta temporária usando um nome único e extensão .tmp (dê uma olhada no valor da variável $_FILES['arquivo']['tmp_name']). Esta função move o arquivo dessa pasta para a pasta que você escolheu.*/   

    move_uploaded_file($_FILES['arq'] ['tmp_name'],$pasta . $_FILES['arq'] ['name']);
    $novoNome = $_FILES['arq'] ['name'];
    // caso dê tudo certo os comandos serão executados
     
    
  }



    //inserindo dados do endereco
      $sql1 = "INSERT INTO endereco(rua, bairro, cidade, estado) VALUES ";
    $sql1 .= "( '$rua', '$bairro', '$cidade', '$estado')";
    $resultado1 = mysqli_query ($conexao,$sql1) or die("erro na query insert endereco");
            
            //buscando o id de endereco
      $resultado = mysqli_query ($conexao,  "SELECT endereco.id FROM endereco WHERE rua='$rua'");
        $linhas = mysqli_num_rows ($resultado);
      for ($a=0 ; $a<$linhas ; $a++)
    {
      $reg = mysqli_fetch_row($resultado);
      $endereco = $reg['0'];
    }

     //buscando o id do usuario
      $resultado4 = mysqli_query ($conexao, "SELECT usuario.id FROM usuario WHERE login='$usuario'");
        $linhas4 = mysqli_num_rows ($resultado4);
      for ($q=0 ; $q<$linhas4 ; $q++)
    {
      $reg4 = mysqli_fetch_row($resultado4);
      $user = $reg4['0'];
    }
    //INSERINDO DADOS NA POSTAGEM
    $sql5 = "INSERT INTO `bdops`.`postagem` ( `id_usuario`, `id_endereco`, `id_otimo`, `id_regula`, `id_pessimo` , `local`, `comentario`, `imagem`, `data`) VALUES"; 
      
    $sql5 .= "( '$user', '$endereco', '', '', '', '$local', '$comentar', '$novoNome', NOW())";
    $resultado5 = mysqli_query ($conexao,$sql5) or die("erro na query inserir postagem"); 
    
    //buscando o id da postagem
      $resultado6 = mysqli_query ($conexao, "SELECT postagem.id FROM postagem WHERE imagem='$novoNome'");
        $linhas6 = mysqli_num_rows ($resultado6);
      for ($w=0 ; $w<$linhas6 ; $w++)
    {
      $reg6 = mysqli_fetch_row($resultado6);
      $idPoster = $reg6['0'];
    } 
    // inserindo id da postagem no campo otimo pessimo e regula
    $sql7 = "UPDATE `bdops`.`postagem` SET `id_otimo` = '$idPoster', `id_regula` = '$idPoster', `id_pessimo` = '$idPoster' WHERE `postagem`.`id` = '$idPoster'";
    $resultado7 = mysqli_query ($conexao,$sql7) or die("erro na query pessimo");
        
        //preenchendo tabela otimo
    $sql8 = "INSERT INTO `bdops`.`otimo` ( `id`, `cont`, `img`, `imgc`) VALUES"; 
    $sql8 .= "( '$idPoster', '0', 'otimo.png',, 'notimo.png')";
    $resultado8 = mysqli_query ($conexao,$sql8) or die("erro na query inserir otimo"); 
    
    //preenchendo tabela pessimo
    $sql9 = "INSERT INTO `bdops`.`regula` ( `id`, `cont`, `img`, `imgc`) VALUES"; 
    $sql9 .= "( '$idPoster', '0', 'regula.png', 'nregula.png')";
    $resultado9 = mysqli_query ($conexao,$sql9) or die("erro na query inserir regula"); 
    
    //preenchendo tabela pessimo
    $sql10 = "INSERT INTO `bdops`.`pessimo` ( `id`, `cont`, `img`, `imgc`) VALUES"; 
    $sql10 .= "( '$idPoster', '0', 'pessimo.png', 'npessimo.png')";
    $resultado10 = mysqli_query ($conexao,$sql10) or die("erro na query inserir pessimo"); 
        

    echo "<script> alert ('Postagem Criada com Sucesso '); location.href='postaruser.php'</script>"; exit;




}   



?>