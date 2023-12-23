<?php 

require_once "db_configue.php";
class db{

    public function connect(){
        try{
            $pdo= new PDO('mysql:host='.host.';dbname='.db.';user='.user.';password='.password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }catch(PDOException $e){
            echo "dbErreur: ".$e->getMessage();
        }
    } 
}

?>

