<?php

    session_start(); 
    
    include ('../../../captura/protect.php');

    include('../../../conexao.php');

    include '../../../classes/livro.php'; 

  
    // CAPTURANDO OS VALORES DAS VARIÁVEIS VIA POST (REQUISIÇÃO DO FORMULÁRIO)

    $codlivro = $_POST['codlivro']; 
    $cpffun = $_SESSION["cpffun"];
    $cpfleitor = $_POST ["cpfleitor"];

    $codsitua = 2;
    $acao = 3;

    // ARMAZENANDO OS VALORES DO POST NA SESSION 
    $_SESSION['cpfleitor'] = $cpfleitor;
    $_SESSION['codlivro'] = $codlivro;


    // INICIALIZANDO AS VARÍAVEIS DE CONTROLE: 

    $exibir = false;
    $_SESSION['exibir'] = $exibir; 
    $_SESSION['mensagem9'] = ' ';
    
   // (1° VÁLIDAÇÃO - CODIGO) conferindo se o codigo do livro existe (SE O CÓDIGO ESTÁ CORRETO)

     $query2 = "SELECT codlivro FROM livro WHERE codlivro = '$codlivro'";

     $result2 = mysqli_query($con, $query2);

     if ($result2-> num_rows > 0){

    // (3° VÁLIDAÇÃO - CPF) conferindo se o cpf do leitor está correto 

                $query4 = "SELECT cpfleitor from leitor where cpfleitor = $cpfleitor";
                $result4 = mysqli_query($con, $query4);
                if ($result4->num_rows > 0){

        // (2° VÁLIDAÇÃO - SITUAÇÃO) conferindo se o livro encontra-se disponível para renovar (CHECANDO A SITUAÇÃO)

            $query3 = "SELECT * FROM emprestimo WHERE codlivro = $codlivro and codsitua = 2 and cpfleitor = $cpfleitor";
            $result3 = mysqli_query($con, $query3);

            if ($result3->num_rows > 0){

                // TESTAR SE O LEITOR JÁ RENOVOU MAIS DE 2 VEZES 

                $query67 = "SELECT renova from emprestimo WHERE codlivro = $codlivro and cpfleitor = $cpfleitor";
                $result67 = mysqli_query($con, $query67);
                $row67 = $result67->fetch_assoc();
                $renova = $row67["renova"];

                if($renova < 2 and $renova >= 0){

                    $renova2 = $renova + 1; 

                 // recuperando do banco o valor da data de egresso 

                $query18 = "SELECT data_r FROM emprestimo WHERE codlivro = $codlivro and codsitua = 2 and cpfleitor = $cpfleitor";
                $result18 = mysqli_query($con, $query18);
    
                    $row18 = $result18->fetch_assoc();
                    $data_r = $row18["data_r"]; 
                    //echo $data_r;
                  //  echo "<br>";
                    // adicionando 7 dias na data de devolução
                    $datanova = date('Y-m-d', strtotime($data_r . ' + 7 days'));   
                  //  echo $datanova; 
            

          // FAZENDO O UPDATE DA DATA NA TABELA DE EMPRESTIMO E RELATÓRIO
                  
           
                
                $query = "call renova($cpfleitor, $codlivro, '$datanova', $codsitua, $renova2)";
                $result = mysqli_query($con, $query);


                if($result){
                  // OBS: CONCERTAR A mensagem9 DE SUCESSO!!!!  
                        $_SESSION['mensagem9'] =  "Renovação realizada!";
                        $exibir = true;  
                }
                else{
                    // COLOCAR O ALERT DE ANTÔNIO
                    $_SESSION['mensagem9'] =  "algo deu errado!";
                    $exibir = true;  
                }
            }
            else{
                $_SESSION['mensagem9'] =  "O prazo só pode ser renovado duas vezes!";
                $exibir = true;  
            }

            }
            else {
                $exibir = true;
                $_SESSION['mensagem9']=  "O livro escolhido não está emprestado para esse leitor! </br>"; 
            }
        }
        else{
            $exibir = true;
            $_SESSION['mensagem9']=  "Cpf do leitor incorreto! Verifique se ele está cadastrado! </br>";
        }
     
    }
   
    else{
        $exibir = true;  
        $_SESSION['mensagem9']=  "Código do livro inexistente! verifique novamente. </br>";
    }

    if ($exibir){
        header("location:cad_renova.php");
    }

?>
 