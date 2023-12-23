<?php
require_once "./Modele/question_modele.php";

class QuestionController
{
    public $questionText; 
    public $questionID;   
    public $themeID;      

    public function recupererQuestion()
    {
        $questionModel = new Question();
        $questionModel->id = 1;

        if ($questionModel->recupererQ()) {
            $this->questionID = $questionModel->id;
            $this->questionText = $questionModel->question;
            $this->themeID = $questionModel->idT;

            require_once "./Vue/quizz_vue.php";
        } else {
            echo "La question avec l'ID {$questionModel->id} n'a pas été trouvée.";
        }
    }
}
?>
