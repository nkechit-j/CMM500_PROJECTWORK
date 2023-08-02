<?php
require_once('../db.php');

class GetOneQuestions{
    use Common;

    public function __construct(){ 
        $con         = $this->con();
        $question_id = trim( $_GET['q_id'] ) ; 
        $queryRow    = $con->query("SELECT * FROM `question` WHERE `q_id` ='$question_id'");
        if($queryRow){
            $row  = $queryRow->fetch_assoc() ;
            
        }
        echo json_encode( ['msg'=> $row ] );
    }


}

new GetOneQuestions();