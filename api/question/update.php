<?php

require_once('../db.php');

class Question{
     use Common;
     private $message = [];

    public function __construct(){
            // execute the function 
            $in = file_get_contents('php://input');
            $this->updateQuestion($in);
    }

    public function updateQuestion($input){
        $obj = json_decode($input,true);

        $title     =   $this->cleanInput($obj["title"]);
        $question  =   $this->cleanInput($obj["question"]);
        $tags      =   $this->cleanInput($obj["tags"]);
        $user      =   $this->cleanInput($obj["user"]);
        $qid       =   $this->cleanInput($obj["q_id"]);

        // format the tags 
        $tags      = json_decode( html_entity_decode($tags), true);
        //covert the to single arrays
        $tags      = array_map(function($item) {  return $item["value"];  }, $tags);
        $tags      = implode("|", $tags);
        
        // check if the user already exist 
       if( !$this->exists($user,"users","st_email") )  die(json_encode(['msg'=>"Login to Edit Question"])); 


       // check to ensure no empty values were sent
       if(!empty( $title ) && !empty( $question )  && !empty( $tags ) && !empty( $user ) ){
        // get the id of the user asking the question
          $stID = $this->getUserByEmail($user)['st_id'];
             
                //  Store the user Question to the database  `q_title`, `question`,`st_id`,`q_tags`,`createdAt`
                $sql = "UPDATE `question` SET `q_title`= '$title', `question` = '$question', `q_tags`='$tags' WHERE `st_id`='$stID' AND `q_id` ='$qid' ";
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