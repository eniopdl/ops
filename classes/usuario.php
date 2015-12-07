<?php 
/**
* 
*/
class Usuario
{
	private $id;
	private $login;
	private $senha;
	private $email;

    public	function setId ($id) {

    	$this->id = $id;
    }
    public	function getId () {

    	return $this->id;
    }

    public	function setLogin ($login) {

    	$this->login = $login;
    }
    public	function getLogin () {

    	return $this->login;
    }

    public	function setSenha ($senha) {

    	$this->senha = $senha;
    }
    public	function getSenha () {

    	return $this->senha;
    }

    public	function setEmail ($email) {

    	$this->email = $email;
    }
    public	function getEmail () {

    	return $this->email;
    }
	
	

	
}


?>