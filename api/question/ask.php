<?php

require_once('../db.php');

class Question{
     use Common;
     private $message = [];

    public function __construct(){
            // execute the function 
            $this->createUser();
    }

    public function createUser(){

       $title     =   $this->cleanInput($_POST["title"]);
       $question  =   $this->cleanInput($_POST["question"]);
       $tags      =   $this->cleanInput($_POST["tags"]);
       $user      =   $this->cleanInput($_POST["user"]);

       $tag_asstring = json_decode($tags, true); 
       // check if the user already exist

       if( !$this->exists($user,"users","st_email") )  die(json_encode(['msg'=>"Login to ask Question"])); 


       // check to ensure no empty values were sent
       if(!empty( $title ) && !empty( $question )  && !empty( $tags ) && !empty( $user ) ){
        // get the id of the user asking the question
          $stID = $this->getUserByEmail($user)['st_id'];
             
                //  Store the user Question to the database
                $sql = "INSERT INTO `question`(`q_title`, `question`,`st_id`,`q_tags`,`createdAt`) VALUES( '$title','$question','$stID','$tag_asstring',NOW() )";
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


new Question();


?>