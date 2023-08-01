<?php

require_once('../db.php');

class Answer{
     use Common;
     private $message = [];

    public function __construct(){
            // execute the function 
            $in = file_get_contents('php://input');
            $this->ask();
    }

    public function ask(){ 
        $comment     =   $this->cleanInput($_POST["comment"]);
        $user_email  =   $this->cleanInput($_POST["user_email"]);  
        $q_id        =   $this->cleanInput($_POST["question_id"]);  
        
        // check if the user already exist 
       if( !$this->exists($user_email,"users","st_email") )  die(json_encode(['msg'=>"Login to Make comment"])); 


       // check to ensure no empty values were sent
       if(!empty( $comment ) && !empty( $user_email ) ){
        // get the id of the user asking the question
          $stID = $this->getUserByEmail($user_email)['st_id'];
             
                //  Store the user Question to the database
                $sql = "INSERT INTO `answers`(`st_id`, `q_id`, `answer`, `createdAt`) VALUES( '$stID','$q_id','$comment',NOW() )";
                $query = $this->con()->query($sql);
                // check if the query succeeded 
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


new Answer();


?>