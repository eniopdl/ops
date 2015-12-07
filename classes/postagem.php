<?php 
/**
* 
*/
class Postagem
{
	private $id;
	private $idUusario;
	private $idEndereco;
    private $idOtimo;
    private $idRegula;
    private $idPessimo;
    private $local;
    private $comentario;
    private $imagem;
    private $data;
	
    public	function setId ($id) {

    	$this->id = $id;
    }
    public	function getId () {

    	return $this->id;
    }

    public	function setIdUsuario ($idUusario) {

    	$this->idUusario = $idUusario;
    }
    public	function getIdUusario () {

    	return $this->idUusario;
    }

    public	function setIdEndereco ($idEndereco) {

    	$this->idEndereco = $idEndereco;
    }
    public	function getbIdEndereco () {

    	return $this->idEndereco;
    }

    public function setIdOtimo ($idOtimo) {

        $this->ididOtimo = $ididOtimo;
    }
    public  function getbIdOtimo () {

        return $this->idOtimo;
    }
 	public function setIdRegula ($idRegula) {

        $this->idRegula = $idRegula;
    }
    public  function getbIdRegula () {

        return $this->idRegula;
    }
    public function setIdPessimo ($idPessimo) {

        $this->idPessimo = $idPessimo;
    }
    public  function getbIdPessimo () {

        return $this->idPessimo;
    }

    public function setIdPessimo ($idPessimo) {

        $this->idPessimo = $idPessimo;
    }
    public  function getIdPessimo () {

        return $this->idPessimo;
    }
    public function setComentario ($comentario) {

        $this->comentario = $comentario;
    }
    public  function getComentario () {

        return $this->comentario;
    }
    public function setImagem ($imagem) {

        $this->imagem = $imagem;
    }
    public  function getImagem () {

        return $this->imagem;
    }

    public function setLocal($local) {
       
        $this->local = $local;
    }
    public  function getLocal() {

        return $this->local;
    }


    public function setData($data) {

        $this->data = $data;
    }
    public  function getData() {

        return $this->data;
    }
    
    
}


?>