<?php
$usuario = 'root';
$senha = '';
$database = 'newworld';
$host = 'localhost';

$con = new mysqli($host, $usuario, $senha, $database);

if($con -> error)
{
    die("Errouuuuuuuuuuu" . $con -> error);
}
?>