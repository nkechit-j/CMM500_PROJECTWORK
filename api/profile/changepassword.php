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
       
       $existingPassword    = $this->getUserById($user_id)['st_pass'];
       $hashPassword        = md5($confirmNewPassword) ;
       // compare the nw password hashes 
    //    if($existingPassword !== $hashPassword) die( json_encode(['msg' => "Password Mismatch"]) ); 
            //  update the user info
            $sql   = "UPDATE  `users` SET `st_pass`='$hashPassword'  WHERE `st_id`='$user_id' AND `st_pass`='$existingPassword'";
            $query = $this->con()->query($sql);
            // check if the query succeeded 
            if($query){
                $this->message['msg'] = "success";
            }else{
                $this->message['msg'] = "Error Occured"; 
            } 
     
       
    //  finalyy send a json response
     echo json_encode($this->message) ;

    }
    
}


new UpdatePassword();

?>