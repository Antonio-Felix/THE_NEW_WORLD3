<?php
include '../../../classes/livro.php'; 
include ('../../captura/protect.php');
    $livro = new livro($_POST ["codlivro"], $_POST ["titulo"], $_POST['autor'], $_POST['categoria'], $_POST['situacao']);
 
    $con = mysqli_connect("localhost", "root", "", "newworld");

    $query = "insert into livro values (".$livro -> getcodlivro(). ", '" .$livro -> getTitulo()."', " .$livro -> getSituacao().", '" .$livro -> getCategoria(). "', '" .$livro -> getAutor()."')";
   
    $result = mysqli_query($con, $query);

    if($result){
        //colocar um notificador 
        header("location:../index_biblio.html");
    }
    else{
        //colocar um notificador
        header("erro_livro.html");
    }
?>


