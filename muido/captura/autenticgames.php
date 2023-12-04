<?php
include('../../muido/conexao.php');

if(isset($_POST['cpf']) || isset($_POST['senha'])) {

    if(strlen($_POST['cpf']) == 0) {
        echo "Preencha o campo do cpf";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha o campo da senha";
    } else {

        $cpf = $con->real_escape_string($_POST['cpf']);
        $senha = $con->real_escape_string($_POST['senha']);


        $sql_code = "SELECT * FROM funcionario WHERE cpffun = '$cpf' AND senha = '$senha'";
        $sql_query = $con->query($sql_code) or die("Falha na execução do código SQL: " . $con -> error);
        $quantidade = $sql_query->num_rows;

        $sql_code2 = "SELECT * FROM leitor WHERE cpfleitor = '$cpf' AND senha = '$senha'";
        $sql_query2 = $con->query($sql_code2) or die("Falha na execução do código SQL: " . $con -> error);
        echo $quantidade1 = $sql_query2->num_rows;

        if ($quantidade1 == 1){
            session_start();
            $usuario = $sql_query2->fetch_assoc();
            $_SESSION['cpfleitor'] = $usuario['cpfleitor'];
            $_SESSION['nome'] = $usuario['nome'];
            header("Location:../index/fun_leitor/index_leitor.php");
            exit();
        }
        elseif($quantidade == 1) {
            session_start();
            $usuario = $sql_query->fetch_assoc();
            $_SESSION['cpffun'] = $usuario['cpffun'];
            $_SESSION['nome'] = $usuario['nome'];

            // SESSION PARA OS TRATAMENTOS DE ERRO DO EMPRESTIMO
            $_SESSION ['mensagem'] = ' '; 
            
            header("Location:../index/fun_biblio/index_biblio.php");
            exit();

        } 
        else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

    }
 }