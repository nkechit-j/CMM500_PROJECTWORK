<?php
// require_once('../db.php');

class GetAQuestions{
    use Common; 
    
    public function getquestion($q_id,$st_id){
        $output  = '';
        $query   = $this->con()->query("SELECT * FROM `question` WHERE `q_id` = '$q_id' AND `st_id` = '$st_id'");
        if($query){ 
            $row  = $query->fetch_assoc(); 
            $output.='<div class="inner_questions_list mx-2">    <div class="card my-1 w-100">   <div class="card-body">
                                <h5 class="card-title">'.$row['q_title'].'</h5>  <p class="card-text">'.$row['question'].'</p> 
                                </div>
                                 <div class="card-footer text-body-secondary d-flex justify-content-between align-items-center text-small">                             
                                    <div class="tags">  <span>'.$row['q_tags'].'</span>  </div>
                                    <div class="author_and_date"><span class="author">'.$this->getUserById($st_id)['st_username'].' &nbsp; &nbsp; </span><span class="datetime">'.$row['createdAt'].'</span>
                                </div>  </div> </div></div>';

                                
        }

        // check if there is any comment/answers to this question
        $query   = $this->con()->query("SELECT * FROM `answers` WHERE `q_id` = '$q_id'");
        $output2 = '<div class="container my-4 mx-2 bg-light bordered">
                        <!-- Comments Section -->
                        <div class="row">  <h4 class="m-4 card-footer"> Answers/Comments </h4>';
        if( $query &&  $query->num_rows > 0){

            while( $row = $query->fetch_assoc() ){
                   $output2.='<div class="col-md-12">
                                <!-- Single Comment -->
                                 <div class="media mb-3 card px-4 py-4">
                                    <div class="d-flex justify-content-between align-items-center"> 
                                        <h6 class="mt-0">'.$row['createdAt'].'</h6>
                                        <h6 class="mt-0">'.$this->getUserById($row['st_id'])['st_username'].'</h6>
                                    </div>
                                    <div class="media-body"> <p>'.$row['answer'].'.</p>  </div>
                                </div>
                             </div>';
            }

        }else{
            $output2.='<div class="col-md-12"> <h5 class="mt-0"> No Comment/Answer Yet </h5> </div>';
        }

        $output2.'</div> </div>';


        echo  $output.$output2 ;
        
    }


}
