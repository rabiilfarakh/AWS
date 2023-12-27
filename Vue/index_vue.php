<?php
require_once "./Controleur/index_controleur.php";
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./Contenu/style/style_index.css">
    <title>Quiz</title>
</head>
<body>
    <header>
        <div class="logo"></div>
        <div class="progress">
    <div class="w-9/12 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700 mx-40">
  <div class="bg-black h-2.5 rounded-full" style="width: 33%"></div>
</div>
    </header>


    <section class="sec1">
        <div class="user">
            <h2>Bostez vos capicité</h2>
            <form method="POST">
                <input type="text" name="pseudo" placeholder="Entrer votre pseudo" >
                <button type="submit" name="commancer" >Commancer</button>
            </form>            
        </div>
    </section>
    <!-- footer -->
    <?php require_once "./Contenu/footer.php";?>   
</body>
</html>
<?php $content = ob_get_clean();?>