<?php
require_once "./Controleur/index_controleur.php";
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./Contenu/style/style_index.css">
    
    <title>Document</title>
</head>
<body>
    <header>
        <div class="logo"></div>
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