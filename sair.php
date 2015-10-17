<?php

  ob_start();
  //INICIALIZA A SESSÃO
  session_start();
 
  //DESTRÓI AS SESSOES
  unset($_SESSION['user']);
  unset($_SESSION['useradm']);
  session_destroy();
 
  //REDIRECIONA PARA A TELA DE LOGIN
  Header("Location: login.php");
  

?>