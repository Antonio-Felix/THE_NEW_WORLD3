<?php
    include ('../../captura/protect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cadastro de Usuário</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> 
    <link rel="shortcut icon" href="../../Imagens/world-book-day.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../../../projcss.css">
</head>

<body class="bodies">

    <div class="container">
        <div class="img-form">
            <img class="imagem" src="../../Imagens/form.png" alt="">
        </div>

        <div class="form">
            <form action="cap_leitor.php" method = "post">

                <div class="header-form">
                    <div class="titulo-form">
                        <h1> Cadastro de Leitor </h1>
                    </div>
                </div>

                    <div class="labels">
                        <label for="nome"> <strong> Nome: </strong> </label>
                        <input type="text" name="nome" placeholder = "Digite seu nome" required>
                    </div>
                    
                <div class="total-input">
                    <div class="labels">
                        <label for="cpfleitor"> <strong>CPF:</strong> </label>
                        <input type="number" name="cpfleitor" id="cpffun" autofocus placeholder="00000000000" required>
                    </div>

                    <div class="labels">
                        <label for="senha"> <strong>Senha:</strong> </label>
                        <input type="password" name="senha" id="senha" placeholder="********" required>
                        <i class="bi bi-eye" onclick="mostrarSenha()" id="btnSenha"></i>
                    </div>

                    <div class="labels">
                        <label for="email"> <strong> Email: </strong> </label>
                        <input type="email" name="email" placeholder = "nome@gmail.com" required>
                    </div>

                    <div class="labels">
                        <label for="fone"> <strong> Telefone: </strong> </label>
                        <input type="number" name="fone" placeholder = "00000000000" required>
                    </div>

        
                    
                    <div class="labels">
                       
                       
                    </div>

                    <input class="botao-cad" type="submit" value="Cadastrar">
                </div>
            </form>
            <a href="../../index.html"><button class="botao-voltar"> Voltar </button></a>
        </div>
    </div>

    <script src="senha.js"></script> 
</body>
</html>

