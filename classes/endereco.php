<?php 
/**
* 
*/
class Endereco
{
	private $id;
	private $rua;
	private $bairro;
	private $cidade;
    private $estado;

    public	function setId ($id) {

    	$this->id = $id;
    }
    public	function getId () {

    	return $this->id;
    }

    public	function setRua ($lrua) {

    	$this->rua = $rua;
    }
    public	function getRua () {

    	return $this->rua;
    }

    public	function setBairro ($bairro) {

    	$this->bairro = $bairro;
    }
    public	function getbBairro () {

    	return $this->bairro;
    }

    public	function setCidade ($cidade) {

    	$this->cidade = $cidade;
    }
    public	function getCidade () {

    	return $this->cidade;
    }

    public  function setEstado ($estado) {

        $this->estado = $estado;
    }
    public  function getEstado () {

        return $this->estado;
    }
	
	
}


?>