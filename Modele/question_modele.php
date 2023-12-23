<?php
require_once "./BD/db.php";
class Question{
    private $db;
    private $idQ;
    private $question;
    private $idT;
    private $theme;

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
        
        return null; 
    }

    public function getQuestion()
    {
        $this->db = new db();
        $pdo = $this->db->connect();

        $query = "SELECT q.*,t.theme FROM question q
                    join  theme t 
                    where t.idT = q.idT 
                    AND q.idQ = :idQ";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':idQ', $this->idQ);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $this->idQ = $result['idQ'];
            $this->question = $result['question'];
            $this->idT = $result['idT'];
            $this->theme = $result['theme'];
            return true;
        }

        return false;
    }
}
?>
