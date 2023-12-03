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
            color: red;
        }
    </style>

</head>

<body class="bodies"> 

<?php
        session_start();
?>
        <div class="container">
            <div class="img-form">
                <img class="imagem" src="../../../../Imagens/para-emprestimo.png" alt="">
            </div>

            <legend></legend>
                <div class="form">

                    <form action="cap_emp.php" method="post">

                        <div class="header-form">
                            <div class="titulo-form">
                                <h1>Realizar Emprestimo</h1>
                            </div>
                        </div>

                        <!-- Exibir mensagem de erro se existir -->
                        
                <div class="mensagem-erro">
                   <?php
                   
                    echo $_SESSION['mensagem']; 
                    echo '</br>';

                   ?>
                   </div>

                       <div class="total-input">
                             <div class="labels">
                                <label for="cpfleitor"> <strong> CPF do Leitor:</strong></label>
                                <input type="text" name="cpfleitor" placeholder="000.000.000-00">
                            </div>
  
                            <div class="labels">
                                <label for="dataegresso"><strong> Data de egresso:</strong></label>
                                <input type="date" name="dataegresso" autofocus required>
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
                       <!--  

                            <div class="labels">
                                <label for="cpffun"> <strong> CPF do Funcionario:</strong></label>
                                <input type="text" name="cpffun" placeholder="000.000.000-00">
                            </div>

                           
--> 
</html>

