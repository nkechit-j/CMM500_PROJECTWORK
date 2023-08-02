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
// Get User/member details by ID

public function getAdminById($uid){
    $con        = $this->con();
    $queryRow   = $con->query("SELECT * FROM `admin` WHERE `admin_id` ='$uid'")->fetch_assoc();
    return  $queryRow;
}

public function getQById($qid){
    $con        = $this->con();
    $queryRow   = $con->query("SELECT * FROM `question` WHERE `q_id` ='$qid'")->fetch_assoc();
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
                <a class="btn btn-primary edit_question mr-2" href="questions_'.$row['q_id'].'" data-bs-toggle="offcanvas" data-bs-target="#edit_Questions" aria-controls="staticBackdrop">Edit</a>
                <a class="btn btn-info view_question" href="?u=questions&qd=del&q_id='.$row['q_id'].'"  data-toggle="modal" data-target="#deleteModal1">View</a>
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

// Get all Users
public function getAll(){
    $con        = $this->con();
    $queryRow   = $con->query("SELECT * FROM `users`");
    $counter = 0;
     while($row = $queryRow->fetch_assoc() ){
        echo ' <tr>
                <td>'.( ++$counter ).'</td>
                <td>'.$row['st_username'].'</td>
                <td>'.$row['st_email'].'</td> 
                <td> 
                <button class="btn btn-danger btn-sm"    id="user_del_'.$row['st_id'].'" data-toggle="modal" data-target="#deleteModal1">Delete</button>
                <button class="btn btn-secondary btn-sm" id="user_dis_'.$row['st_id'].'  data-toggle="modal" data-target="#disableModal1">Disable</button>
                </td>
            </tr>';
     }
}

// for Admin
public function getAllQuestions(){
    $con        = $this->con();
    $queryRow   = $con->query("SELECT * FROM `question`");
    $counter = 0;
     while($row = $queryRow->fetch_assoc() ){
        echo ' <tr>
                <td>'.( ++$counter ).'</td>
                <td>'.$row['q_title'].'</td>
                <td>'.$this->getUserById($row['st_id'])['st_username'].'</td> 
                <td>'.$this->totalAnswersTo($row['q_id']).'</td>   
                <td>'.$row['createdAt'].'</td>   
                <td> 
                <button class="btn btn-danger btn-sm"    id="user_del_'.$row['q_id'].'" data-toggle="modal" data-target="#deleteModal1">Delete</button>
                <button class="btn btn-secondary btn-sm" id="user_dis_'.$row['q_id'].'  data-toggle="modal" data-target="#disableModal1">Disable</button>
                </td>
            </tr>';
     }
}
public function getAllAnswers(){
    $con        = $this->con();
    $queryRow   = $con->query("SELECT * FROM `answers`");
    $counter = 0;
     while($row = $queryRow->fetch_assoc() ){
        echo '<tr>
                <td>'.( ++$counter ).'</td>
                <td>'.$this->getQById($row['q_id'])['question'].'</td>
                <td>'. $this->getUserById( $this->getQById($row['st_id'])['st_id'] )['st_username'] .'</td> 
                <td>'.$this->getUserById($row['st_id'])['st_username'].'</td>   
                <td>'.$row['createdAt'].'</td>   
                <td> 
                <button class="btn btn-danger btn-sm"    id="user_del_'.$row['ans_id'].'" data-toggle="modal" data-target="#deleteModal1">Delete</button>
                <button class="btn btn-secondary btn-sm" id="user_dis_'.$row['ans_id'].'  data-toggle="modal" data-target="#disableModal1">Disable</button>
                </td>
            </tr>';
     }
}
 



public function totalAnswersTo($qid){
    $con        = $this->con();       
    $query      = $con->query("SELECT * FROM `question` WHERE `q_id`='$qid'");
    $totalCount = $query->num_rows;
    return ($totalCount>1000) ? number_format(($totalCount/1000),2,".",',').'K' : number_format($totalCount,0);
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





    public function showSearchResult($search_str){
        $con        = $this->con(); 
        $queryRow   = $con->query("SELECT *  FROM `question`  WHERE `question` LIKE '%".$search_str."%'"); 
        $output = ' <div class="list-group inner__container">';
         while($row = $queryRow->fetch_assoc() ){
            $output.= '<a href="?stid='.$row['st_id'].'&qid='.$row['q_id'].'" class="list-group-item list-group-item-action my-1">
                        <h5 class="mb-1">'.$row['q_title'].'</h5>
                        <p class="mb-1">'.$row['question'].'</p>
                        <small>Posted on: '.$row['createdAt'].'</small>
                    </a>';
         }
         $output.='</div>';

         echo  $output;
    }
  
}

class T {
    use Common;
}

$t = new T();



?>