<?php session_start(); ?>
<?php include("../includes/layouts/header.php") ?>
<?php 
    session_start();
    setcookie(session_name(), "", time() - 3600); //send browser command remove sid from cookie
    session_destroy(); //remove sid-login from server storage
    session_write_close();
    header('location:http://localhost/~Harikrishna/phpwebmaster/public/users.php');

?>
<?php include("../includes/layouts/footer.php") ?>