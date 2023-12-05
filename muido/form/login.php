<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="shortcut icon" href="../../Imagens/world-book-day.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../projcss.css">
</head>

<body class="bodies">

    <div class="container">
        <div class="img-form">
            <img class="imagem" src="../../Imagens/cadastro.png" alt="">
        </div>
        <div class="form">
            <form action="../captura/autenticgames.php" method = "post">
        
                <div class="header-form">
                    <div class="titulo-form">
                        <h1> Realizar Login </h1>
                    </div>
                </div>
                <div class="total-input">
                    <?php
                    session_start();
                    echo '<div class="labels">';
                    echo'<label for="cpf"><strong> CPF: </strong> </label>';
                    echo '<input type="text" id="cpf" name="cpf" placeholder="Insira seu cpf" autofocus>';
                    echo '</div>';
                   if (isset($_SESSION["mensagem3"])) {
                    echo   $_SESSION['mensagem3']; 
                    echo '</br>';
                    $_SESSION['mensagem3'] = ' ';
                   }
                   ?>
                    <div class="labels">
                        <label for="senha"><strong>Senha:</strong> </label>
                        <input type="text" id="password" name="senha" placeholder="Insira sua senha " autofocus>
                    </div>
                    <div>
                        
                    <?php
                   if (isset($_SESSION["mensagem4"])) {
                    echo   $_SESSION['mensagem4']; 
                    echo '</br>';
                    $_SESSION['mensagem4'] = ' ';
                   }
                   if(isset($_SESSION["mensagem6"])){
                    echo   $_SESSION['mensagem6']; 
                    echo '</br>';
                    $_SESSION['mensagem6'] = ' ';
                   }
                   
                   ?>
                    </div>
                    <br>

                    <input class="botao-cad" type="submit" value="Logar">
                    
                </div>
            </form>
            <a href="../../index.html"><button class="botao-voltar"> Voltar </button></a>
        </div>
    </div>
</body>
</html>
