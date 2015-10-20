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
<form action="" method="POST">
		 <input type='submit'  name='excluir' value='Excluir' >
			<input type='text' name='codigo'  placeholder='codigo postagem'>
			</form>
			<br>
		
<?php
$resultado = mysqli_query ($conexao,	"SELECT * FROM postagem");
		$linhas = mysqli_num_rows ($resultado);
		echo "<p><b>Postagens</b></p>";
		echo " <table border='1px'><tr> <td>Postagem</td>  <td>Nome do local</td> <td>Rua</td> <td>Bairro</td>";
		echo "<td>Cidade</td> <td>Estado</td> <td>Comentário</td> <td>Imagem</td> <td>Data</td> </tr>";
		for ($i=0 ; $i<$linhas ; $i++)
		{
			$reg = mysqli_fetch_row($resultado);  

			
			echo "<tr> <td>$reg[0]</td> <td>$reg[1]</td> <td>$reg[2]</td> <td>$reg[3]</td>";
			echo "<td>$reg[4]</td> <td>$reg[5]</td> <td>$reg[6]</td>  ";
			echo "<td><img src='upload/postagens/$reg[7] '	width='50px' /></td>  <td>$reg[8]</td>  </tr>";
		    
			}
		?>
		</table>
</section>

<footer>
<h5>Desenvolvido por Enio, Queila, Marcos, Flávia, Felipe.Todos direitos reservados 2015</h5>
</footer>



</body>
</html>
<?php
	
	if(isset( $_POST['excluir'])){
		
		$codigo = $_POST["codigo"];
		if($codigo==""){
		echo "<script> alert ('Preencha o campo'); location.href='postaradm.php'</script>"; exit;

		}
		$sql = "DELETE FROM postagem WHERE id=$codigo";
		$resultado = mysqli_query ($conexao,$sql); 
		$linhas = mysqli_affected_rows($conexao);
		if($linhas==1)
		{ 
		echo "<script> alert ('Postagem excluído com sucesso!'); location.href='postaradm.php'</script>"; exit;

		}
		
		else
		{ 
		echo "<script> alert ('não encontrado!'); location.href='postaradm.php'</script>"; exit;

		}
	}
	
	
