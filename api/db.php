<?php

trait Common{

    public $host = "localhost";
    public $user = "root";
    public $pass = "" ;
    public $db   = "brainshare";

    public function con(){
        $con = new mysqli($this->host,$this->user,$this->pass,$this->db);
        if ($con->connect_errno) die(" Connection not established");
        return $con ;
    }

    public function cleanInput($input){
        return trim( stripslashes( htmlspecialchars( $input) ) );
    }

// Return User Details as Associative array
public function getUserByEmail($email){
    $con        = $this->con();
    $queryRow   = $con->query("SELECT * FROM `users` WHERE `st_email` ='$email'")->fetch_assoc();
    return  $queryRow;
}

// Get User/member details by ID
public function getUserById($uid){
    $con        = $this->con();
    $queryRow   = $con->query("SELECT * FROM `users` WHERE `st_id` ='$uid'")->fetch_assoc();
    return  $queryRow;
}


// Get User/Question details by ID
public function getQuestionById($uid){
    $con        = $this->con();
    $queryRow   = $con->query("SELECT * FROM `question` WHERE `st_id` ='$uid'");
     while($row = $queryRow->fetch_assoc() ){
        echo '<li class="list-group-item my-1"> 
                    <p>'.$row['question'].' </p>
                <div class="btn-group bg-light">
                <a class="btn btn-primary mr-2" href="?u=questions&qd=edit&q_id='.$row['q_id'].'"  data-toggle="modal" data-target="#editModal1">Edit</a>
                <a class="btn btn-info" href="?u=questions&qd=del&q_id='.$row['q_id'].'"  data-toggle="modal" data-target="#deleteModal1">View</a>
                </div>
            </li>';
     }
}


public function getAnswersById($uid){
    $con        = $this->con();
    $queryRow   = $con->query("SELECT * FROM `answers` WHERE `st_id` ='$uid'");
     while($row = $queryRow->fetch_assoc() ){
        echo '<div class="my-1 card px-4 py-2"> 
                    <p>'.$row['answer'].' </p>
                    <div class="btn-group bg-light d-flex justify-content-between px-4 py-2">
                        <span> Asked By: <a class="text-primary mr-2">'.$this->getUserById($uid)['st_username'].'</a></span>
                        <span> On: <a class="text-info">'.$row['createdAt'].'</a> </sapn>
                    </div>
            </div>';
     }
}







public function totalUsers(){
    $con        = $this->con();       
    $query      = $con->query("SELECT * FROM `users`");
    $totalCount = $query->num_rows;
    return ($totalCount>1000) ? number_format(($totalCount/1000),2,".",',').'K' : number_format($totalCount,0);
}


public function totalQuestions(){
    $con        = $this->con();       
    $query      = $con->query("SELECT * FROM `question`");
    $totalCount = $query->num_rows;
    return ($totalCount>1000) ? number_format(($totalCount/1000),2,".",',').'K' : number_format($totalCount,0);
}


public function totalAnswers(){
    $con        = $this->con();       
    $query      = $con->query("SELECT * FROM `answers`");
    $totalCount = $query->num_rows;
    return ($totalCount>1000) ? number_format(($totalCount/1000),2,".",',').'K' : number_format($totalCount,0);
}






    public function exists($val,$table,$col){
        $con     = $this->con();
        if(!empty($val)){
        $sql       = "SELECT * FROM `".$table."` WHERE `".$col."`=?";
        $stmt      = $con->prepare($sql);
        $stmt->bind_param("s",$val);
        $exec      = $stmt->execute();
        if($exec){
        $result   = $stmt->get_result();
        $num_rows = $result->num_rows;
        if($num_rows>0){
            return true;
        }else{
            return false;
        }
        //   $stmt->close();
        }
      }
    }
  
}

class T {
    use Common;
}

$t = new T();



?>