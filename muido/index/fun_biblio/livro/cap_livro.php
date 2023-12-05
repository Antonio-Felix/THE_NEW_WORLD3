<?php
        include '../../../classes/livro.php'; 
        include ('../../../captura/protect.php');
        include ('../../../conexao.php');

session_start();

    $codlivro = $_POST['codlivro']; 

    $query2 = "SELECT * from livro where codlivro = $codlivro";
    $result2 = mysqli_query($con, $query2);

    if($result2->num_rows > 0){

        $_SESSION['mensagem5'] = 'Código do livro incorreto! Verifique se esse livro já foi cadastrado.';
        header("location:cad_livro.php");

    } else{

    $livro = new livro($_POST ["codlivro"], $_POST ["titulo"], $_POST['autor'], $_POST['categoria'], $_POST['situacao']);
 
    $_SESSION['livro'] = $livro-> $codlivro;

    $con = mysqli_connect("localhost", "root", "", "newworld");

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

   
?>


