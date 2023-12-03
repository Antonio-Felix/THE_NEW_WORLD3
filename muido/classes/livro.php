<?php

class livro{
    private $codlivro; 
    private $titulo; 
    private $autor; 
    private $categoria; 
    private $situacao; 

    /* GETS */
	public function getTitulo() {
		return $this->titulo;
	}

	public function getAutor() {
		return $this->autor;
	}

	public function getCategoria() {
		return $this->categoria;
	}

	public function getCodlivro() {
		return $this->codlivro;
	}

    public function getSituacao() {
            return $this->situacao;
    }

	/*SETS */
	public function setTitulo($titulo): self {
		$this->titulo = $titulo;
		return $this;
	}
	
	public function setAutor($autor): self {
		$this->autor = $autor;
		return $this;
	}
	
	public function setCategoria($categoria){
		$this->categoria = $categoria;
		return $this;
	}
	
	public function setCodlivro($codlivro){
		$this->codlivro = $codlivro;
		return $this;
	}

	public function setSituacao($situacao){
		$this->situacao = $situacao;
		return $this;
	}

    /* FUNÇÕES */

    // função construct (construir um objeto)
    public function __construct($codlivro, $titulo, $autor, $categoria, $situacao){
        $this->codlivro = $codlivro;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->categoria = $categoria;
        $this->situacao = $situacao;
        
    }

    //função emprestimo
    public function emprestimo($cod){
            $this->setSituacao($cod); 
    }

     // função reserva
     public function reserva($cod){
        if($cod == 1){
            $this->setSituacao($cod); 
        }
        else{
            $ctrl = false;
        }
    }

     // função devolucao
     public function devolucao($cod){
        if($cod == 1){
            $ctrl = false;
        }
        else{   
            $this->setSituacao($cod); 
        }
    }
}

?>




