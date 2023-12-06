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

    <link rel="shortcut icon" href="../../../../Imagens/world-book-day.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../../projcss.css">
</head>


<body class="bodies">

     <div class="container-leibiblio">
          <div>
            <h1 class="h2-leibiblio"> INSIRA SEU CPF </h1>
          </div>

           <div class="form">
             <form action="teste_consul_emp.php" method="post">
                    
              <div class="total-input">
              <div class="labels">
                <label for="nome"> <strong> CPF: </strong> </label>
                <input type="text" name="cpf" id="cpf" autofocus placeholder="000.000.000.00">
              </div>
              </div>
             
              <input class="botao-cad" type="submit" value="Consultar">
             
             </form>
           </div>
           <a href="index_leitor.html"><button class="botao-voltar"> Voltar </button></a>
     </div>
</body>
</html>