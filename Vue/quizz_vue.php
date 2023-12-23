<?php
session_start();
require_once "./Controleur/question_controleur.php";
require_once "./Controleur/reponse_controleur.php";

$i = isset($_GET['id']) ? intval($_GET['id']) : 1; 
$objetQuestion = new QuestionControleur();
$objetReponse = new ReponseControleur();
$objetQuestion->getQuestionControleur($i);
$objetReponse->getReponseContoleur($i);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Contenu/style/style_quizz.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <div class="logo"></div>
        <button type="button" id="next">Next</button>
    </header>
    <section class="sec1">
        <div class="question">
        <h2 style="color:#59738D"><?php echo '<span style="color:red"> Question ' . $i.'</span><br>'.$objetQuestion->theme ; ?></h2>
            <h3><?php echo $objetQuestion->questionText; ?></h3>
        </div>
    </section>
    <section class="sec2">
        <form method="POST" id="answersForm">
            <div class="div1">
                <input type="submit" value="<?php echo 'A) ' . $objetReponse->reponses[0]['reponse']; ?>">
                <input type="submit" value="<?php echo 'B) ' . $objetReponse->reponses[1]['reponse']; ?>">
            </div>
            <div class="div2">
                <input type="submit" value="<?php echo 'C) ' . $objetReponse->reponses[2]['reponse']; ?>">
                <input type="submit" value="<?php echo 'D) ' . $objetReponse->reponses[3]['reponse']; ?>">
            </div>
        </form>
    </section>
    <!-- footer -->
    <?php require_once "./Contenu/footer.php";?>

    <script>
        $(document).ready(function() {
            $("#next").click(function() {

                <?php $i++; ?>
                $.ajax({
                    type: "GET",
                    url: "quizz.php",
                    data: { id: <?php echo $i; ?> },
                    success: function(response) {
                        $("body").html(response);
                    }
                });
            });
        });
    </script>
</body>
</html>
