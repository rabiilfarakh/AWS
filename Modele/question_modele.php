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

    public function getAllQuestions()
    {
        $this->db = new db();
        $pdo = $this->db->connect();
    
        try {
            $query = "SELECT * FROM question";
    
            $stmt = $pdo->prepare($query);
            $stmt->execute();
    
            $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $questions;
        } catch (PDOException $e) {
            
            return false;
        }
    }
    
}
?>
