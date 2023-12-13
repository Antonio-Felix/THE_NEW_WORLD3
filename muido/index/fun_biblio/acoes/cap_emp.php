<?php
   
    session_start(); 
    
    include ('../../../captura/protect.php');

    include('../../../conexao.php');

    include '../../../classes/livro.php'; 

  
    // CAPTURANDO OS VALORES DAS VARIÁVEIS VIA POST (REQUISIÇÃO DO FORMULÁRIO)

    $codlivro = $_POST['codlivro']; 
    $cpffun = $_SESSION["cpffun"];
    $cpfleitor = $_POST ["cpfleitor"];

    $dataegresso = date("Y-m-d");

    $renova = 0; 
    
    $datadevolucao = date('Y-m-d', strtotime($dataegresso . ' + 30 days'));

    $codsitua = 2;
    $acao = 1;

    // ARMAZENANDO OS VALORES DO POST NA SESSION 
    $_SESSION['cpfleitor'] = $cpfleitor;
    $_SESSION['dataegresso'] = $dataegresso;
    $_SESSION['codlivro'] = $codlivro;


    // INICIALIZANDO AS VARÍAVEIS DE CONTROLE: 

    $exibir = false;
    $_SESSION['exibir'] = $exibir; 
    $_SESSION['mensagem'] = ' ';
    
   // (1° VÁLIDAÇÃO - CODIGO) conferindo de o codigo do livro existe (SE O CÓDIGO ESTÁ CORRETO)

     $query2 = "SELECT codlivro FROM livro WHERE codlivro = '$codlivro'";

     $result2 = mysqli_query($con, $query2);

     if ($result2-> num_rows > 0){
       
     // (2° VÁLIDAÇÃO - SITUAÇÃO) conferindo se o livro encontra-se disponível para emprestimo (CHECANDO A SITUAÇÃO)

        $query3 = "SELECT codlivro FROM livro WHERE codlivro = '$codlivro' and codsitua = 1";
        $result3 = mysqli_query($con, $query3);
        if ($result3->num_rows > 0){
            //echo "livro disponivel para emprestimo </br>"; 
    

            // (3° VÁLIDAÇÃO - CPF) conferindo se o cpf do leitor está correto 

            $query4 = "SELECT cpfleitor from leitor where cpfleitor = '$cpfleitor'";
            $result4 = mysqli_query($con, $query4);
            if ($result4->num_rows > 0){

                // FAZENDO UPDATE DA SITUACAO NO BANCO DE DADOS 

                $query5 = "call set_situa($codsitua, $codlivro)";
                $result5 = mysqli_query($con, $query5);

                
                // ARMAZENANDO O EMPRÉSTIMO NO BANCO DE DADOS 

                $query = "INSERT into emprestimo values($codlivro, $codsitua, $cpfleitor, $cpffun, '$dataegresso', '$datadevolucao', $renova)";
                $result  = mysqli_query($con, $query);

                // INSERTANDO OS VALORES DA TABELA DE RELATÓRIO

                $query6 = "call add_relatorio ($acao, $codlivro, $codsitua, $cpfleitor, $cpffun, '$dataegresso', '$datadevolucao')";
                $result6 = mysqli_query($con, $query6);

                if($result and $result5 and $result6){
                  // OBS: CONCERTAR A MENSAGEM DE SUCESSO!!!!  
                        $_SESSION['mensagem'] =  "Emprestimo realizado!";
                        $exibir = true;  
                }
                else{
                    // COLOCAR O ALERT DE ANTÔNIO
                    $_SESSION['mensagem'] =  "algo deu errado!";
                }

            }
            else {
                $exibir = true;
                $_SESSION['mensagem']=  "Cpf do leitor incorreto! Verifique se ele está cadastrado! </br>";
            }
        }
        else{
            $exibir = true;
            $_SESSION['mensagem']=  "O livro escolhido está indispónivel para emprestimo! </br>"; 
        }
     
    }

    else{
        $exibir = true;  
        $_SESSION['mensagem']=  "Código incorreto! verifique novamente. </br>";
    }

    if ($exibir){
        header("location:cad_emp.php");
    }

?>
 