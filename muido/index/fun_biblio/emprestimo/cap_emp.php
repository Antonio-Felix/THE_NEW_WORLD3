<?php
    include ('../../captura/protect.php');
    include('../../../conexao.php');
    $dataegresso = $_POST ["dataegresso"];
    $datadevolucao = $_POST ["datadevolucao"];
    $livro = $_POST ["livro"];
    $cpfleitor = $_POST ["cpfleitor"];
 
    $query = "insert into emprestimo values ('$dataegresso', '$datadevolucao', $livro,'$cpfleitor')";
   
    $result = mysqli_query($con, $query);
    if($result){
        header("location:deu_bom_emp.html");
    }
    else{
        header("location:sem_emp.html");
    }
?>
 
