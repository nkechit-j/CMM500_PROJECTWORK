<?php

trait Common{

    public $host = "localhost";
    public $user = "root";
    public $pass = "" ;
    public $db   = "brainshare";

    public function con(){
        $con = new mysqli($this->host,$this->user,$this->pass,$this->db);
        if ($con->connect_errno) die(" Connection not established");
        return $con ;
    }

    public function cleanInput($input){
        return trim( stripslashes( htmlspecialchars( $input) ) );
    }

// Return User Details as Associative array
public function getUserByEmail($email){
    $con        = $this->con();
    $queryRow   = $con->query("SELECT * FROM `users` WHERE `st_email` ='$email'")->fetch_assoc();
    return  $queryRow;
}

    public function exists($val,$table,$col){
        $con     = $this->con();
        if(!empty($val)){
        $sql       = "SELECT * FROM `".$table."` WHERE `".$col."`=?";
        $stmt      = $con->prepare($sql);
        $stmt->bind_param("s",$val);
        $exec      = $stmt->execute();
        if($exec){
        $result   = $stmt->get_result();
        $num_rows = $result->num_rows;
        if($num_rows>0){
            return true;
        }else{
            return false;
        }
        //   $stmt->close();
        }
      }
    }
  
}



?>