<?php
    include('../../../conexao.php');
    include ('../../../captura/protect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> THE NEW WORLD</title>

    <link rel="shortcut icon" href="../../../../Imagens/world-book-day.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../../../projcss.css"> 
</head>

<body class="bodies"> 
<header class="header-login">
        <div class="container-header-login"> 

            <div class="alinhar-header-login"> 

                <nav class="navg-login">      
                    <a class="link-linha" href="../../../../index.html"> HOME </a>
                    <a class="link-linha" href="../index_biblio.php"> VOLTAR </a>
                    <a class="link-linha" href="../../../logout.php"> LOGOUT </a>
                </nav>

            </div>
        </div>            
    </header> 

    <?php
     $m = false; 

     $codlivro = $_GET['op'];
     $query = "call historico_livro($codlivro)";
     $result = mysqli_query($con, $query);
     if (mysqli_num_rows($result) > 0){
       
    ?>
   
    <div class="container-tabela">
        <legend> <h1 class="h1listas">HISTÓRICO</h1> </legend>
        <table borderline = 1>
           <tr>
                <th>AÇÃO</th>
                <th>LEITOR</th>
                <th>CÓDIGO</th>
                <th>RETIRADA</th>
                <th>PRAZO</th>
                <th>RENOVAÇÕES</th>
                
           </tr>
           <?php

           while($linha = mysqli_fetch_array($result)){
                echo "<tr>";
                    echo "<td>".$linha['nomea']."</td>";
                    echo "<td>".$linha['nomelei']."</td>";
                    echo "<td>".$linha['codlivro']."</td>";
                    echo "<td>".$linha['data_e']."</td>";
                    echo "<td>".$linha['data_d']."</td>";
                    echo "<td>".$linha['renova']."</td>";
                echo "</tr>";
           }
     }
     else{
        header('location: ../../../captura/mserro.php');

     }
           ?>
        </table>
    </div>
</body>
</html>