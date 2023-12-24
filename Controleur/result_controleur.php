<?php 

require_once "./Modele/result.modele.php";

class ResultControleur{
    public $insertReponse;

    public function insertReponseContoleur($idQ,$idR) {

        $resultModel = new Result();
        $resultModel->idQ = $idQ;
        $resultModel->idR = $idR;

        $this->insertReponse = $resultModel->insertReponseUser();
    }

}

?>