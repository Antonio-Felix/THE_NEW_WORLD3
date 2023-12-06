<?php
    include ('../../../captura/protect.php');
    include('../../../conexao.php');
    //session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> THE NEW WORLD </title>

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

                    <form action="cap_livro.php" method="post">

                        <h1 class="h1-form"> Cadastro do livro </h1>

                        <div class="logo-login">
                            <img class="logo" src="../../../../Imagens/world-book-day (1).png" alt="">
                        </div>
                        
                        <div class="mensagem-erro">

                        <?php

                        if (isset($_SESSION["mensagem5"])) {

                        echo   $_SESSION['mensagem5']; 
                        $_SESSION['mensagem5'] = ' ';

                        }
                        ?>
                        </div>

                            <div class="caixa-input">
                                <input type="number" name="codlivro" placeholder="Código do livro" autofocus required>
                            </div>

                            <div class="caixa-input">
                                <input type="text" name="titulo" placeholder="Titulo" required>
                            </div>

                            <div class="caixa-input">
                                <input type="text" name="autor" placeholder="Autor" required>
                            </div> 

                            <div class="caixa-input">
                                <input type="text" name="categoria" placeholder="Categoria" required>
                            </div>

                           <label for="situacao"> Situação: </label><br>
                        <select class="select"name="situacao" id="situacao">
                        <option selected disabled value=""> <strong>Selecione</strong></option>

                        <?php
                        $query = "select * from situacao";
                        $result = mysqli_query($con, $query);
                        while($linha = mysqli_fetch_array($result)){
                            echo "<option value ='".$linha['codsitua']."'>".$linha['nome']."</option>";
                        }
                        ?>
                        </select>

                            <div class="div-btn-login">
                                <button type="submit" class="botao-login"> Cadastrar</button>
                            </div> 

            </form>
        
    </div>
    
</body>
</html>

