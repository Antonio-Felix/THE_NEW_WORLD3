<?php
//include('../../captura/protect2.php');
include('../../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> THE NEW WORLD</title>

    <link rel="shortcut icon" href="../../../Imagens/world-book-day.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../../../projcss.css"> 
</head>

<body class="bodies"> 

    <?php

     $query = "SELECT * from funcionario ORDER BY nome ASC";
     $result = mysqli_query($con, $query);
     if (mysqli_num_rows($result) > 0){
     
    ?>
   
    <div class="container-tabela">
        <legend> <h1 class="h1listas">FUNCIONÁRIOS</h1> </legend>
        <table>
           <tr>
                <th>NOME</th>
                <th>CPF</th>
                <th>E-MAIL</th>
                <th>TELEFONE</th>
           </tr>
           <?php
           while($linha = mysqli_fetch_array($result)){
                echo "<tr>";
                    echo "<td>".$linha['nome']."</td>";
                    echo "<td>".$linha['cpffun']."</td>";
                    echo "<td>".$linha['email']."</td>";
                    echo "<td>".$linha['fone']."</td>";
                echo "</tr>";

             
                }

           }
     else{
        $_SESSION['mensagem12'] = 'Nenhum leitor cadastrado!'; 
        echo $_SESSION['mensagem12'];
        $_SESSION['mensagem12'] = ' ';

     }
           ?>
        </table>
    </div>
</body>
</html>

