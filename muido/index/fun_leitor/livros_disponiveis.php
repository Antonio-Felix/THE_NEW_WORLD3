<?php
include('../../captura/protect2.php');
include('../../conexao.php');
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

    <?php
  
     $m = false; 

     $query = "SELECT l.*, s.nome from livro l, situacao s  where l.codsitua = s.codsitua ORDER BY l.title ASC";
     $result = mysqli_query($con, $query);
     if (mysqli_num_rows($result) > 0){
    
    ?>
   
    <div class="container-tabela">
        <legend> <h1 class="h1listas">ACERVO</h1> </legend>
        <table>
           <tr>
                <th>TÍTULO</th>
                <th>CÓDIGO</th>
                <th>AUTOR</th>
                <th>CATEGORIA</th>
                <th>SITUAÇÃO</th>
           </tr>
           <?php
           while($linha = mysqli_fetch_array($result)){
                echo "<tr>";
                    echo "<td>".$linha['title']."</td>";
                    echo "<td>".$linha['codlivro']."</td>";
                    echo "<td>".$linha['autor']."</td>";
                    echo "<td>".$linha['categoria']."</td>";
                    echo "<td>".$linha['nome']."</td>";
                echo "</tr>";
           }
     }
     else{
        $_SESSION['mensagem11'] = 'Nenhum livro disponível no momento!'; 
        echo $_SESSION['mensagem11'];
        $_SESSION['mensagem11'] = ' ';

     }
           ?>
        </table>
    </div>
</body>
</html>