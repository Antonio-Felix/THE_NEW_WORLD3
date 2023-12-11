<?php
    include ('../../captura/protect.php');
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
                    <a class="link-linha" href="../../../index.html"> VOLTAR </a>
                    <a class="link-linha" href="../../logout.php"> LOGOUT </a>
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
                    <a href="leitores/op_leitores.html">
                        <span class="icons-menu"><ion-icon name="people-outline"></ion-icon> </span>
                        <span class="titulos"> Leitores </span>
                    </a>
                </li>

                <li class="linha-lista">
                    <a href="livro/op_livro.html">
                        <span class="icons-menu"> <ion-icon name="book-outline"></ion-icon> </span>
                        <span class="titulos"> Livros </span>
                    </a>
                </li>
 
                <li class="linha-lista">
                    <a href="acoes/op_acoes.html">
                        <span class="icons-menu"> <ion-icon name="settings-outline"></ion-icon> </span>
                        <span class="titulos"> Ações </span>
                    </a>
                </li>

                <li class="linha-lista">
                    <a href="funcionario/op_fun.html">
                        <span class="icons-menu"> <ion-icon name="glasses-outline"></ion-icon> </span>
                        <span class="titulos"> Bibliotecário </span>
                    </a>
                </li>

                <li class="linha-lista">
                    <a href="listagem/op_relatorio.html">
                        <span class="icons-menu"> <ion-icon name="library-outline"></ion-icon> </span>
                        <span class="titulos"> Relatórios </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="logo-menu">
        <img class="lg" src="../../../Imagens/world-book-day (1).png" alt="">
        <div class="oibibliotecario-menu">
            <h2> O l á <br> B i b l i o t e c á r i o </h2>
        </div> 
    </div>

</body>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script src="menujs.js"></script> 

</html>





<!--
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do Bibliotecário</title>

    <link rel="shortcut icon" href="../../../Imagens/world-book-day.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../../projcss.css">
</head>

<body>
    <header class="header-biblio"></header>
        <h1 class="h1-biblio">BEM-VINDO BIBLIOTECÁRIO</h1>
    </header>

    <main class="main-biblio">

        <div class="container-leibiblio">

            <h2 class="h2-biblio">MENU</h2>
            <a href="livro/autor/cad_autor.php"><button class="botoes-biblio"> CADASTRAR AUTOR </button></a>
            <a href=""><button class="botoes-biblio"> CADASTRAR CATEGORIA </button></a>
            <a href=""><button class="botoes-biblio"> REALIZAR DEVOLUÇÃO </button></a>
            <a href=""><button class="botoes-biblio"> RESERVAR LIVRO </button></a>
            <a href="livro/cad_livro.php"><button class="botoes-biblio"> CADASTRAR UM LIVRO </button></a>
            <a href="emprestimo/cad_emp.php"><button class="botoes-biblio"> REALIZAR UM EMPRESTIMO </button></a>
            <a href="emprestimo/listagem_emprestimo.html"><button class="botoes-biblio"> CONSULTAR UM EMPRESTIMO </button></a>
            <a href="../fun_leitor/listar_livro.php"><button class="botoes-biblio"> CONSULTAR LIVROS CADASTRADOS </button></a>
            <a href="leitores/listar_leitores.php"><button class="botoes-biblio"> CONSULTAR LEITORES CADASTRADOS </button></a>
            <a href=""><button class="botoes-biblio"> CADASTRAR LEITORES </button></a>
              <a href="../../logout.php"><button class="botao-voltar"> Sair </button></a>
        </div>

    </main>
</body>
</html>
-->