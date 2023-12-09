<?php
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
     $m = false; 

     $cpfleitor = $_GET['op'];
     $query = "call historico_leitor($cpfleitor)";
     $result = mysqli_query($con, $query);
     if (mysqli_num_rows($result) > 0){
       
    ?>
   
    <div class="container-tabela">
        <legend> <h1 class="h1listas">HISTÓRICO</h1> </legend>
        <table borderline = 1>
           <tr>
                <th>AÇÃO</th>
                <th>TÍTULO</th>
                <th>CÓDIGO</th>
                <th>AUTOR</th>
                <th>CATEGORIA</th>
                <th>RETIRADA</th>
                <th>PRAZO</th>
                <th>RENOVAÇÕES</th>
           </tr>
           <?php

           while($linha = mysqli_fetch_array($result)){
                echo "<tr>";
                    echo "<td>".$linha['nome']."</td>";
                    echo "<td>".$linha['title']."</td>";
                    echo "<td>".$linha['codlivro']."</td>";
                    echo "<td>".$linha['autor']."</td>";
                    echo "<td>".$linha['categoria']."</td>";
                    echo "<td>".$linha['data_e']."</td>";
                    echo "<td>".$linha['data_d']."</td>";
                    echo "<td>".$linha['renova']."</td>";
                echo "</tr>";
           }
     }
     else{
        $_SESSION['mensagem10'] = 'Nada consta!'; 
        echo $_SESSION['mensagem10'];
        $_SESSION['mensagem10'] = ' ';

     }
           ?>
        </table>
    </div>
</body>
</html>