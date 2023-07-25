<?php

session_start();
require_once('../db.php');

class Login{
   use Common;
   private $message = [];
    public function __construct(){
            $this->login();
    }

    public function login(){ 
        $con  = $this->con();
        $username    =   $this->cleanInput($_POST["username"]);
        $password1   =   $this->cleanInput($_POST["password1"]); 
        $password1   =   md5($password1);

        // check if the user can be found
        if($this->exists( $username,"users","st_username")  || $this->exists( $username, "users", "st_email") ){
            // then attempt logging in
            $query = $con->query("SELECT * FROM `users` WHERE `st_username`='$username' OR `st_email`='$username' ");
            if($query && $query->num_rows > 0){ 

                $row = $query->fetch_assoc();
                // confirm if the password matched
                if($password1 == $row['st_pass']){
                    $this->message['msg']  = "success";
                    $this->message['user']   = $row['st_username'];

                    // Set the user session
                    $_SESSION["_USER_EMAIL"] = $row['st_email'];
                    $_SESSION["_USER_ID"]    = $row['st_id']; 

                }else{
                    $this->message['msg']  = "Username or Password Incorrect";
                }


            }else{
                $this->message['msg'] = "Error Occured"; 
            }

        }else{
            $this->message['msg'] = "User Not Found"; 
        }

           //  finalyy send a json response
       echo json_encode($this->message) ;

    }

    
}

new Login();



?>