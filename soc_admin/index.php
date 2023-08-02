<?php  

  session_start(); 
  require_once('../api/db.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BrainShare Admin</title>
<!--  Inclue the boostrap CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"></head>

<!-- Include Bootstrap Icon CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<!-- custom CSS -->
<link rel="stylesheet" href="../assets/css/main.css" />

<link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon" />


<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<!-- Link Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<body>

<div class="">
    <!-- Top Navigation Bar -->
    <nav class="navbar navbar-expand-md navbar-light bg-light">
      <a class="navbar-brand" href="/"> <img src="../assets/img/logo.png" alt="logo" height="50px" width="180px" /> </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Admin
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="?pg=profile">Profile</a></li> 
              <li><a class="dropdown-item" href="?pg=logout">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>

    <div class="row">
      <!-- Left Navigation Bar -->
      <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
        <div class="position-sticky inner_siderbar mt-4">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="?pg=home"> <i class="bi bi-house"></i> Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?pg=users"> <i class="bi bi-people"></i> Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?pg=questions"> <i class="bi bi-patch-question"></i> Questions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?pg=answers"> <i class="bi bi-lightbulb"></i> Answers</a>
            </li>
            <!-- Add more navigation items here -->
          </ul>
        </div>
      </nav>

       <!-- Main Content Area -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <!-- Add your main content here -->
        <div class="action_result"></div>
        <?php

            //check to ensure the Admin is Logged in
            if(!isset($_SESSION['_SOC_ADMIN_USER__'])){ 
                // Redirect user to login page
                header("location:login.php");

            }else{
                if(isset($_GET['pg']) && !empty($_GET['pg']) ){
                    $part = trim($_GET['pg']);
                    $realPart = $part.".php";
                    if(file_exists($realPart)){
                        require_once($realPart);
                    }else{
                        require_once('home.php');
                    }
                }else{
                    require_once('home.php');
                }
            }

        ?>
             
      </main>
    </div>
  </div>
  </div>
 



<script>


let action_result = $(".action_result");
        // disable_question

        $(document).on("click", ".del_question",function(evt){
            evt.preventDefault();

              if( confirm("Are you sure you want to delete this question ?") ){
                  let qid = $(this).attr('id').split("_")[1];
                  console.log(qid);
                  $.ajax({
                      url:"../api/question/delete.php",
                      method:"post", 
                      data: {id:qid,action_type:"q"}, 
                      beforeSend:()=>{
                          action_result.html('<div class="text-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>'); 
                      },
                      success: (res,status)=>{
                          console.log(res);
                          let r = JSON.parse(res);
                          if(r.msg =='success'){
                              action_result.html('<div class ="alert alert-success"> Successful! </div>');
                              setTimeout(()=>{ location.reload() },1000); 
                          }else{ 
                              action_result.html('<div class ="alert alert-danger">'+r.msg+'</div>');  
                          }
                    } 
                  });
              }

            }
        );



        $(document).on("click", ".disable_question",function(evt){
            evt.preventDefault();

              if( confirm("Are you sure you want to disable this question ?") ){
                  let qid = $(this).attr('id').split("_")[1];
                  $.ajax({
                      url:"../api/question/disable.php",
                      method:"post", 
                      data: {id:qid,action_type:"q"}, 
                      beforeSend:()=>{
                          action_result.html('<div class="text-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>'); 
                      },
                      success: (res,status)=>{
                          console.log(res);
                          let r = JSON.parse(res);
                          if(r.msg =='success'){
                              action_result.html('<div class ="alert alert-success"> Successful! </div>');
                              setTimeout(()=>{ location.reload() },1000); 
                          }else{ 
                              action_result.html('<div class ="alert alert-danger">'+r.msg+'</div>');  
                          }
                    } 
                  });
              }

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







        // for NSWERS

        
        $(document).on("click", ".del_answer",function(evt){
            evt.preventDefault();

              if( confirm("Are you sure you want to delete this question ?") ){
                  let qid = $(this).attr('id').split("_")[1];
                  console.log(qid);
                  $.ajax({
                      url:"../api/question/delete.php",
                      method:"post", 
                      data: {id:qid,action_type:"a"}, 
                      beforeSend:()=>{
                          action_result.html('<div class="text-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>'); 
                      },
                      success: (res,status)=>{
                          console.log(res);
                          let r = JSON.parse(res);
                          if(r.msg =='success'){
                              action_result.html('<div class ="alert alert-success"> Successful! </div>');
                              setTimeout(()=>{ location.reload() },1000); 
                          }else{ 
                              action_result.html('<div class ="alert alert-danger">'+r.msg+'</div>');  
                          }
                    } 
                  });
              }

            }
        );

        


        $(document).on("click", ".disable_answer",function(evt){
            evt.preventDefault();

              if( confirm("Are you sure you want to disable this question ?") ){
                  let qid = $(this).attr('id').split("_")[1];
                  $.ajax({
                      url:"../api/question/disable.php",
                      method:"post", 
                      data: {id:qid,action_type:"a"}, 
                      beforeSend:()=>{
                          action_result.html('<div class="text-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>'); 
                      },
                      success: (res,status)=>{
                          console.log(res);
                          let r = JSON.parse(res);
                          if(r.msg =='success'){
                              action_result.html('<div class ="alert alert-success"> Successful! </div>');
                              setTimeout(()=>{ location.reload() },1000); 
                          }else{ 
                              action_result.html('<div class ="alert alert-danger">'+r.msg+'</div>');  
                          }
                    } 
                  });
              }

            }
        );


</script>

</body>

</html>