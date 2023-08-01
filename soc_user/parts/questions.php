
<div class="inner__container">
        <div class="container mt-4">
            <h3>Question List</h3>
               <?php  if(!isset($_GET['qd']) && !isset($_GET['q_id']) && ( empty($_GET['qd']) || empty($_GET['q_id']) )){ ?>
                <ul class="list-group"> 
                    <?php  $t->getQuestionById($_SESSION["_USER_ID"]); ?>
                </ul>
              <?php 
                }else{
                    $action = trim( $_GET['qd'] );
                    $qid    = intval( trim( $_GET['q_id'] ) );

                    require_once("../api/question/getquestion.php");
                    $gt   =  new GetAQuestions();
                    $gt->getquestion($qid,$_SESSION["_USER_ID"]);


                }

                ?>

        </div>

</div>

