<?php

require_once('../db.php');

class RecoverPassword{
  use Common;
  private $message = [];
    public function __construct(){
            $this->recover();
    }

    public function recover(){
        $con     = $this->con();
        $email  =   $this->cleanInput($_POST["student_email"]);

        if (  $this->exists( $email,"users","st_email")   ){
            //  Generate new password
            $newPassword  = random_bytes(6);
            $hashPassword = md5( $newPassword );
            // Then update the users table with the paswword generated 
            $query = $con->query("UPDATE `users` SET `st_pass` ='$hashPassword' WHERE `st_email`='$email'");
            
            if($query){

                $this->message['msg']  = "success";       
                $this->message['info'] = "We have sent you a mail. Kindly check your email for the next process ---::".$newPassword; 

            }else{

                $this->message['msg'] = "Error Recovering Password"; 

            }


        }else{

            $this->message['msg'] = "User Not Found"; 

        }

        echo json_encode($this->message) ;
    }
    
}

new RecoverPassword();



?>