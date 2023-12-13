<?php
if(!isset($_SESSION)) {
session_start();
}
if(!isset($_SESSION['cpfleitor'])) {
    ?>
    <!DOCTYPE html>
    <html lang='pt-br'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel='stylesheet' href='../../../projcss.css'>
    
        <title> THE NEW WORLD </title>
    </head>
    <body class='bodies'>
    
        <header class='header-login'>
            <div class='container-header-login'> 
    
                <div class='alinhar-header-login'> 
    
                    <nav class='navg-login'>      
                        <a class='link-linha' href='../../../index.html'> HOME </a>
                    </nav>
    
                </div>
            </div>
        </header>
    
        <div class='container-mserro'>
            <span class='icon-erro'><ion-icon name='close-circle-outline'></ion-icon></span>
            <div class='h1-erro'>
                <h1> ERRO !!! </h1>
            </div>
            
            <h2> Você não está logado </h2>
    
            <div class='div-btn-erro'>
                <a href='../../form/login.php'><button type='submit' class='botao-erro'> Fazer Login </button></a>
            </div> 
    
        </div>
            
        <script type="module" src='https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js'></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
    </html>
    <?php
    exit();
}
?>