<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Contenu/style/style_quizz.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="logo"></div>
        <button>Next</button>
    </header>
    <section class="sec1">
        <div class="question"></div>
    </section>
    <section class="sec2">
        <form>
            <div class="div1">
                <input type="submit" value="A)">
                <input type="submit" value="B)">
            </div>
            <div class="div2">
                <input type="submit" value="C)">
                <input type="submit" value="D)">
            </div>
        </form>
    </section>
    <!-- footer -->
    <?php require_once "./Contenu/footer.php";?>
</body>
</html>