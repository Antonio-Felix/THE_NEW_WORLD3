<?php
include '../classes/funcionario.php';


    $funcionario = new funcionario($_POST['cpffun'], $_POST['nome'],  $_POST['email'], $_POST['fone'], $_POST['senha']); 

    $con = mysqli_connect("localhost", "root", "", "newworld");

    $query = "insert into funcionario values(" .$funcionario -> getCpffun(). ", '" .$funcionario -> getNome(). "' , '" .$funcionario -> getEmail(). "', " .$funcionario -> getFone(). ", " .$funcionario -> getSenha().")";

    $result = mysqli_query($con, $query);        
    
    if($result){
        //colocar um notificador 
        echo "deu certo";
        header("location:../form/login.php");
    }
    else{
        //colocar um notificador
        echo "deu errado"; 
        header("erro_login.html");
    }
  
?>