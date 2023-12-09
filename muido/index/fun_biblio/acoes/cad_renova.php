<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE NEW WORLD</title>

    <link rel="shortcut icon" href="../../../../Imagens/world-book-day.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../../../projcss.css"> 

    <style>
        .mensagem-erro {
            color: white;
        }
    
    </style>

</head>

<body class="bodies"> 

    <header class="header-login">
        <div class="container-header-login"> 

            <div class="alinhar-header-login"> 

                <nav class="navg-login">      
                    <a class="link-linha" href="../../../../index.html"> HOME </a>
                    <a class="link-linha" href="../index_biblio.php"> VOLTAR </a>
                </nav>

            </div>
        </div>            
    </header>

       <div class="container">
                    <form action="cap_renova.php" method="post">

                    <h1 class="h1-form"> Renovação </h1>

                        <div class="logo-login">
                            <img class="logo" src="../../../../Imagens/world-book-day (1).png" alt="">
                        </div>
                        <!-- Exibir mensagem de erro se existir -->

                <div class="mensagem-erro">

                   <?php
                   session_start();
                   if (isset($_SESSION["mensagem9"])) {
        
                    echo   $_SESSION['mensagem9']; 
                    echo '</br>';
                    $_SESSION['mensagem9'] = ' ';
                   }
                   ?>
                   </div>

                            <div class="caixa-input">
                                <input type="number" name="cpfleitor" placeholder="CPF do Leitor" autofocus required>
                            </div>
  
                           <!-- <div class="caixa-input">
                                <input type="date" name="dataegresso" placeholder="Data de egresso" required>
                            </div>-->

                             <div class="caixa-input">
                                <input type="number" name="codlivro" placeholder="Código do livro" required>
                            </div>
                       
                            <div class="div-btn-login">
                                <button type="submit" class="botao-login"> Renovar </button>
                             </div> 
                    </form>
                </div>
        </div>
</body>

</html>

