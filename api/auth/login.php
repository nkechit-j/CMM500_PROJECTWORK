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
        $userType      =   $this->cleanInput($_POST["login"]); 
        $password1   =   md5($password1);

        switch( $userType ){

            case 'user':
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
                        $this->message['msg'] = "User Not Found. Create an Account."; 
                    }
            break;

            case 'admin':

                        // check if the user can be found
                        if($this->exists( $username,"admin","admin_username")  || $this->exists( $username, "admin", "admin_email") ){
                            // then attempt logging in
                            $query = $con->query("SELECT * FROM `admin` WHERE `admin_username`='$username' OR `admin_email`='$username' ");
                            if($query && $query->num_rows > 0){ 

                                $row = $query->fetch_assoc();
                                // confirm if the password matched
                                if($password1 == $row['admin_pass']){
                                    $this->message['msg']  = "success";
                                    $this->message['user']   = $row['admin_username'];

                                    // Set the user session
                                    $_SESSION["_SOC_ADMIN_USER__"] = $row['admin_email'];
                                    $_SESSION["_USER_ID"]    = $row['admin_id']; 

                                }else{
                                    $this->message['msg']  = "Username or Password Incorrect";
                                }


                            }else{
                                $this->message['msg'] = "Error Occured"; 
                            }

                        }else{
                            $this->message['msg'] = "User Not Found."; 
                        }

            break;

        }



           //  finalyy send a json response
       echo json_encode($this->message) ;

    }

    
}

new Login();



?>