<?php

require_once('../db.php');

class Register{
     use Common;
     private $message = [];

    public function __construct(){

    }

    public function createUser(){

       $student__email  =   $this->cleanInput($_POST["student__email"]);
       $username        =   $this->cleanInput($_POST["username"]);
       $password1       =   $this->cleanInput($_POST["password1"]);
       $password2       =   $this->cleanInput($_POST["password2"]);

       // check to ensure no empty values were sent
       if(!empty( $student__email ) && !empty( $username )  && !empty( $password1 ) && !empty( $password2 ) ){
             
           // double check to see if the two password matches
           if($password1 === $password2){

           }else{
            
           }

       }


    }
    
}



?>