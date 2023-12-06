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
   
    <div class="container-tabela">
        <legend> <h1 class="h1listas">LISTAGEM DOS LIVROS</h1> </legend>
        <table>
           <tr>
                <th>NOME</th>
                <th>CÓDIGO</th>
                <th>AUTOR</th>
                <th>DESCRIÇÃO</th>
           </tr>
           <?php
           include('../../conexao.php');
           $query = "select * from livro";
           $result = mysqli_query($con, $query);
           while($linha = mysqli_fetch_array($result)){
                echo "<tr>";
                    echo "<td>".$linha['nome']."</td>";
                    echo "<td>".$linha['codlivro']."</td>";
                    echo "<td>".$linha['autor']."</td>";
                    echo "<td>".$linha['descricao']."</td>";
                echo "</tr>";
           }
        
           ?>
        </table>
    </div>
</body>
</html>