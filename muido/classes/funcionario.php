<?php
class funcionario{
    private $cpffun;
    private $nome;
    private $email;
    private $fone;
    private $senha; 
    private $tipo; 

    //GETS

	public function getCpffun() {
		return $this->cpffun;
	}

	public function getNome() {
		return $this->nome;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getFone(){
		return $this->fone;
	}

	public function getSenha(){
		return $this->senha;
	}

    // SETS

	public function setCpf($cpffun){
		$this->cpffun = $cpffun;
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

    // MÉTODOS: 

    //CONSTRUCT 

    public function __construct($cpffun, $nome, $email, $fone, $senha){
        $this  -> cpffun = $cpffun; 
        $this -> nome = $nome; 
        $this -> email = $email;
        $this -> fone = $fone; 
        $this -> senha = $senha; 
    }

    // REALIZA EMPRESTIMO/RESERVA/DEVOLUÇÃO 

    // REALIZA CADASTRO DE LEITOR

    // REALIZA CADASTRO DE LIVRO 

    //
}



?>