<?php
session_start();
require_once "./Controleur/question_controleur.php";
require_once "./Controleur/reponse_controleur.php";
require_once "./Controleur/result_controleur.php";

$i = isset($_GET['id']) ? $_GET['id'] : 1;
$selectedAnswer = isset($_GET['answer']) ? intval($_GET['answer']) : null;


$objetQuestion = new QuestionControleur();
$objetReponse = new ReponseControleur();
$objetResult = new ResultControleur();

$objetQuestion->getQuestionControleur($i);
$objetReponse->getReponseContoleur($i);
$objetResult->insertReponseContoleur($i,$selectedAnswer);
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
        <?php var_dump($selectedAnswer)?>
        <h2 style="color:black"><?php echo  'Question ' . $i ?><h2>
        <div class="question">
            <h3 style="color:#59738D"><?php echo $objetQuestion->theme ;?></h3>
            <h5><?php echo $objetQuestion->questionText; ?></h5>
        </div>
    </section>
    <section class="sec2">
    <form method="GET" id="answersForm">
        <div class="div1">
            <button type="button" class="answerButton" value="<?php echo $objetReponse->reponses[0]['idR']; ?>">A) <?php echo $objetReponse->reponses[0]['reponse']; ?></button>
            <button type="button" class="answerButton" value="<?php echo $objetReponse->reponses[1]['idR']; ?>">B) <?php echo $objetReponse->reponses[1]['reponse']; ?></button>
        </div>
        <div class="div2">
            <button type="button" class="answerButton" value="<?php echo $objetReponse->reponses[2]['idR']; ?>">C) <?php echo $objetReponse->reponses[2]['reponse']; ?></button>
            <button type="button" class="answerButton" value="<?php echo $objetReponse->reponses[3]['idR']; ?>">D) <?php echo $objetReponse->reponses[3]['reponse']; ?></button>
        </div>
        <input type="hidden" name="selectedAnswer" id="selectedAnswer" value="">
    </form>

    </section>
    
    <!-- footer -->
    <?php require_once "./Contenu/footer.php";?>

    <!-- ajax -->
    <script>
        $(document).ready(function() {
            $(".answerButton").click(function() {
                <?php $i++; ?>
                var selectedAnswer = $(this).val();
                $("#selectedAnswer").val(selectedAnswer);

                <?php if ($i > 10) : ?>
                        window.location.href = "result.php";
                <?php else: ?>
                $.ajax({
                    type: "GET",
                    url: "quizz.php",
                    data: { id: <?php echo $i; ?>, answer: selectedAnswer },
                    success: function(response) {
                        $("body").html(response);
                    }
                });
                <?php endif; ?>
            });



        $("#next").click(function() {
            <?php $i++; ?>

            <?php if ($i > 10) : ?>
                window.location.href = "result.php";
            <?php else : ?>
                $.ajax({
                    type: "GET",
                    url: "quizz.php",
                    data: { id: <?php echo $i; ?> },
                    success: function(response) {
                        $("body").html(response);
                    }
                });
            <?php endif; ?>
        });
    });
    </script>
</body>
</html>
