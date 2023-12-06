<?php
include('../../captura/protect2.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE NEW WORLD</title>
    
    <link rel="shortcut icon" href="../../../Imagens/world-book-day.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../../projcss.css">
</head>

<body class="bodies">
   
    <div class="container-tabela">
    <legend> <h1 class="h1listas"> EMPRESTIMOS FEITOS </h1> </legend>
        <table>
           <tr>
                <th>DATA DE EGRESSO</th>
                <th>DATA DE DEVOLUÇÃO</th>
                <th>CÓDIGO DO LIVRO</th>
           </tr>
           <?php
           include('../../conexao.php');
           $cpf = $_POST['cpf'];
           $query =  "select e.*, l.nome from emprestimo e, livro l where ". $cpf. "= cpfleitor and l.codlivro = e.codlivro";
           $result = mysqli_query($con, $query);
        
           while($linha = mysqli_fetch_array($result)){
                echo "<tr>";
                    echo "<td>".$linha['dataegresso']."</td>";
                    echo "<td>".$linha['datadevolucao']."</td>";
                    echo "<td>".$linha['nome']."</td>";
                echo "</tr>";
        }
           ?>
        </table>
   
    <a href="index_leitor.html"><button class="botao-voltar"> Voltar </button></a>
    </div>
</body>
</html>