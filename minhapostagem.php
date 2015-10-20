<?php
ob_start();
session_start();

include("connection.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<title>Home</title>
<meta name="description" content="aqui você encontra conteudo na area de infraestrutura">
<link rel="icon" href="imagem/icone.png">
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>
<header>

          <ul>
          &nbsp &nbsp &nbsp <img src="imagem/logo.png"  height="100px" alt="ops"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
			<a href="sair.php">Sair</a> 
          </ul>         
        
        
       
</header>

<nav>

<ul>
<li><a href="index.php">Início</a></li>
<li><a href="postar.php">Postagens</a></li>
<li><a href="minhaconta.php">Minha Conta</a></li>
<li><a href="minhapostagem.php">Minha Postagem</a></li>
<li><a href="servico.php">Criar Postagem</a></li>
<li><a href="contato.php">Contato</a></li>
</ul>
</nav>

<section>

<h2>Minhas Postagens</h2>
<hr/>
<?php
		$usuario = $_SESSION['user'];
$resultado = mysqli_query ($conexao,	"SELECT * FROM postagem  WHERE `usuario` = '$usuario'");
		$linhas = mysqli_num_rows ($resultado);
		echo "<p><b>Postagens</b></p>";
		for ($i=0 ; $i<$linhas ; $i++)
		{
			$reg = mysqli_fetch_row($resultado);  
			echo "<div class='tabela'> <table border='1px'><tr>  <td>Nome do local</td> <td>Rua</td> <td>Bairro</td>";
			echo "<td>Cidade</td> <td>Estado</td> <td>Comentário</td> </tr>";
			echo "<tr>  <td>$reg[1]</td> <td>$reg[2]</td> <td>$reg[3]</td>";
			echo "<td>$reg[4]</td> <td>$reg[5]</td> <td>$reg[6]</td> </tr> </table>";
			echo "<br><img src='upload/postagens/$reg[7] '	width='200px' /> <br>Data:&nbsp $reg[8] </div> <br>";
			echo "<input type='submit'  name='pessimo' value='Péssimo' > <input type='submit' name='otimo' value='Ótimo' color='green'>";
			echo "&nbsp <input type='submit' name='regular' value='Regular'  >			<hr/>";
			}

		?>

</section>


<footer>
<h5>Desenvolvido por Enio, Queila, Marcos, Flávia, Felipe.Todos direitos reservados 2015</h5>
</footer>

</body>
</html>