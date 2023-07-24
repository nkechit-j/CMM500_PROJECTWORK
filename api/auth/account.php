<?php

require_once('../db.php');

class Register{
     use Common;
     private $message = [];

    public function __construct(){
            // execute the function 
            $this->createUser();
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
                //    Hass the password 
                $password = md5($password1);
                //  Store the user information to the database
                $sql = "INSERT INTO `users`(`st_email`, `st_username`,`st_pass`, `createdAt`) VALUES( '$username','$student__email','$password',NOW() )";
                $query = $this->con()->query($sql);
                // check if the query succeeded 
                if($query){
                    $this->message['message'] = "success";
                }else{
                    $this->message['message'] = "Error Occured"; 
                }

           }else{
             $this->message['message'] = "Password Mismatch";
           }

       }else{
          $this->message['message'] = "All fields are required";
       }

    //  finalyy send a json response
     json_encode($this->message);

    }
    
}



?>