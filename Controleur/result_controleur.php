<?php 

require_once "./Modele/result.modele.php";

class ResultControleur{
    public $insertReponse;
    public $score;

    public function insertReponseContoleur($idQ,$idR) {

        $resultModel = new Result();
        $resultModel->idQ = $idQ;
        $resultModel->idR = $idR;

        $this->insertReponse = $resultModel->insertReponseUser();
    }

    public function scoreContoleur() {
        $scoreModel = new Result(); 

        return $scoreModel->score();
    }

    public function deleteControleur() {
        $deleteModel = new Result(); 
        
        return $deleteModel->delete();
    }

    public function terminer(){
        if(isset($_POST['termine'])){
            header('location: index.php');
        }
    }

    public function insertLast($i, $selectedAnswer) {
        if ($i > 10) {
            $this->insertReponseContoleur(10, $selectedAnswer);
            header('location: result.php');
            exit(); 
        }
    }

    public function Correction(){
        $objetResult = new Result();
        $tousLesStatuts = $objetResult->statuts();
    
        foreach ($tousLesStatuts as $statut) {
            echo '<div style="margin-left: 24px;">'; // Ajustez cette valeur selon vos besoins
            $justifications = $objetResult->justification($statut['idQ']);
            echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="' . ($statut['statut'] == 0 ? 'red' : 'green') . '" class="bi ' . ($statut['statut'] == 0 ? 'bi-x-circle' : 'bi-check-circle') . '" viewBox="0 0 16 16">';
            echo '<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14"/>';
            if ($statut['statut'] == 0) {
                echo '<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708"/>';
            } else {
                echo '<path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>';
            }
            echo '</svg>' . $statut['idQ']."-".$statut['reponse']."<br>";
    
            if ($statut['statut'] == 0 && !empty($justifications)) {
                echo "Correction: ";
                foreach ($justifications as $justification) {
                    echo $justification['justification']."<br><br>";
                }
            }
            echo '</div>';
        }
    }
    
    
    
    
    
    
    

}

?>