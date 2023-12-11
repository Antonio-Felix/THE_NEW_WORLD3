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
  

     $query = "SELECT * from leitor ORDER BY nome ASC";
     $result = mysqli_query($con, $query);
     if (mysqli_num_rows($result) > 0){
     
    ?>
   
    <div class="container-tabela">
        <legend> <h1 class="h1listas">LEITORES</h1> </legend>
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
                    echo "<td> <a href='emp_leitor.php?op=" . $linha['cpfleitor'] . "'>" . $linha['nome'] . " </a></td>" ;
                    echo "<td>".$linha['cpfleitor']."</td>";
                    echo "<td>".$linha['email']."</td>";
                    echo "<td>".$linha['fone']."</td>";
                echo "</tr>";

             
                }

           }
     else{
        header('location: ../../../captura/mserro.html');

     }
           ?>
        </table>
    </div>
</body>
</html>

