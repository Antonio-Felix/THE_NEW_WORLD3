<?php
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['cpffun'])) {
    die("Você não pode acessar esta página porque não está logado.<p><a href=\"../../form/login.php\">Entrar</a></p>");
}
?>
