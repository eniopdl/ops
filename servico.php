<?php
include("connection.php");

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<title>Postagem</title>
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
<li><a href="servico.php">Serviços</a></li>
<li><a href="contato.php">Contato</a></li>
</ul>
</nav>

<section>
<div class="form">
      <h1>Criar Postagem</h1>
	  <hr>
      <form  action="" method="POST" enctype="multipart/form-data">
		<p>Nome do local:<input type="text" name="local" placeholder="Local"></p>
		<p>Rua:<input type="text" name="rua" value="" placeholder="Rua"></p>
        <p>Bairro:<input type="text" name="bairro" value="" placeholder="Bairro"></p>
        <p>Cidade:<input type="text" name="cidade" value="" placeholder="Cidade"></p>
		<p>Estado:<input type="text" name="estado" value="" placeholder="Estado"></p>
		<p>Comentar:<textarea name="comentar" rows="10" cols="40" maxlength="500"></textarea></p>
        <input type="file" multiple name="arq[]" id="arq"><input name="envia" type="submit" value="Postar">
      </form>
    </div>

</section>

<footer>
<h5>Desenvolvido por Enio, Queila, Marcos, Flávia, Felipe.Todos direitos reservados 2015</h5>
</footer>



</body>
</html>
<?php
//verifica se o botão foi clicado
if(isset($_POST['envia'])){

$local = trim(strip_tags($_POST["local"]));
$rua = trim(strip_tags($_POST["rua"]));
$bairro = trim(strip_tags($_POST["bairro"]));
$cidade = trim(strip_tags($_POST["cidade"]));
$estado = trim(strip_tags($_POST["estado"]));
$comentar = trim(strip_tags($_POST["comentar"]));


	//variável que armazena a pasta de upload
	
	$file = $_FILES['arq'];
	$numFile = count(array_filter($file['name']));
	$folder = 'upload/postagens/';
	$permite = array('image/jpeg' , 'image/png');
	$maxSize = 1024 * 1024 *5;
	
	for ($i=0 ; $i <= $numFile; $i++) {
	
	$name = $file['name'][$i];
	$type = $file['type'][$i];
	$size = $file['size'][$i];
	$error = $file['error'][$i];
	$tmp = $file['tmp_name'][$i];
	
	$extensao = @end(explode('.', $name));
	$novoNome = rand().".$extensao";
	
	move_uploaded_file($tmp, $folder.'/'. $novoNome);
	
	$sql = "INSERT INTO postagem(local, rua, bairro, cidade, estado, cometario, imagem, data) VALUES ";
		$sql .= "('$local', '$rua', '$bairro', '$cidade', '$estado', '$comentar', '$novoNome', '2015')";
		$resultado = mysqli_query ($conexao,$sql) or die("erro na query"); 
		
		echo "<script> alert ('Poster cadastrado com sucesso'); location.href='postar.php'</script>"; exit;

	}
	
	}


?>