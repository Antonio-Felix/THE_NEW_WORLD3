<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESTRITO</title>
</head>
<body>
    <?php
    if(!isset($_SESSION)) {
        session_start();
    }
    if(!isset($_SESSION['cpfleitor'])) {
        die("Você não pode acessar esta página porque não está logado.<p><a href=\"../../form/login.php\">Entrar</a></p>");
    }
    ?>
</body>
</html>