<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro emprestimo</title>

    <link rel="shortcut icon" href="../../../../Imagens/world-book-day.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../../../projcss.css"> 

    <style>
        .mensagem-erro {
            color: white;
        }
    
    </style>

</head>

<body class="bodies"> 

        <div class="container">
            <div class="img-form">
                <img class="imagem" src="../../../../Imagens/para-emprestimo.png" alt="">
            </div>

            <legend></legend>
                <div class="form">

                    <form action="cap_devol.php" method="post">

                        <div class="header-form">
                            <div class="titulo-form">
                                <h1>Realizar Devolução</h1>
                            </div>
                        </div>

                        <!-- Exibir mensagem de erro se existir -->


                <div class="mensagem-erro">

                   <?php

                    session_start();
                    
                   if (isset($_SESSION["mensagem2"])) {
        
                    echo   $_SESSION['mensagem2']; 
                    echo '</br>';
                    $_SESSION['mensagem2'] = ' ';
                   }
                   ?>
                   </div>

                       <div class="total-input">
                             <div class="labels">
                                <label for="cpfleitor"> <strong> CPF do Leitor:</strong></label>
                                <input type="text" name="cpfleitor" placeholder="000.000.000-00">
                            </div>
  
                            <div class="labels">
                                <label for="datadevolucao"><strong> Data de devolucao:</strong></label>
                                <input type="date" name="datadevolucao" autofocus required>
                            </div>
                            <div class="labels">
                                <label for="codlivro" ><strong>Código do livro:</strong></label>
                                <input type="number" name="codlivro">
                            </div>

                            </div>
                            <input class="botao-cad" type="submit" value="Cadastrar">
                            </div>
                       
                    </form>
                    <a href="../index_biblio.html"><button class="botao-voltar"> Voltar </button></a>
                </div>
        </div>
</body>

</html>

