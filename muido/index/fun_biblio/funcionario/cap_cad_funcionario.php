<?php
include '../../../classes/funcionario.php';
include('../../../conexao.php');
include ('../../../captura/protect.php');

session_start();


    // VERIFICAÇÃO SE O CPF FO FUNCIONÁRIO ESTÁ CORRETO  
    $cpffun = $_POST['cpffun'];

    $query2 = "SELECT cpffun from funcionario where cpffun = $cpffun";
    $result2 = mysqli_query($con, $query2);

    if($result2->num_rows > 0){
        $_SESSION['mensagem8'] = 'Cpf incorreto! Verifique se esse funcionário já está cadastrado.';
        header("location:cadastro_funcionario.php");

    }
    else{
         $funcionario = new funcionario($_POST['cpffun'], $_POST['nome'],  $_POST['email'], $_POST['fone'], $_POST['senha']); 

        $query = "insert into funcionario values(" .$funcionario -> getCpffun(). ", '" .$funcionario -> getNome(). "' , '" .$funcionario -> getEmail(). "', " .$funcionario -> getFone(). ", " .$funcionario -> getSenha().")";

        $result = mysqli_query($con, $query);        
        
        if($result){
            $_SESSION['mensagem8'] = 'Funcionário Cadastrado!';
            header("location:cadastro_funcionario.php");
        }
        else{
            $_SESSION['mensagem8'] = 'Algo deu errado! Consulte a Sky.';
            header("location:cadastro_funcionario.php");
        }

    }


   
  
?>