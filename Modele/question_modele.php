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

    public function getQuestion($array)
    {
        $this->db = new db();
        $pdo = $this->db->connect();
    
        // Construction de la clause WHERE conditionnelle
        $whereClause = (!empty($array)) ? "WHERE q.idQ NOT IN (" . implode(',', $array) . ")" : "";
    
        $query = "SELECT q.*, t.theme FROM question q
                  JOIN theme t ON t.idT = q.idT 
                  {$whereClause}
                  ORDER BY RAND()
                  LIMIT 1";
    
        $stmt = $pdo->prepare($query);
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
