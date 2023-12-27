<?php
session_start();

if(isset($_POST['commancer'])){
    $_SESSION['pseudo'] = $_POST['pseudo'];
    if(isset($_SESSION['pseudo'])){
        '<div class="w-9/12 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700 mx-40">
        <div class="bg-black h-2.5 rounded-full" style="width: 66%"></div>';
        header('location: quizz.php');
    }
}

?>