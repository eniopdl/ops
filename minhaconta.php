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

<h2>Minha Conta</h2>
<hr/>
<form action="" method="POST">
		<input type='submit'  name='editar' value='Editar' >  <input type='submit'  name='excluir' value='Excluir' >
		
</form>
<br />
<?php
		$usuario = $_SESSION['user'];
		$resultado = mysqli_query ($conexao,	"SELECT * FROM usuario WHERE login='$usuario'");
		$linhas = mysqli_num_rows ($resultado);
			for ($i=0 ; $i<$linhas ; $i++)
		{
			$reg = mysqli_fetch_row($resultado);  
			
			echo "Nome: &nbsp $reg[1] <br />Usuário: &nbsp $reg[2]<br /> Senha: &nbsp $reg[3]<br /> Email: &nbsp $reg[4]";
			echo "<hr/>"; 
			}

		
		
		?>

		
</section>

<footer>
<h5>Desenvolvido por Enio, Queila, Marcos, Flávia, Felipe.Todos direitos reservados 2015</h5>
</footer>

</body>
</html>
<?php
	
	if(isset( $_POST['excluir'])){
		
		
		$sql = "DELETE FROM usuario WHERE login='$usuario'";
		$resultado = mysqli_query ($conexao,$sql); 
		$linhas = mysqli_affected_rows($conexao);
		if($linhas==1)
		{ 
		echo "<script> alert ('Usuário excluído com sucesso!'); location.href='sair.php'</script>"; exit;

		}
		
		else
		{ 
		echo "<script> alert ('Usuário não encontrado!'); location.href='minhaconta.php'</script>"; exit;

		}
	}
	
	if(isset( $_POST['editar'])){
			
		
		$check2 = mysqli_query ($conexao,	"SELECT * FROM usuario WHERE login='$usuario'") or die ("erro na query");
$linhas2 = mysqli_num_rows($check2);
	if($linhas2){
$dadosUsuario = mysqli_fetch_array($check2);
	
$codigo = $dadosUsuario["id"];	
$nome = $dadosUsuario["nome"];
$user = $dadosUsuario["login"];
$pass = $dadosUsuario["senha"];
$email = $dadosUsuario["email"];
$_SESSION['codigo'] = $codigo;
$_SESSION['nome'] = $nome;
$_SESSION['loginuser'] = $user;
$_SESSION['senha'] = $pass;
$_SESSION['email'] = $email;
		 header("Location: atualizarMinhaConta.php"); exit;
	}
	}


	
	?>
