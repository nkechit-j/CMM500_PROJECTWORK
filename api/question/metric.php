<?php

require_once('../db.php');

class Metric{
     use Common;
     private $message = [];

    public function __construct(){
            $this->qa_metric();
    }

    public function qa_metric(){  
        $con   = $this->con(); 
             
        //  Store the user Question to the database
        $sql_question   = "SELECT  DATE_FORMAT(createdAt, '%b') AS month,  COUNT(*) AS qty  FROM  question  GROUP BY month ORDER BY month ";
        $query_qu       = $con->query($sql_question);

        //  Store the user Question to the database
        $sql_answer   = "SELECT  DATE_FORMAT(createdAt, '%b') AS month,  COUNT(*) AS qty  FROM  answers  GROUP BY month ORDER BY month ";
        $query_an = $con->query($sql_answer);


        // check if the query succeeded 
        $counter = 0;
        if($query_qu){
            while($row = $query_qu->fetch_assoc()){
                $this->message['msg']['question'][$counter] = $row;
                $counter++;
            }
            
        }
        // check if the query succeeded 
        $counter2 = 0;
        if($query_an){
            while($row = $query_an->fetch_assoc()){
                $this->message['msg']['answer'][$counter2] = $row;
                $counter2++;
            }
            
        }
 
     // finally send a json response
     header('Content-Type: application/json');
     echo json_encode($this->message) ;

    }
    
}


new Metric();


?>