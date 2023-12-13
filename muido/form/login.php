<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE NEW WORLD</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="shortcut icon" href="../../Imagens/world-book-day.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../projcss.css">
</head>

<body class="bodies">

    <header class="header-login">
        <div class="container-header-login"> 

            <div class="alinhar-header-login"> 

                <nav class="navg-login">      
                    <a class="link-linha" href="../../index.html"> HOME </a>
                    <a class="link-linha" href="../../index.html"> VOLTAR </a>
                </nav>

            </div>
        </div>            
    </header>

    <div class="container">

        <form action="../captura/autenticgames.php" method = "post">

            <h1 class="h1-form">Login</h1>

                <div class="logo-login">
                    <img class="logo" src="../../Imagens/world-book-day (1).png" alt="">
                </div>

                <?php
                    session_start();
                   if (isset($_SESSION["mensagem3"])) {
                    echo   $_SESSION['mensagem3']; 
                    $_SESSION['mensagem3'] = ' ';
                   }

                   if (isset($_SESSION["mensagem4"])) {
                    echo   $_SESSION['mensagem4']; 
                    $_SESSION['mensagem4'] = ' ';
                   }
                   if(isset($_SESSION["mensagem6"])){
                    echo   $_SESSION['mensagem6']; 
                    $_SESSION['mensagem6'] = ' ';
                   }
                   ?>
                <?php
                if (isset($_SESSION['cpf']) != 0){
                    echo '<div class="caixa-input">';
                        echo "<input type='text' id='cpf' name='cpf' placeholder='CPF' autofocus required value='".$_SESSION['cpf'] ."'>";
                        echo '<i class="bx bxs-user-circle"></i>';
                    echo '</div>';
                }
                else{
                    echo '<div class="caixa-input">';
                        echo '<input type="text" id="cpf" name="cpf" placeholder="CPF" autofocus required>';
                        echo '<i class="bx bxs-user-circle"></i>';
                    echo '</div>';
                }
                ?>
                

                <div class="caixa-input">
                    <input type="password" id="password" name="senha" placeholder="Insira sua senha " autofocus>
                    <i class="bi bi-eye" onclick="mostrarSenha()" id="btnSenha"></i>
                </div>

                <div class="div-btn-login">
                    <button type="submit" class="botao-login"> Login</button>
                </div> 
                

            </form>
    </div>

    <script src="senha.js"></script>
</body>
</html>
