<?php


include("connection.php");

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<title>Postagens</title>
<meta name="description" content="aqui você encontra conteudo na area de infraestrutura">
<link rel="icon" href="imagem/icone.png">
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>
<header>

          <ul>
          &nbsp &nbsp &nbsp <img src="imagem/logo.png"  height="100px" alt="ops"> 
			
           <a href="login.php">LOGIN</a>  &nbsp 
           <a href="cadastrarUsuario.php">CADASTRE-SE</a>
          </ul>         
        
        
       
</header>

<nav>

<ul>
<li><a href="index.php">Início</a></li>
<li><a href="postar.php">Postagens</a></li>
<li><a href="contato.php">Contato</a></li>
</ul>
</nav>

<section>

<h2>Informações Postadas</h2>
<hr/>
<?php
	if(isset( $_GET['otimo'])){
$otimo = $_GET['otimo'];
$sql = "UPDATE `bdops`.`otimo` SET `cont` = `cont`+'1' WHERE `otimo`.`id` = '$otimo'";
$resultado = mysqli_query ($conexao,$sql) or die("erro na query otimo"); 

}

if(isset( $_GET['regula'])){
$regula = $_GET['regula'];
$sql1 = "UPDATE `bdops`.`regula` SET `cont` = `cont`+'1' WHERE `regula`.`id` = '$regula'";
$resultado1 = mysqli_query ($conexao,$sql1) or die("erro na query regula"); 
}
if(isset( $_GET['pessimo'])){
$pessimo = $_GET['pessimo'];
$sql2 = "UPDATE `bdops`.`pessimo` SET `cont` = `cont`+'1' WHERE `pessimo`.`id` = '$pessimo'";
$resultado2 = mysqli_query ($conexao,$sql2) or die("erro na query pessimo");
}



?>

<?php

$resultado = mysqli_query ($conexao,	"SELECT endereco.rua, endereco.bairro, endereco.cidade, endereco.Estado , postagem.local, postagem.imagem, postagem.data, postagem.comentario, postagem.id_otimo, otimo.cont, otimo.img, postagem.id_regula, regula.cont, regula.img, postagem.id_pessimo, pessimo.cont, pessimo.img  FROM postagem 
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
			echo "<br><img src='upload/postagens/$reg[5] '	width='400px' /> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<iframe src='https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15802.105444582287!2d-34.8876509!3d-8.0476665!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x205965a491ccc6b5!2sHospital+Universit%C3%A1rio+Oswaldo+Cruz!5e0!3m2!1spt-BR!2sbr!4v1447871118685' width='300' height='250' frameborder='0' style='border:0' allowfullscreen></iframe>";  
			echo " <h6>$reg[6] </h6> <h4>$reg[7]</h4>";
			echo "<table text='center'> <tr> <td> $reg[9] ótimo </td> <td> $reg[12] regular </td> <td> $reg[15] pessimo</td> </tr>";
			echo " <tr> <td> <a href='postar.php?otimo=$reg[8]' > <img src='imagem/otimo.png' width='100px' height='50px'> </a> </td>";
			echo "<td><a href='postar.php?regula=$reg[11]'> <img src='imagem/regula.png' width='100px' height='50px'></a> </td>";
			echo "<td><a href='postar.php?pessimo=$reg[14]'><img src='imagem/pessimo.png' width='100px' height='50px'></a> </td> </tr> </table>";	
			echo "<hr/>";
			}
	

		?>
		
</section>

<footer>
<h5>Desenvolvido por Enio, Queila, Marcos, Flávia, Felipe.Todos direitos reservados 2015</h5>
</footer>

</body>
</html>
