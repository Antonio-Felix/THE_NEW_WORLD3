<?php
include '../../../classes/leitor.php';
include ('../../captura/protect.php');


    $leitor = new leitor($_POST['cpfleitor'], $_POST['nome'],  $_POST['email'], $_POST['fone'], $_POST['senha']); 

    $con = mysqli_connect("localhost", "root", "", "newworld");

    $query = "insert into leitor values(" .$leitor -> getCpfleitor(). ", '" .$leitor -> getNome(). "' , '" .$leitor -> getEmail(). "', " .$leitor -> getFone(). ", " .$leitor -> getSenha().")";

    $result = mysqli_query($con, $query);        
    
    if($result){
        //colocar um notificador 
        echo "deu certo";
        header("location:../index_biblio.html");
    }
    else{
        //colocar um notificador
        echo "deu errado"; 
    }
  
?>