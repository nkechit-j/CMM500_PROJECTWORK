<?php

require_once('../db.php');

class UpdatePassword{
     use Common;
     private $message = [];

    public function __construct(){
            // execute the function 
            $this->update();
    }

    public function update(){

       $currentPassword     =   $this->cleanInput($_POST["currentPassword"]);
       $newPassword         =   $this->cleanInput($_POST["newPassword"]);       
       $confirmNewPassword  =   $this->cleanInput($_POST["confirmNewPassword"]);     
       $user_id             =   $this->cleanInput($_POST["user_id"]);     
       $user_type           =   $this->cleanInput($_POST["user_type"]);  
       
       
       switch( $user_type ){

            case 'admin':                   
            $existingPassword    = $this->getAdminById($user_id)['admin_pass'];
            $hashPassword        = md5($confirmNewPassword) ;
            // compare the nw password hashes   
                    //  update the user info
                    $sql   = "UPDATE  `admin` SET `admin_pass`='$hashPassword'  WHERE `admin_id`='$user_id' AND `admin_pass`='$existingPassword'";
                    $query = $this->con()->query($sql);
                    // check if the query succeeded 
                    if($query){
                        $this->message['msg'] = "success";
                    }else{
                        $this->message['msg'] = "Error Occured"; 
                    } 
            break;

            default:  
            $existingPassword    = $this->getUserById($user_id)['st_pass'];
            $hashPassword        = md5($confirmNewPassword) ;
            // compare the nw password hashes  
                 //  update the user info
                 $sql   = "UPDATE  `users` SET `st_pass`='$hashPassword'  WHERE `st_id`='$user_id' AND `st_pass`='$existingPassword'";
                 $query = $this->con()->query($sql);
                 // check if the query succeeded 
                 if($query){
                     $this->message['msg'] = "success";
                 }else{
                     $this->message['msg'] = "Error Occured"; 
                 } 
            break;

       }

     
       
    //  finalyy send a json response
     echo json_encode($this->message) ;

    }
    
}


new UpdatePassword();

?>