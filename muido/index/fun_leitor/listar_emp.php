<?php
include('../../captura/protect2.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> THE NEW WORLD</title>

    <link rel="shortcut icon" href="../../../Imagens/world-book-day.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../../projcss.css">
</head>

<body class="bodies"> 

<header class="header-login">
        <div class="container-header-login"> 

            <div class="alinhar-header-login"> 

                <nav class="navg-login">      
                    <a class="link-linha" href="../../index.html"> HOME </a>
                    <a class="link-linha" href="index_leitor.php"> VOLTAR </a>
                </nav>

            </div>
        </div>            
</header>

    <?php
  
     include('../../conexao.php');
     $m = false; 

     $cpfleitor = $_SESSION['cpfleitor'];
     $query = "SELECT * from emprestimo where cpfleitor = $cpfleitor";
     $result = mysqli_query($con, $query);
     if (mysqli_num_rows($result) > 0){
        $m = true;
     }
    
     if($m){ 
    ?>
   
    <div class="container-tabela">
    <legend> <h1 class="h1listas"> MEUS EMPRESTIMOS </h1> </legend>
        <table>
            <thead>
                <tr>
                    <th>TÍTULO</th>
                    <th>CÓDIGO</th>
                    <th>AUTOR</th>
                    <th>CATEGORIA</th>
                    <th>RETIRADA</th>
                    <th>PRAZO</th>
                    <th>RENOVAÇÕES</th>
                </tr>
            </thead>
           
           <?php

           $query2 = "call lista_emp_leitor($cpfleitor)";  
           $result2 = mysqli_query($con, $query2);
           while($linha = mysqli_fetch_array($result2)){
            echo "<tbody>";
                echo "<tr>";
                    echo "<td>".$linha['title']."</td>";
                    echo "<td>".$linha['codlivro']."</td>";
                    echo "<td>".$linha['autor']."</td>";
                    echo "<td>".$linha['categoria']."</td>";
                    echo "<td>".$linha['data_e']."</td>";
                    echo "<td>".$linha['data_r']."</td>";
                    echo "<td>".$linha['renova']."</td>";
                echo "</tr>";
            echo"</tbody>";
           }
     }
     else{
        $_SESSION['merror'] = true;  
        header('location: ../../captura/mserro2.php');

     }
           ?>
        </table>
    </div>
</body>
</html>