<?php
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['cpffun'])) {
    die("<script src='codSweet-Alert.js'></script>
    <script src='alert.js'></script>");
}
?>
