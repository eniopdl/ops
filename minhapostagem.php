<?php
ob_start();
session_start();

include("connection.php");

?>

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
     <link  href="https://google-developers.appspot.com/maps/documentation/javasript/examples/default.css" rel="stylesheet">
<script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
<script>
var geocoder;
var map;
function initialize(){
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-8.3661457,-40.3277001);
    var mapOptions={
        zoom:8,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
        
        <?php
                    


                    $usuario = $_SESSION['user'];
                    //recupera id usuario
                    $resultado4 = mysqli_query ($conexao,   "SELECT usuario.id FROM usuario WHERE login='$usuario'");
                    $linhas4 = mysqli_num_rows ($resultado4);
                   for ($q=0 ; $q<$linhas4 ; $q++)
                        {
                            $reg4 = mysqli_fetch_row($resultado4);
                            $user = $reg4['0'];
                        }
                    
                    //mostrar ppostagem
            

              

            $resultado = mysqli_query ($conexao,    "SELECT  endereco.rua, endereco.bairro, endereco.cidade, endereco.Estado , postagem.local, postagem.imagem, postagem.data, postagem.comentario, postagem.id_otimo, otimo.cont, otimo.imgc, postagem.id_regula, regula.cont, regula.imgc, postagem.id_pessimo, pessimo.cont, pessimo.imgc  FROM postagem 
                INNER JOIN usuario ON usuario.id = postagem.id_usuario
                INNER JOIN endereco ON endereco.id = postagem.id_endereco 
                INNER JOIN otimo ON otimo.id= postagem.id_otimo 
                INNER JOIN regula ON regula.id= postagem.id_regula
                INNER JOIN pessimo ON pessimo.id= postagem.id_pessimo
                WHERE postagem.id_usuario = '$user'");
                $linhas = mysqli_num_rows ($resultado);

             for ($i=0 ; $i<$linhas ; $i++)
            {
                $reg = mysqli_fetch_row($resultado);
                
                $local = "$reg[4] $reg[0] $reg[1] $reg[2] $reg[3] ";
           ?>
        var address = "<?php echo $local; ?>";
        geocoder.geocode( { 'address' : address}, function(results, status){
        if(status == google.maps.GeocoderStatus.OK){
        map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                animation: google.maps.Animation.BOUNCE,
                title: "<?php echo $reg[4]; ?>",
                position : results[0].geometry.location
        });
        } else {
            alert('Geocode was not successful for the following reason: '+ status);
        }
    });

<?php } ?>

}


    
 
</script>

</head>

<body onload="initialize()">
         
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
            <h3 class="text-center">Minhas Postagens</h3>
            <hr/>
            <div class="navbar-right"  id="map_canvas" style="height:90%; width:50%; top:30px"></div>
			<?php
                    


                    $usuario = $_SESSION['user'];
                    //recupera id usuario
                    $resultado4 = mysqli_query ($conexao,   "SELECT usuario.id FROM usuario WHERE login='$usuario'");
                    $linhas4 = mysqli_num_rows ($resultado4);
                   for ($q=0 ; $q<$linhas4 ; $q++)
                        {
                            $reg4 = mysqli_fetch_row($resultado4);
                            $user = $reg4['0'];
                        }
                    
                    //mostrar ppostagem
            

              

            $resultado = mysqli_query ($conexao,    "SELECT  endereco.rua, endereco.bairro, endereco.cidade, endereco.Estado , postagem.local, postagem.imagem, postagem.data, postagem.comentario, postagem.id_otimo, otimo.cont, otimo.imgc, postagem.id_regula, regula.cont, regula.imgc, postagem.id_pessimo, pessimo.cont, pessimo.imgc  FROM postagem 
                INNER JOIN usuario ON usuario.id = postagem.id_usuario
                INNER JOIN endereco ON endereco.id = postagem.id_endereco 
                INNER JOIN otimo ON otimo.id= postagem.id_otimo 
                INNER JOIN regula ON regula.id= postagem.id_regula
                INNER JOIN pessimo ON pessimo.id= postagem.id_pessimo
                WHERE postagem.id_usuario = '$user'");
            $linhas = mysqli_num_rows ($resultado);

             for ($i=0 ; $i<$linhas ; $i++)
            {
                $reg = mysqli_fetch_row($resultado);


            echo "<h4>Endereço: &nbsp $reg[0] ;$reg[1]; $reg[2]; $reg[3] </h4>";
            echo "<h4>Nome do Local: $reg[4]</h4> ";
            echo "<table><tr><td><br><img src='uploads/$reg[5] '  width='400px' height='300px' /></td> </table>";  
            echo " <h6>$reg[6] </h6> <h4>$reg[7]</h4>";
            echo "<table text='center'> <tr> <td> $reg[9] ótimo </td> <td> $reg[12] regular </td> <td> $reg[15] pessimo</td> </tr>";
            echo " <tr> <td>  <img src='curtir/$reg[10]' width='60px' height='40px'></td>";
            echo "<td> <img src='curtir/$reg[13]' width='60px' height='40px'> </td>";
            echo "<td><img src='curtir/$reg[16]' width='60px' height='40px'> </td> </tr> </table>";   
            echo "<hr/>";
            
            }


        
            ?>

        </section>
        <footer id="footer-gradiente">
            <nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
             <div class="row">
                <div class="span12">
                    <p class="text-center">&copy;  Ops - Todos os direitos Resevados 2015.</p>
                </div>
            </div>
        </nav>
    </footer>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>

</body>

</html>
