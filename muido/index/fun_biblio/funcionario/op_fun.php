<?php
    include ('../../../captura/protect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../../../../Imagens/world-book-day.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../../../projcss.css"> 
    <title>THE NEW WORLD</title>
</head>
<body class="body-menu">

    <header class="header-login">
        <div class="container-header-login"> 

            <div class="alinhar-header-login"> 

                <nav class="navg-login">      
                    <a class="link-linha" href="../../../../index.html"> HOME </a>
                    <a class="link-linha" href="../index_biblio.php"> VOLTAR </a>
                    <a class="link-linha" href="../../../logout.php"> LOGOUT </a>
                </nav>

            </div>
        </div>            
    </header> 


    <div class="container-bibliotecario">
        
        <div class="navegacao-menu">
            <ul>
            <li class="linha-lista active">
                    <a href="#">
                        <span class="icons-menu"><ion-icon name="home-outline"></ion-icon> </span>
                        <span class="titulos"> Bem-Vindo </span>
                    </a>
                </li>

                <li class="linha-lista">
                    <a href="../leitores/op_leitores.php">
                        <span class="icons-menu"><ion-icon name="people-outline"></ion-icon> </span>
                        <span class="titulos"> Leitores </span>
                    </a>
                </li>

                <li class="linha-lista">
                    <a href="../livro/op_livro.php">
                        <span class="icons-menu"> <ion-icon name="book-outline"></ion-icon> </span>
                        <span class="titulos"> Livros </span>
                    </a>
                </li>
 
                <li class="linha-lista">
                    <a href="../acoes/op_acoes.php">
                        <span class="icons-menu"> <ion-icon name="settings-outline"></ion-icon> </span>
                        <span class="titulos"> Ações </span>
                    </a>
                </li>

                <li class="linha-lista">
                    <a href="../funcionario/op_fun.php">
                        <span class="icons-menu"> <ion-icon name="glasses-outline"></ion-icon> </span>
                        <span class="titulos"> Bibliotecário </span>
                    </a>
                </li>

                <li class="linha-lista">
                    <a href="../listagem/op_relatorio.php">
                        <span class="icons-menu"> <ion-icon name="library-outline"></ion-icon> </span>
                        <span class="titulos"> Relatórios </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="logo-menu">
        <img class="lg" src="../../../../Imagens/world-book-day (1).png" alt="">

        <div class="div-btn-menu">
            <a href="cadastro_funcionario.php"><button type="submit" class="botao-menu"> Cadastrar </button></a>
        </div> 
        
    </div>

</body>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script src="../../menujs.js"></script> 
</html>

    <!--
    <a href="">CONSULTAR</a>
    -->
