<?php
ob_start();
session_start();

include("connection.php");

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<title>Area ADM</title>
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
<li><a href="contato.php">Contato</a></li>
<li><a href="servico.php">Servico</a></li>
<li><a href="postaradm.php">Pesquisar Postagem</a></li>
<li><a href="postaradm.php">Pesquisar Usuário</a></li>
</ul>
</nav>


<section>

<h2>Lista de Usuários Cadastrados</h2>
<hr/>
		<form action="" method="POST">
		<input type='submit'  name='editar' value='Editar' >  <input type='submit'  name='excluir' value='Excluir' >
			<input type='text' name='codigo'  placeholder='codigo usuário'>
			</form>
			<br>
			<br>
			
			<div class="tabela"> <table border="1px"><tr> <td>Código</td>  <td>Nome</td> <td>Usuário</td> <td>Senha</td> <td>Email</td>  </tr> 
		
<?php
		
		$resultado = mysqli_query ($conexao,	"SELECT * FROM usuario");
		$linhas = mysqli_num_rows ($resultado);
			for ($i=0 ; $i<$linhas ; $i++)
		{
			$reg = mysqli_fetch_row($resultado);  
			
			echo "<table border='1px'> <tr> <td>$reg[0]</td> <td>$reg[1]</td> <td>$reg[2]</td> <td>$reg[3]</td>";
			echo "<td>$reg[4]</td> </tr>"; 
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
		echo "<script> alert ('Preencha o campo'); location.href='visualisarUsuario.php'</script>"; exit;

		}
		$sql = "DELETE FROM usuario WHERE id=$codigo";
		$resultado = mysqli_query ($conexao,$sql); 
		$linhas = mysqli_affected_rows($conexao);
		if($linhas==1)
		{ 
		echo "<script> alert ('Usuário excluído com sucesso!'); location.href='visualisarUsuario.php'</script>"; exit;

		}
		
		else
		{ 
		echo "<script> alert ('Usuário não encontrado!'); location.href='visualisarUsuario.php'</script>"; exit;

		}
	}
	
	if(isset( $_POST['editar'])){
			
			$codigo = $_POST["codigo"];
		
		if($codigo==""){
		echo "<script> alert ('Preencha o campo'); location.href='visualisarUsuario.php'</script>"; exit;

		}else {
		
		
		$check2 = mysqli_query ($conexao,	"SELECT * FROM usuario WHERE id=$codigo") or die ("erro na query");
$linhas2 = mysqli_num_rows($check2);
	if($linhas2){
$dadosUsuario = mysqli_fetch_array($check2);
	
	
$nome = $dadosUsuario["nome"];
$user = $dadosUsuario["login"];
$pass = $dadosUsuario["senha"];
$email = $dadosUsuario["email"];
$_SESSION['codigo'] = $codigo;
$_SESSION['nome'] = $nome;
$_SESSION['loginuser'] = $user;
$_SESSION['senha'] = $pass;
$_SESSION['email'] = $email;
		 header("Location: atualizarUsuario.php"); exit;
	}
	}
}

	
	?>
