<?php

    session_start(); 

    include('../../../conexao.php');

    include '../../../classes/livro.php'; 

  
    // CAPTURANDO OS VALORES DAS VARIÁVEIS VIA POST (REQUISIÇÃO DO FORMULÁRIO)

    $codlivro = $_POST['codlivro']; 
    $cpffun = $_SESSION["cpffun"];
    $cpfleitor = $_POST ["cpfleitor"];

    $datadevolucao = date("Y-m-d");

    $codsitua = 1;
    $acao = 2;

    // ARMAZENANDO OS VALORES DO POST NA SESSION 
    $_SESSION['cpfleitor'] = $cpfleitor;
    $_SESSION['datadevolucao'] = $datadevolucao;
    $_SESSION['codlivro'] = $codlivro;


    // INICIALIZANDO AS VARÍAVEIS DE CONTROLE: 

    $exibir = false;
    $_SESSION['exibir'] = $exibir; 
    $_SESSION['mensagem2'] = ' ';
    
   // (1° VÁLIDAÇÃO - CODIGO) conferindo de o codigo do livro existe (SE O CÓDIGO ESTÁ CORRETO)

     $query2 = "SELECT codlivro FROM livro WHERE codlivro = '$codlivro'";

     $result2 = mysqli_query($con, $query2);

     if ($result2-> num_rows > 0){
       
     // (2° VÁLIDAÇÃO - SITUAÇÃO) conferindo se o livro encontra-se disponível para ser devolvido (CHECANDO A SITUAÇÃO)

        $query3 = "SELECT codlivro FROM livro WHERE codlivro = '$codlivro' and codsitua = 2";
        $result3 = mysqli_query($con, $query3);
        if ($result3->num_rows > 0){
            //echo "livro disponivel para emprestimo </br>"; 
    

            // (3° VÁLIDAÇÃO - CPF) conferindo se o cpf do leitor está correto 

            $query4 = "SELECT cpfleitor from leitor where cpfleitor = '$cpfleitor'";
            $result4 = mysqli_query($con, $query4);
            if ($result4->num_rows > 0){

                // (4° VALIDAÇÃO - EMPRESTADO) conferindo se o livro está emprestado ao leitor que pretende devolve-lo

                    $query7 = "SELECT * from emprestimo where cpfleitor = $cpfleitor and codlivro = $codlivro";
                    $result7 = mysqli_query($con, $query7);
                    if ($result7->num_rows > 0){

                        // FAZENDO UPDATE DA SITUACAO NO BANCO DE DADOS 
                        //---------------------------------------------------
                        $query5 = "call set_situa($codsitua, $codlivro)";
                        $result5 = mysqli_query($con, $query5);
                        //---------------------------------------------------

                        
                        // ARMAZENANDO A DEVOLUCAO NO BANCO DE DADOS 
                        
                        //-------------------------------------------
                        // recuperando do banco o valor da data de egresso 
                        $query8 = "SELECT data_e from emprestimo where cpfleitor = $cpfleitor and codlivro = $codlivro"; 
                        $result8 = $con->query($query8);
                        $row8 = $result8->fetch_assoc();
                        $data_e = $row8["data_e"];

                        // recuperando do banco o valor da data de regresso
                        $query9 = "SELECT data_r from emprestimo where cpfleitor = $cpfleitor and codlivro = $codlivro"; 
                        $result9 = $con->query($query9);
                        $row9 = $result9->fetch_assoc();
                        $data_r = $row9["data_r"];
                        //-----------------------------------------------------


                        // fazendo o numero de dias de atraso 
                        //---------------------------------------------------------------
                        $query10 = "SELECT DATEDIFF('$datadevolucao', '$data_r') AS atraso";
                        $result10 = $con->query($query10);
                        $row10 = $result10->fetch_assoc();
                        $atraso = $row10["atraso"];
                        //-----------------------------------------------------------------

                        // ARMAZENANDO A DEVOLUCAO NO BANCO DE DADOS 
                        //---------------------------------------------------
                        $query = "call devolucao($codlivro, $codsitua, $cpfleitor, $cpffun, '$data_e', '$data_r', '$datadevolucao')";
                        $result  = mysqli_query($con, $query);
                        //---------------------------------------------------

                        // INSERTANDO OS VALORES DA TABELA DE RELATÓRIO
                        //---------------------------------------------------
                        $query6 = "call add_relatorio ($acao, $codlivro, $codsitua, $cpfleitor, $cpffun, '$data_e', '$datadevolucao')";
                        $result6 = mysqli_query($con, $query6);
                        //---------------------------------------------------

                        // DELETANDO O EMPRESTIMO NA TABELA 
                        //---------------------------------------------------

                        $query11 = "call del_emp($codlivro, $cpfleitor)";
                        $result11 =  mysqli_query($con, $query11);

                        //---------------------------------------------------

                        // ULTIMO TESTE 
                        if($result and $result5 and $result6 and $result11){
                                $_SESSION['mensagem2'] =  "Devolução realizada!";
                                $exibir = true;  
                        }
                        else{
                            // COLOCAR O ALERT DE ANTÔNIO
                            $_SESSION['mensagem2'] =  "algo deu errado!";
                        }

            }
            else {
                $exibir = true;
                $_SESSION['mensagem2']=  "Esse livro não foi emprestado por esse leitor! </br>Cpf do leitor incorreto! Verifique se ele está cadastrado! </br>";
            }
        }
        else{
            $exibir = true;
            $_SESSION['mensagem2']=  "Cpf do leitor incorreto! Verifique se ele está cadastrado! </br>";
        }
        }
        else{
            $exibir = true;
            $_SESSION['mensagem2']=  "O livro escolhido já foi devolvido! </br>"; 
        }
     
    }

    else{
        $exibir = true;  
        $_SESSION['mensagem2']=  "Código incorreto! verifique novamente. </br>";
    }

    if ($exibir){
        header("location:cad_devol.php");
    }

?>
 