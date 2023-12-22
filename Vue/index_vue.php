<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./Contenu/style/style.css">
    
    <title>Document</title>
</head>
<body>
    <header>
        <div class="logo"></div>
    </header>
    <section class="sec1">
        <div class="user">
            <h2>Bostez vos capicité</h2>
            <div class="div">
                <input type="text" name="name" placeholder="Entrer votre pseudo" >
                <button type="submit" name="commancer" >Commancer</button>
            </div>
        </div>
    </section>
    <footer class="bg-violet-700 p-4">
        <div class="container mx-auto text-center text-white">
            <p>© 2024 Quizly  All Rights Reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
        </div>
    </footer>
    
</body>
</html>
<?php $content = ob_get_clean();?>