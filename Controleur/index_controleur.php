<?php
session_start();

if(isset($_POST['commancer'])){
    $_SESSION['pseudo'] = $_POST['pseudo'];
    if(isset($_SESSION['pseudo'])){
        header('location: quizz.php');
    }
}

?>