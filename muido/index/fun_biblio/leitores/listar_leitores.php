<?php
    include ('../../captura/protect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE NEW WORLD</title>

    <link rel="shortcut icon" href="../../../../Imagens/world-book-day.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../../../projcss.css">
</head>

<body class="bodies"> 
   
    <div class="container-tabela">
    <legend> <h1 class="h1listas">LISTAGEM DOS LEITORES</h1> </legend>
        <table>
               <tr>
                    <th>NOME</th>
                    <th>EMAIL</th>
               </tr>
               <?php
                include('../../../conexao.php');
               $query = "select * from leitor;";
               $result = mysqli_query($con, $query);
               while($linha = mysqli_fetch_array($result)){
                    echo "<tr class = 'linhas'>";
                        echo "<td>".$linha['nome']."</td>";
                        echo "<td>".$linha['email']."</td>";
                    echo "</tr>";
               }
               ?>
           
        </table>
        <a href="../index_biblio.html"><button class="botao-voltar"> Voltar </button></a>
    </div>
</body>
</html>