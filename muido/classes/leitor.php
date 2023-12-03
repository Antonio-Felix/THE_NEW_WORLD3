<?php

class leitor{
    private $cpfleitor;
    private $nome;
    private $email;
    private $fone;
    private $senha; 

    //GETS 

	public function getCpfleitor() {
		return $this->cpfleitor;
	}

	public function getNome() {
		return $this->nome;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getFone() {
		return $this->fone;
	}

	public function getSenha() {
		return $this->senha;
	}

    //SETS 

	public function setCpfleitor($cpfleitor){
		$this->cpfleitor = $cpfleitor;
		return $this;
	}

	public function setNome($nome){
		$this->nome = $nome;
		return $this;
	}

	public function setEmail($email){
		$this->email = $email;
		return $this;
	}

	public function setFone($fone){
		$this->fone = $fone;
		return $this;
	}

	public function setSenha($senha){
		$this->senha = $senha;
		return $this;
	}

    //MÉTODOS: 

    public function __construct($cpfleitor, $nome, $email, $fone, $senha){
        $this  -> cpfleitor = $cpfleitor; 
        $this -> nome = $nome; 
        $this -> email = $email;
        $this -> fone = $fone; 
        $this -> senha = $senha; 
    }
}

    // CONSUTA SEUS EMPRÉSTIMOS 
    
    // CONSULTA LIVROS DISPONÍVEIS 

?>