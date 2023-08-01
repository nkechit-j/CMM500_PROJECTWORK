<?php
require_once('../db.php');

class GetAppQuestions{
    use Common;

    public function __construct(){
        $output = [];
        $query = $this->con()->query("SELECT * FROM `question`");
        if($query){
            $counter = 0;
            while($row  = $query->fetch_assoc() ){
                  $output[$counter]= $row ;
                  $counter++;
            }
            
        }
        echo json_encode( ['msg'=> $output ] );
    }


}

new GetAppQuestions();