<?php
include '../../../classes/leitor.php';
include ('../../../captura/protect.php');
include '../../../conexao.php';

//session_start();

    // TESTANDO SE O CPF DO LEITOR EXISTE NO BANCO/ SE ESTÁ CORRETO 
    $cpfleitor = $_POST['cpfleitor'];

    $query2 = "SELECT * from leitor where cpfleitor = $cpfleitor";
    $result2 = mysqli_query($con, $query2);

    if($result2->num_rows > 0){
        $_SESSION['mensagem7'] = 'Cpf incorreto! Verifique se esse leitor já está cadastrado.';
        header("location:cadastro_leitor.php");

    }
    else{
            $leitor = new leitor($_POST['cpfleitor'], $_POST['nome'],  $_POST['email'], $_POST['fone'], $_POST['senha']); 

            $query = "insert into leitor values(" .$leitor -> getCpfleitor(). ", '" .$leitor -> getNome(). "' , '" .$leitor -> getEmail(). "', " .$leitor -> getFone(). ", " .$leitor -> getSenha().")";

            $result = mysqli_query($con, $query);        
            
            if($result){
                $_SESSION['mensagem7'] = 'Leitor Cadastrado!';
                header("location:cadastro_leitor.php");
            }
            else{
                $_SESSION['mensagem7'] = 'Algo deu errado! Consulte a Sky!';
                header("location:cadastro_leitor.php");
            }
    }


   
  
?>