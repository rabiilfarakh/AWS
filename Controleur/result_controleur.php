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
        $score = $scoreModel->score();
        return $score;
    }


}

?>