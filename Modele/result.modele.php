<?php  
require_once "./BD/db.php";
class Result{
    private $db;
    private $idRes;
    private $idQ;
    private $idR;

    public function __get($propertyName){
        if(property_exists($this,$propertyName))
            return $this->$propertyName;
        return null;
    }

    public function __set($propertyName,$value){
        if(property_exists($this,$propertyName))
            $this->$propertyName = $value;
        return null;
    }

    public function insertReponseUser(){
        $this->db = new db();
        $pdo = $this->db->connect();

        $query = "INSERT INTO result (idQ,idR) values (?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam( 1 ,$this->idQ);
        $stmt->bindParam( 2 ,$this->idR);
        
        if($stmt->execute())
            return true;
        return null;
    }

    public function score(){
        $this->db = new db();
        $pdo = $this->db->connect();
    
        $query = "SELECT COUNT(rs.idRes) as total FROM result rs
                  JOIN reponse rp ON rp.idR = rs.idR
                  WHERE rp.statut = true";
        
        $stmt = $pdo->prepare($query);
    
        if($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'];
        }
        
        return null;
    }
    

}

?>