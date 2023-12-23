<?php
require_once "./BD/db.php";

class Question
{
    private $db;
    private $id;
    private $question;
    private $idT;

    public function __get($propertyName)
    {
        if (property_exists($this, $propertyName))
            return $this->$propertyName;

        return null;
    }

    public function __set($propertyName, $value)
    {
        if (property_exists($this, $propertyName))
            $this->$propertyName = $value;
        else
            return null;
         
    }

    public function recupererQ()
    {
        $this->db = new DB();
        $pdo = $this->db->connect();

        $query = "SELECT * FROM question WHERE idQ = :idQ";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':idQ', $this->id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {

            $this->id = $result['idQ'];
            $this->question = $result['question'];
            $this->idT = $result['idT'];
            return true;
        }

        return false;
    }
}
?>
