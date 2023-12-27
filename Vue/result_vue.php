<?php 

require_once "./Controleur/result_controleur.php";

$objetResult = new ResultControleur();
$objetResult->terminer();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./Contenu/style/style_result.css">
    <title>Quiz</title>
</head>
<body>
    <header>
        <div class="logo"></div>
        <button id="toggleCorrectionBtn">Correction</button>
    </header>
    <section class="sec1">
    <div class="w-8/12 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700 mx-1 mr-28 mt-96 relative">
    <div class="bg-black h-2.5 rounded-full absolute top-0" style="width: 100%"></div>
        </div>
        <?php if ($objetResult->scoreContoleur() >= 7) : ?>
            <h2>Félicitation, vous avez réussi le quizz</h2>
        <?php else : ?>
            <h2>Malheureusement, vous avez raté le quizz</h2>
        <?php endif; ?>
        <h2>Votre score est : <?php echo $objetResult->scoreContoleur() * 10; ?>/100</h2>
        <?php $objetResult->Correction(); ?>
    </section>
    <!-- footer -->
    <?php require_once "./Contenu/footer.php";?>
</body>
            
</html>
