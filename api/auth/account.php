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

       // check if the user already exist

       if( $this->exists($student__email,"users","st_email") )  die(json_encode(['msg'=>" Account Already Exists. Login Instead"]));

       if( $this->exists($username,"users","st_username") ) die(json_encode(['msg'=>" Account Already Exists. Login Instead"])); 

       // check to ensure no empty values were sent
       if(!empty( $student__email ) && !empty( $username )  && !empty( $password1 ) && !empty( $password2 ) ){
             
           // double check to see if the two password matches
           if($password1 === $password2){
                //    Hass the password 
                $password = md5($password1);
                //  Store the user information to the database
                $sql = "INSERT INTO `users`(`st_email`, `st_username`,`st_pass`, `createdAt`) VALUES( '$student__email','$username','$password',NOW() )";
                $query = $this->con()->query($sql);
                // check if the query succeeded 
                if($query){
                    $this->message['msg'] = "success";
                }else{
                    $this->message['msg'] = "Error Occured"; 
                }

           }else{
            die(json_encode(['msg'=>"Password Mismatch"])); 
           }

       }else{
          $this->message['msg'] = "All fields are required";
       }

    //  finally send a json response
     echo json_encode($this->message) ;

    }
    
}


new Register();

?>