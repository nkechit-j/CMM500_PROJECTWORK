
<div class="row q_section">
          <!-- this is where the queue of question will be loaded -->
        <div class="col-md-4 col-md question__list">
            
        </div>

        <!-- This is where each question loads and its comments -->
        <div class="col-md-8 col-md text_container d-flex justify-content-center align-items-center">

            <div class="inner__container"> 
                    <?php
                        if(isset($_GET['stid']) && isset($_GET['qid']) ){

                            if(!empty($_GET['stid']) && !empty($_GET['qid']) ){
                                $stid = intval( trim( $_GET['stid'] ) );
                                $qid  = intval( trim( $_GET['qid'] ) );
                                // Load the class of question
                                require_once('../api/db.php');
                                require_once("../api/question/getquestion.php");
                                $gt   =  new GetAQuestions();
                                $gt->getquestion($qid,$stid);


                                //  Add Your own comment/Answer
                                echo '<div class="container my-4 mx-2 bg-light bordered"><div class="col-md-12">
                                        <form class="comment_form"> 
                                              <div class="form-group">
                                                    <label for="comment"> Your Comment/Answer </label>
                                                    <textarea class="form-control" id="comment" name="comment" rows="5" required></textarea>
                                                </div> 
                                                <input type="hidden" name="user_email" value="'.$_SESSION["_USER_EMAIL"].'" /> 
                                                <input type="hidden" name="question_id" value="'.$qid.'" /> 
                                                <div class="comment_result"></div>
                                                <button type="submit" class="btn btn-primary my-4">Add Your Answer</button>
                                        </form>
                                    </div></div>';

                            }else{
                                echo '<p class="welcome__message">  This is not allowed here please !!! <br/> Do the right thing  </p>';
                            }

                        }else{
                            echo '<p class="welcome__message">
                                    No Question <br/>  Selected yet.
                                </p>';
                        }
                    ?>
            </div>

        </div>

        
    </div>