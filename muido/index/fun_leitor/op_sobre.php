<?php
    include "../../captura/protect2.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../../projcss.css">
    <link rel="shortcut icon" href="../../../Imagens/world-book-day.png" type="image/x-icon">
    
    <title>THE NEW WORLD</title>
</head>

<body class="body-menu">

    <header class="header-login">
        <div class="container-header-login"> 

            <div class="alinhar-header-login"> 

                <nav class="navg-login">      
                    <a class="link-linha" href="../../../index.html"> HOME </a>
                    <a class="link-linha" href="index_leitor.php"> VOLTAR </a>
                </nav>

            </div>
        </div>            
    </header> 

    <div class="container-leitor">
    <div class="navegacao-menu-leitor">
            <ul>
                <li class="linha-lista active">
                    <a href="#">
                        <span class="icons-menu"><ion-icon name="home-outline"></ion-icon> </span>
                        <span class="titulos"> Bem-Vindo </span>
                    </a>
                </li>

                <li class="linha-lista">
                    <a href="listar_emp.php">
                        <span class="icons-menu"><ion-icon name="file-tray-full-outline"></ion-icon> </span>
                        <span class="titulos"> Histórico </span>
                    </a>
                </li>

                <li class="linha-lista">
                    <a href="livros_disponiveis.php">
                        <span class="icons-menu"> <ion-icon name="library-outline"></ion-icon> </span>
                        <span class="titulos"> Acervo </span>
                    </a>
                </li>
 
                <li class="linha-lista">
                    <a href="op_sobre.php">
                        <span class="icons-menu"> <ion-icon name="information-circle-outline"></ion-icon> </span>
                        <span class="titulos"> Sobre </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

        <div class="logo-sobre-leitor">
            <img class="lg-sobre-leitor" src="../../../Imagens/world-book-day (1).png" alt="">

            <div class="emails">
                <a href="https://instagram.com/the_newworld3?igshid=NGVhN2U2NjQ0Yg==">instagram.neworld</a> <br><br>
                <a href="https://criarmeulink.com.br/u/1702308221">antonio980felixmedeiros@gmail.com</a> <br><br>
                <a href="https://criarmeulink.com.br/u/1702308430">barbararaujo977@gmail.com</a> <br><br>
                <a href="https://criarmeulink.com.br/u/1702308430">tlucasdelucena@gmail.com</a>
            </div> 
        </div>

</body>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script src="../fun_biblio/menujs.js"></script> 
</html>