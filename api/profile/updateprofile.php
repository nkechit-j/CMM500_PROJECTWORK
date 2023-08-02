<?php

require_once('../db.php');

class UpdateProfile{
     use Common;
     private $message = [];

    public function __construct(){
            // execute the function 
            $this->update();
    }

    private function update(){

       $email    =   $this->cleanInput($_POST["email"]);
       $username =   $this->cleanInput($_POST["username"]);       
       $user_id  =   $this->cleanInput($_POST["user_id"]);  
       $user_type           =   $this->cleanInput($_POST["user_type"]);  
       
       switch( $user_type ){

            case 'admin': 
                       // check to ensure no empty values were sent
                    if(!empty( $email ) && !empty( $username ) ){  
                        //  update the user info 
                        $query = $this->con()->query("UPDATE `admin` SET `admin_email`='$email', `admin_username`='$username' WHERE `admin_id`='$user_id' ");  
                        if($query){
                            $this->message['msg'] = "success";
                        }else{
                            $this->message['msg'] = "Error Occured"; 
                        } 

                    }else{
                        $this->message['msg'] = "All fields are required";
                    }

            break;

            default:
               // check to ensure no empty values were sent
                if(!empty( $email ) && !empty( $username ) ){  
                    //  update the user info 
                    $query = $this->con()->query("UPDATE `users` SET `st_email`='$email', `st_username`='$username' WHERE `st_id`='$user_id' ");  
                    if($query){
                        $this->message['msg'] = "success";
                    }else{
                        $this->message['msg'] = "Error Occured"; 
                    } 

                }else{
                    $this->message['msg'] = "All fields are required";
                }
            break;

       }

       // check to ensure no empty values were sent
       if(!empty( $email ) && !empty( $username ) ){  
                //  update the user info 
                $query = $this->con()->query("UPDATE `users` SET `st_email`='$email', `st_username`='$username' WHERE `st_id`='$user_id' ");  
                if($query){
                    $this->message['msg'] = "success";
                }else{
                    $this->message['msg'] = "Error Occured"; 
                } 

            }else{
                $this->message['msg'] = "All fields are required";
            }

            //  finalyy send a json response
            echo json_encode($this->message) ;

    }
    
}


new UpdateProfile();

?>