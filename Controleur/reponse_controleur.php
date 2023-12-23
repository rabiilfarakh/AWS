<?php
require_once "./Modele/reponse_modele.php";

class ReponseControleur {

    public $reponses;  // Nouvelle propriété pour stocker les réponses

    public function getReponseContoleur($i) {

        $reponseModel = new Reponse();
        $reponseModel->idQ = $i;

        // Correction ici : récupérer toutes les réponses
        $this->reponses = $reponseModel->getAllReponses();
    }
}
?>
