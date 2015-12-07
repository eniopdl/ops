<?php
ob_start();
session_start();


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
$usuario = $_SESSION['user']; 

if(isset($_POST['envia'])){

$local = trim(strip_tags($_POST["local"]));
$rua = trim(strip_tags($_POST["rua"]));
$bairro = trim(strip_tags($_POST["bairro"]));
$cidade = trim(strip_tags($_POST["cidade"]));
$estado = trim(strip_tags($_POST["estado"]));

$comentar = trim(strip_tags($_POST["comentar"]));


	//variável que armazena a pasta de upload da postagem
	
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
	
	
		//inserindo dados do endereco
	    $sql1 = "INSERT INTO endereco(rua, bairro, cidade, estado) VALUES ";
		$sql1 .= "( '$rua', '$bairro', '$cidade', '$estado')";
		$resultado1 = mysqli_query ($conexao,$sql1) or die("erro na query insert endereco");
            
            //buscando o id de endereco
			$resultado = mysqli_query ($conexao,	"SELECT endereco.id FROM endereco WHERE rua='$rua'");
		    $linhas = mysqli_num_rows ($resultado);
			for ($a=0 ; $a<$linhas ; $a++)
		{
			$reg = mysqli_fetch_row($resultado);
			$endereco = $reg['0'];
 		}

		 //buscando o id do usuario
			$resultado4 = mysqli_query ($conexao,	"SELECT usuario.id FROM usuario WHERE login='$usuario'");
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
			$resultado6 = mysqli_query ($conexao,	"SELECT postagem.id FROM postagem WHERE imagem='$novoNome'");
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
		$sql8 = "INSERT INTO `bdops`.`otimo` ( `id`, `cont`, `img`) VALUES"; 
		$sql8 .= "( '$idPoster', '0', '')";
		$resultado8 = mysqli_query ($conexao,$sql8) or die("erro na query inserir otimo"); 
		
		//preenchendo tabela pessimo
		$sql9 = "INSERT INTO `bdops`.`regula` ( `id`, `cont`, `img`) VALUES"; 
		$sql9 .= "( '$idPoster', '0', '')";
		$resultado9 = mysqli_query ($conexao,$sql9) or die("erro na query inserir regula"); 
		
		//preenchendo tabela pessimo
		$sql10 = "INSERT INTO `bdops`.`pessimo` ( `id`, `cont`, `img`) VALUES"; 
		$sql10 .= "( '$idPoster', '0', '')";
		$resultado10 = mysqli_query ($conexao,$sql10) or die("erro na query inserir pessimo"); 
				

		echo "<script> alert ('Postagem Criada com Sucesso '); location.href='servico.php'</script>"; exit;




}		
}


?>