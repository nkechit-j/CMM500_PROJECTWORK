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
  
}



?>