<?php
    include ('../../captura/protect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cadastro livro </title>

    <link rel="shortcut icon" href="../../../../Imagens/world-book-day.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../../../projcss.css">
</head>

<body class="bodies">
    
    <div class="container">
        <div class="img-form">
            <img class="imagem" src="../../../../Imagens/livro.png" alt="">
        </div>
            
            <div class="form">
                    <form action="cap_livro.php" method="post">
                    <div class="header-form">
                        <div class="titulo-form">
                            <h1> Cadastro do livro</h1>
                        </div>
                    </div>

                        <div class="total-input">
                            <div class="labels">
                                <label for="codlivro"><strong>Código do livro:</strong> </label>
                                <input type="number" name="codlivro" autofocus required>
                            </div>

                            <div class="labels">
                                <label for="titulo"><strong>Titulo:</strong></label>
                                <input type="text" name="titulo">
                            </div>

                            <div class="labels">
                                <label for="autor"><strong>Autor:</strong></label>
                                <input type="text" name="autor">
                            </div> 

                            <div class="labels">
                                <label for="categoria"><strong>Categoria:</strong></label>
                                <input type="text" name="categoria">
                            </div>

                           <label for="situacao"> <strong>Situação:</strong> </label><br>
                        <select class="select"name="situacao" id="situacao">
                        <option selected disabled value=""> <strong>Selecione</strong></option>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "newworld");
                        $query = "select * from situacao";
                        $result = mysqli_query($con, $query);
                        while($linha = mysqli_fetch_array($result)){
                            echo "<option value ='".$linha['codsitua']."'>".$linha['nome']."</option>";
                        }
                        ?></select>
                            
                            <br>
                            <input class="botao-cad" type="submit" value="Cadastrar">
                </div>
            </form>
            <a href="../index_biblio.html"><button class="botao-voltar"> Voltar </button></a>
        </div>
        
    </div>
    
</body>
</html>

