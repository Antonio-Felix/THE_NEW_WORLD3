<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> THE NEW WORLD </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> 
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
                </nav>

            </div>
        </div>            
</header>

    <div class="container">

            <form action="cap_cad_funcionario.php" method = "post">
            
                <h1 class="h1-form"> Cadastrar Funcionário </h1>

                <div class="logo-login">
                    <img class="logo" src="../../../../Imagens/world-book-day (1).png" alt="">
                </div>

                 <!-- Exibir mensagem de erro se existir -->

                 <div class="mensagem-erro">

                    <?php
                    session_start();
                    if (isset($_SESSION["mensagem8"])) {
                    echo   $_SESSION['mensagem8']; 
                    $_SESSION['mensagem8'] = ' ';
                    }
                    ?>

                </div>

                    <div class="caixa-input">
                        <input type="text" name="nome" placeholder = "Nome" required>
                    </div>
                    
                    <div class="caixa-input">
                        <input type="number" name="cpffun" id="cpffun" autofocus placeholder="CPF" required>
                    </div>

                    <div class="caixa-input">
                        <input type="password" name="senha" id="password" placeholder="Senha" required>
                        <i class="bi bi-eye" onclick="mostrarSenha()" id="btnSenha"></i>
                    </div>

                    <div class="caixa-input">
                        <input type="email" name="email" placeholder = "Email" required>
                    </div>

                    <div class="caixa-input">
                        <input type="text" name="fone" placeholder = "Telefone" required>
                    </div>

                    <div class="div-btn-login">
                        <button type="submit" class="botao-login"> Cadastrar </button>
                    </div> 
                    
            </form>
        </div>
    </div>

    <script src="../../../form/senha.js"></script> 
</body>
</html>

