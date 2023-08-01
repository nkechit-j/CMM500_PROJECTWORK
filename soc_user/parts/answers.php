
<div class="inner__container">
        <div class="container mt-4">
            <h3>Answers List</h3> 
              <?php  

                    // require_once("../api/question/getquestion.php");
                    // $gt   =  new GetAQuestions();
                    $t->getAnswersById($_SESSION["_USER_ID"]);

 

                ?>

        </div>

</div>

