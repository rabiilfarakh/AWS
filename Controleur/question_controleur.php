<?php
require_once "./Modele/question_modele.php";

class QuestionControleur
{
    public $questionText; 
    public $questionID;   
    public $themeID;    
    public $theme;  

    public function getQuestionControleur($i)
    {
        $questionModel = new Question();
        $questionModel->idQ = $i;

        if ($questionModel->getQuestion()) {

            $this->questionID = $questionModel->idQ;
            $this->questionText = $questionModel->question;
            $this->themeID = $questionModel->idT;
            $this->theme = $questionModel->theme;

            require_once "./Vue/quizz_vue.php";
        } else {
            echo "La question avec l'ID {$questionModel->idQ} n'a pas été trouvée.";
        }
    }

    
}
?>
