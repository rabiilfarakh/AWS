<?php 

require_once "./Controleur/result_controleur.php";

$objetResult = new ResultControleur();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>result</h1>
    <h3>Votre score est: <?php echo $objetResult->scoreContoleur();?></h3>
</body>
</html>