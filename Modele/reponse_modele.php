<?php
require_once "./BD/db.php";
class Reponse{
    private $db;
    private $idR;
    private $reponse;
    private $idQ;
    private $justification;

    public function __get($propertyName) {
        if (property_exists($this, $propertyName)) {
            return $this->$propertyName;
        }
        return null;
    }

    public function __set($propertyName, $value) {
        if (property_exists($this, $propertyName)) {
            $this->$propertyName = $value;
        }
        return null; 
    }

    public function getAllReponses() {
        $this->db = new db();
        $pdo = $this->db->connect();

        $query = "SELECT * FROM reponse WHERE idQ = :idQ";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':idQ', $this->idQ);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>