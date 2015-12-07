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

    <title>Postagens</title>
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
            <h3 class="text-center">Informações Postadas</h3>
            <hr/>
            <?php
            if(isset( $_GET['otimo'])){
                $otimo = $_GET['otimo'];
                $sql = "UPDATE `bdops`.`otimo` SET `cont` = `cont`+'1', `imgc` = 'userOtimo.png' WHERE `otimo`.`id` = '$otimo'";
                $resultado = mysqli_query ($conexao,$sql) or die("erro na query otimo"); 
                header("Location: postagemCurtidaUser.php"); exit;
            }

            if(isset( $_GET['regula'])){
                $regula = $_GET['regula'];
                $sql1 = "UPDATE `bdops`.`regula` SET `cont` = `cont`+'1', `imgc` = 'userRegula.png'  WHERE `regula`.`id` = '$regula'";
                $resultado1 = mysqli_query ($conexao,$sql1) or die("erro na query regula"); 
                header("Location: postagemCurtidaUser.php"); exit;
            }
            if(isset( $_GET['pessimo'])){
                $pessimo = $_GET['pessimo'];
                $sql2 = "UPDATE `bdops`.`pessimo` SET `cont` = `cont`+'1', `imgc` = 'userPessimo.png' WHERE `pessimo`.`id` = '$pessimo'";
                $resultado2 = mysqli_query ($conexao,$sql2) or die("erro na query pessimo");
                header("Location: postagemCurtidaUser.php"); exit;
            }



            ?>

            <?php

            $resultado = mysqli_query ($conexao,    "SELECT endereco.rua, endereco.bairro, endereco.cidade, endereco.Estado , postagem.local, postagem.imagem, postagem.data, postagem.comentario, postagem.id_otimo, otimo.cont, otimo.img, postagem.id_regula, regula.cont, regula.img, postagem.id_pessimo, pessimo.cont, pessimo.img  FROM postagem 
                INNER JOIN endereco ON endereco.id = postagem.id_endereco 
                INNER JOIN otimo ON otimo.id= postagem.id_otimo 
                INNER JOIN regula ON regula.id= postagem.id_regula
                INNER JOIN pessimo ON pessimo.id= postagem.id_pessimo
                ORDER BY postagem.id DESC");
            $linhas = mysqli_num_rows ($resultado);

            for ($i=0 ; $i<$linhas ; $i++)
            {
                $reg = mysqli_fetch_row($resultado);


            echo "<h4>Endereço: &nbsp $reg[0] ;$reg[1]; $reg[2]; $reg[3] </h4>";
            echo "<h4>Nome do Local: $reg[4]</h4> ";
            echo "<table><tr><td><br><img src='uploads/$reg[5] '  width='400px' height='300px' /></td> <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</td> <td><iframe src='https://www.google.com/maps/embed?pb=$reg[0]$reg[1]$reg[2]$reg[3]+Brasil' width='300' height='250' frameborder='0' style='border:0' allowfullscreen></iframe></td></table>";  
            echo " <h6>$reg[6] </h6> <h4>$reg[7]</h4>";
            echo "<table text='center'> <tr> <td> $reg[9] ótimo </td> <td> $reg[12] regular </td> <td> $reg[15] pessimo</td> </tr>";
            echo " <tr> <td> <a href='postaruser.php?otimo=$reg[8]' > <img src='curtir/$reg[10]' width='100px' height='50px'> </a> </td>";
            echo "<td><a href='postaruser.php?regula=$reg[11]'> <img src='curtir/$reg[13]' width='100px' height='50px'></a> </td>";
            echo "<td><a href='postaruser.php?pessimo=$reg[14]'><img src='curtir/$reg[16]' width='100px' height='50px'></a> </td> </tr> </table>";   
            echo "<hr/>";
            
            }


            ?>

        </section>
        <footer id="footer-gradiente">
            <nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
             <div class="row">
                <div class="span12">
                    <p class="text-center">&copy; Ops - Todos os direitos Resevados 2015</p>
                </div>
            </div>
        </nav>
    </footer>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>

</body>

</html>
