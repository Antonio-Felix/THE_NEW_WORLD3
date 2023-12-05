<?php
        include '../../../classes/livro.php'; 
        include ('../../../captura/protect.php');
        include ('../../../conexao.php');

session_start();
    $mostra = false;
    $_SESSION['exiba'] = $mostra; 

    //VALIDAÇÃO DO COD VAZIO
    if(isset($_POST ["codlivro"]) || isset($_POST ["titulo"]) || isset($_POST['autor']) || isset($_POST['categoria']) || isset($_POST['situacao']))
        if(strlen($_POST ["codlivro"]) == 0){
            $_SESSION['mensagem5'] =  "Preencha o campo do código do livro!";
            $mostra = true;
        }
        //TITULO VAZIO 
        elseif(strlen($_POST ["titulo"]) == 0){
            $_SESSION['mensagem5'] =  "Preencha o campo do título!";
            $mostra = true;
        }    
        //AUTOR VAZIO
        elseif(strlen($_POST['autor']) == 0){
            $_SESSION['mensagem5'] =  "Preencha o campo do nome do autor!";
            $mostra = true;
        }
        //CATEGORIA
        elseif(strlen($_POST['categoria']) == 0){
            $_SESSION['mensagem5'] =  "Preencha o campo da categoria!";
            $mostra = true;
        }
        // SITUACAO
        elseif(strlen($_POST['situacao']) == 0){
            $_SESSION['mensagem5'] =  "Preencha o campo da situação!";
            $mostra = true;
        }
        else{

    //pegando o valor do codigo
    $codlivro = $_POST['codlivro']; 

    //VALIDANDO SE O CODIGO ESTÁ CORRETO  

    $query2 = "SELECT * from livro where codlivro = $codlivro";
    $result2 = mysqli_query($con, $query2);

    if($result2->num_rows > 0){

        $_SESSION['mensagem5'] = 'Código do livro incorreto! Verifique se esse livro já foi cadastrado.';
        header("location:cad_livro.php");

    } else{

    $livro = new livro($_POST ["codlivro"], $_POST ["titulo"], $_POST['autor'], $_POST['categoria'], $_POST['situacao']);
 
    $_SESSION['livro'] = $livro-> $codlivro;

    $query = "insert into livro values (".$livro -> getcodlivro(). ", '" .$livro -> getTitulo()."', " .$livro -> getSituacao().", '" .$livro -> getCategoria(). "', '" .$livro -> getAutor()."')";
   
    $result = mysqli_query($con, $query);
    

    if($result){
        //colocar um notificador 
        $_SESSION['mensagem5'] = 'Livro Cadastrado!';
        header("location:cad_livro.php");
    }
    else{
        $_SESSION['mensagem5'] = 'Algo deu errado! Consulte a Sky!';
        header("location:cad_livro.php");
    }

    }
        }
    
    if ($mostra){
        header("location:cad_livro.php");
    }
   
?>