<?php

require_once('../db.php');

class Recover{
  use Common;
  private $message = [];
    public function __construct(){
            $this->recover();
    }

    public function recover(){
        $con     = $this->con();
        $email  =   $this->cleanInput($_POST["student_email"]);

        if (  $this->exists( $email,"users","st_email")  ){
            //  Generate new password
            $newPassword  = rand(888888,999999);
            $hashPassword = md5( $newPassword );
            // Then update the users table with the paswword generated 
            $query = $con->query("UPDATE `users` SET `st_pass` ='$hashPassword' WHERE `st_email`='$email'");
            
            if($query){

                $this->message['msg']  = "success";       
                $this->message['info'] = "Kindly check your email for the next process"; 

                // send email contaiining the new password to the user
                $recover_messsgae = '<h3>Password Recovery Request</h3>
                                     <p>
                                      Hi <strong>'.$email.'</strong>
                                      A reset password request was made on your account and below is the new password:
                                      <b>'.$newPassword.'</b>
                                     </p>';
                            // Always set content-type when sending HTML email
                            $headers = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                            // More headers
                            $headers .= 'From: <info@brainshare.com>' . "\r\n"; 

                // mail($email,"Account Password REcovery",$recover_messsgae,$headers);      
                

            }else{

                $this->message['msg'] = "Error Recovering Password"; 

            }


        }else{

            $this->message['msg'] = "User Not Found"; 

        }

        echo json_encode($this->message) ;
    }
    
}

new Recover();



?>