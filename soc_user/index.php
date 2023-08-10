<?php  
require_once('../api/db.php');

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BrainShare</title>
        <!--  Inclue the boostrap CSS CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <!-- Include Bootstrap Icon CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
            
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

        <!-- custom CSS -->
        <link rel="stylesheet" href="../assets/css/main.css" />

        <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon" />
</head>
<body>

    <!--  Header - Naviagation bar -->
    <header class="">
            <nav class="navbar navbar-expand-lg bg-light fixed-top">
                <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand " href="./"> <img src="../assets/img/logo.png" alt="logo" height="50px" width="180px"></a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <div class="input-group mb-3"> 
                            <input type="search" class="form-control form-control-lg  search__input" name="question" placeholder="Search question" aria-label="question" aria-describedby="question_adon">
                            <span class="input-group-text" id="question_adon" type="submit"> <i class="bi bi-search"></i> </span>                           
                        </div>
                    </li> 

                    <li> <a href ="#" type="button" class="btn btn-primary btn-lg mx-2 create_account account"  data-bs-toggle="offcanvas" data-bs-target="#Questions" aria-controls="staticBackdrop">Ask a Question</a></li>
                    </ul>  
                    
                    <div class="dropdown mx-4">
                        <i class="bi bi-list fs-1 mx-4" type="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                        <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item active" href="?u=profile">Profile</a></li>
                        <li><a class="dropdown-item" href="?u=questions">My Questions</a></li>
                        <li><a class="dropdown-item" href="?u=answers">My Answers</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="?u=logout">Logout</a></li>
                        </ul>
                    </div>

                </div>
                </div>
            </nav>

    </header>

     

    <?php

        if(isset($_GET['s']) && !empty($_GET['s']) ){
              $t->showSearchResult( trim($_GET['s']) );  
        }else{

            if(isset($_GET['u']) && !empty($_GET['u']) ){
                $part = trim($_GET['u']);
                $realPart = "parts/".$part.".php";
                if(file_exists($realPart)){
                    require_once($realPart);
                }else{
                    require_once('parts/home.php');
                }
            }else{
                require_once('parts/home.php');
            }

        }


     ?>




    <!-- off canvas for Asking Questions bg-light  p-4-->
    <div class="offcanvas offcanvas-end w-50 bg-grey" data-bs-backdrop="static" tabindex="-1" id="Questions" aria-labelledby="staticBackdropLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="staticBackdropLabel">Asking Question</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
          <div class="offcanvas-body p-0 bg-light">
            <div class="row">
            <div class="col-md-12 form_con">
                    <div class="form_container"> 
                        <form action="" class="container my-4 question_form">  

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control w-100 form-control-lg" id="title" name="title" placeholder="title">
                                <label for="title">Title</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control h-50" rows="10" placeholder="type your question here" id="ques" name="question"></textarea>
                                <label for="ques">Question</label>
                            </div>

                            <div class="form-row mb-3">
                                <input type="text" class="form-control w-100 p-2" id="tags" name="tags" placeholder="Choose tags">
                                <!-- <label for="tags">Tags</label> -->
                            </div>
                            <input type="hidden" name="user" id ="user" value="<?=$_SESSION["_USER_EMAIL"]?>">
                           

                            <div class="result"></div>
                            <div class="form-floating"> 
                                    <button type="submit" class="btn btn-primary w-100">Submit Question</button>
                            </div>                         

                        </form>

                    </div>

                    </div>
            </div>
            </div>
      </div>




    <!-- off canvas for Editing  Questions bg-light  p-4-->
    <div class="offcanvas offcanvas-end w-50 bg-grey" data-bs-backdrop="static" tabindex="-1" id="edit_Questions" aria-labelledby="staticBackdropLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="staticBackdropLabel">Editing  Question</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
          <div class="offcanvas-body p-0 bg-light">
            <div class="row">
            <div class="col-md-12 form_con">
                    <div class="form_container"> 
                        <form action="" class="container my-4 edit_question_form">  

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control w-100 form-control-lg" id="edit_title" name="title" placeholder="title">
                                <label for="title">Title</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control h-50" rows="10" placeholder="type your question here" id="edit_ques" name="question"></textarea>
                                <label for="ques">Question</label>
                            </div>

                            <div class="form-row mb-3">
                                <input type="text" class="form-control w-100 p-2" id="edit_tags" name="tags" placeholder="Choose tags">
                                <!-- <label for="tags">Tags</label> -->
                            </div>
                            <input type="hidden" name="user" id ="user" value="<?=$_SESSION["_USER_EMAIL"]?>">
                            <input type="hidden" name="action" id ="action" value="edit"> 

                            <div class="result"></div>
                            <div class="form-floating"> 
                                    <button type="submit" class="btn btn-primary w-100">Submit Edit</button>
                            </div>                         

                        </form>

                    </div>

                    </div>
            </div>
            </div>
      </div>


    <div class="my_footer fixed-bottom bg-light">
        <div class="footer_container">
            <div class="text-center">
                <p class="footer_text"> Copyright  BrainShare <span class="year"></span></p> 
                <p class="footer_developer">By Nkechi Taribo-Joseph  </p> 
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify@3.1.0/dist/tagify.polyfills.min.js"></script>

    <script>
       // The DOM element you wish to replace with Tagify
        var input = document.querySelectorAll('input[name=tags]');
        // initialize Tagify on the above input node reference
        for (let i of input){
            new Tagify(i,{
                    whitelist: ["Object-Oriented Programming (Java)","Software Project Engineering","Data Warehousing","Data Management", "Data Mining Techniques" ,"Intranet Systems Development ", "IT Infrastructure and Administration(Python)","Data Visualisation"],
                    dropdown: {
                        position: "input",
                        enabled : 0 // always opens dropdown when input gets focus
                    }
                });
        }



  </script>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        // hadle Question submission
        let result = $(".result");
        $(document).on("submit", "form.question_form",function(evt){
            evt.preventDefault();
                        let formData     = $(this).serialize(); 
                        let unserialized = Object.fromEntries(new URLSearchParams(formData)); 
                        console.log( unserialized );  
                        $.ajax({
                            url:"../api/question/ask.php",
                            method:"post", 
                            data: JSON.stringify(unserialized), 
                            beforeSend:()=>{
                                result.html('<div class="text-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');
                                $(this).find('button[type=submit]').prop('disabled', true); 
                            },
                            success: (res,status)=>{
                                console.log(res);
                                let r = JSON.parse(res);
                                if(r.msg =='success'){
                                    result.html('<div class ="alert alert-success"> Successful! </div>');
                                    setTimeout(()=>{ location.reload() },2000);
                                }else{ 
                                    result.html('<div class ="alert alert-danger">'+r.msg+'</div>'); 
                                    $(this).find('button[type=submit]').prop('disabled', false); 
                                }
                        } 
                });
            }
        );


        // Adding Comment comment_result
        let comment_result = $(".comment_result");
        $(document).on("submit", "form.comment_form",function(evt){
            evt.preventDefault();
                        let formData     = $(this).serialize();  
                $.ajax({
                    url:"../api/question/answer.php",
                    method:"post", 
                    data: formData, 
                    beforeSend:()=>{
                        comment_result.html('<div class="text-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');
                        $(this).find('button[type=submit]').prop('disabled', true); 
                    },
                    success: (res,status)=>{
                        console.log(res);
                        let r = JSON.parse(res);
                        if(r.msg =='success'){
                            comment_result.html('<div class ="alert alert-success"> Successful! </div>');
                            setTimeout(()=>{ location.reload() },2000);
                        }else{ 
                            comment_result.html('<div class ="alert alert-danger">'+r.msg+'</div>'); 
                            $(this).find('button[type=submit]').prop('disabled', false); 
                        }
                   } 
                });
            }
        );




                // Updating profile
                let profile_result = $(".profile_result");
        $(document).on("submit", "form.update_profile_form",function(evt){
            evt.preventDefault();
                let formData     = $(this).serialize();  
                $.ajax({
                    url:"../api/profile/updateprofile.php",
                    method:"post", 
                    data: formData, 
                    beforeSend:()=>{
                        profile_result.html('<div class="text-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');
                        $(this).find('button[type=submit]').prop('disabled', true); 
                    },
                    success: (res,status)=>{
                        console.log(res);
                        let r = JSON.parse(res);
                        if(r.msg =='success'){
                            profile_result.html('<div class ="alert alert-success"> Successful! </div>');
                            setTimeout(()=>{ location.reload() },1000);
                            $(this).find('button[type=submit]').prop('disabled', false); 
                        }else{ 
                            profile_result.html('<div class ="alert alert-danger">'+r.msg+'</div>'); 
                            $(this).find('button[type=submit]').prop('disabled', false); 
                        }
                   } 
                });
            }
        );




        // updating password  

        let password_result = $(".password_result");
        $(document).on("submit", "form.passwor_update_form",function(evt){
            evt.preventDefault();
            let formData     = $(this).serialize();  
                $.ajax({
                    url:"../api/profile/changepassword.php",
                    method:"post", 
                    data: formData, 
                    beforeSend:()=>{
                        password_result.html('<div class="text-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');
                        $(this).find('button[type=submit]').prop('disabled', true); 
                    },
                    success: (res,status)=>{
                        console.log(res);
                        let r = JSON.parse(res);
                        if(r.msg =='success'){
                            password_result.html('<div class ="alert alert-success"> Successful! </div>');
                            setTimeout(()=>{ location.reload() },1000);
                            $(this).find('button[type=submit]').prop('disabled', false); 
                        }else{ 
                            password_result.html('<div class ="alert alert-danger">'+r.msg+'</div>'); 
                            $(this).find('button[type=submit]').prop('disabled', false); 
                        }
                   } 
                });
            }
        );

        function truncateString(str, maxLength) {
            return str.length > maxLength ? str.slice(0, maxLength) + "..." : str;
         }

        // get list of all questions
        let output  =$(".question__list");
        fetch('../api/question/all_questions.php').then(response => {
                if (!response.ok) {  throw new Error('Network response was not ok');   }
                   return response.json(); })
                    .then(data => {
                    // Use the data returned from the API 
                    for(let question of data.msg) {
                        output.append(` <div class="inner_questions_list mx-2">   
                                        <div class="card my-1 w-100" id ="question_${question.q_id}" name="student_${question.st_id}"> 
                                            <div class="card-body">
                                                <h5 class="card-title">${question.q_title}</h5>
                                                <p class="card-text">${truncateString(question.question,90)} </p> 
                                            </div>
                                            <div class="card-footer text-body-secondary d-flex justify-content-between align-items-center text-small">                             
                                                <div class="tags">  <span>${question.q_tags}</span>  </div>
                                                <div class="author_and_date"><span class="author">  </span>  <span class="datetime">${question.createdAt}</span>
                                                </div>
                                            
                                            </div>
                                        </div>
                                            
                                    </div>`);
                    } 
                
                console.log(data.msg); 
            })
            .catch(error => {
                // Handle any errors that occurred during the fetch request
                console.error('Error fetching data:', error);
            });


            // when each of the question is clicked
            $(document).on('click','.card',function(evt){
                let student_id  = $(this).attr("name")
                let question_id = $(this).attr("id");
                location.assign('?stid='+student_id.split("_")[1]+'&qid='+question_id.split("_")[1]);
            }); 
            
            //when the seacrh bar button is  clicked search__input

            $(document).on('click','#question_adon',function(evt){
                let seacrh  = $(".search__input").val();
                location.assign('?s='+seacrh);
            });


            //When the Edit button is cliked
            $(document).on('click','.edit_question',function(evt){
                let qu_id  = $(this).attr('href').split('_')[1]; 
                $.ajax({
                    url:"../api/question/one_question.php",
                    method:"GET",
                    data:{q_id:qu_id},
                    success:(res)=>{
                        console.log(res);
                        let r = JSON.parse(res);
                        console.log(r);
                         $("#edit_title").val(r.msg.q_title);
                         $("#edit_ques").val(r.msg.question);
                         $("#edit_tags").val(r.msg.q_tags.split("|").join(",")); 
                        
                    }
                });

                        // hadle Question submission
                    let result = $(".result");
                    $(document).on("submit", "form.edit_question_form",function(evt){
                        evt.preventDefault();
                                    let formData     = $(this).serialize(); 
                                    let unserialized = Object.fromEntries(new URLSearchParams(formData)); 
                                    unserialized.q_id = qu_id;  // Adding the question ID to the unserlai=zed form data
                                    console.log( unserialized );  
                                    
                                    $.ajax({
                                        url:"../api/question/update.php",
                                        method:"post", 
                                        data: JSON.stringify(unserialized), 
                                        beforeSend:()=>{
                                            result.html('<div class="text-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');
                                            $(this).find('button[type=submit]').prop('disabled', true); 
                                        },
                                        success: (res,status)=>{
                                            console.log(res);
                                            let r = JSON.parse(res);
                                            if(r.msg =='success'){
                                                result.html('<div class ="alert alert-success"> Successful! </div>');
                                                setTimeout(()=>{ location.reload() },2000);
                                            }else{ 
                                                result.html('<div class ="alert alert-danger">'+r.msg+'</div>'); 
                                                $(this).find('button[type=submit]').prop('disabled', false); 
                                            }
                                    } 
                            });
                        }
                    );
            });


    });
</script>

    <script src="../assets/js/main.js"></script>
</body>
</html>