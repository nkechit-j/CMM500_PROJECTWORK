<?php
   session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BrainShare</title>
<!--  Inclue the boostrap CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"></head>

<!-- Include Bootstrap Icon CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<!-- custom CSS -->
<link rel="stylesheet" href="assets/css/main.css" />

<link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon" />
<body>

    <!--  Header - Naviagation bar -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand " href="#"> <img src="assets/img/logo.png" alt="logo" height="50px" width="180px"></a>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <div class="input-group mb-3">
                    <input type="search" class="form-control form-control-lg  search__input" placeholder="Search question" aria-label="question" aria-describedby="question_adon">
                    <span class="input-group-text" id="question_adon"> <i class="bi bi-search"></i> </span>
                  </div>
              </li> 
            </ul>


            <?php  if( !isset($_SESSION['_USER_EMAIL']) ){?>
              <div class="btn-group auth" role="group" aria-label="Button group with nested dropdown">
                <a href ="./create-account/" type="button" class="btn btn-primary btn-lg mx-2 create_account account">Create Account</a>
                <a href ="./login/" type="button" class="btn btn-primary btn-lg login account">Login</a> 
              </div>
              <?php  } ?>
   
              <div class="dropdown">
                <i class="bi bi-list fs-1" type="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                <ul class="dropdown-menu dropdown-menu-dark">
                  <li><a class="dropdown-item active" href="#">Profile</a></li>
                  <li><a class="dropdown-item" href="#">My Questions</a></li>
                  <li><a class="dropdown-item" href="#">My Answers</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
              </div>

          </div>
        </div>
      </nav>

<!--  show this section when the iser os logged in  -->
      <div class="home_to_auth_section">

        
     <div class="row">
      <div class="col-md-12 col-md text_container top d-flex justify-content-center align-items-center">

          <div class="inner__container m-4 pt-4">
                 <h1 class="h1 h1_welcome_title"> Welcome To BrainShare</h1>
                 <p class="welcome__message p-4">
                     BrainShare is an SOC online Q&A <br/>  platform for knowlegde-sharing.
                 </p>
          </div>

      </div>

      <!-- Call to ACTION --> 

              <div class="col-md-12 col-md text_container top2 d-flex justify-content-center align-items-center">
                  <div class="inner__container m-4 pt-4">
                      <a href="./soc_user/" class="btn btn-primary btn-lg w-100 mx-4">
                              <h1> Ask a Question</h1>
                      </a>
                  </div>
              </div>

          </div> 


      </div>
     

      <?php  if( !isset($_SESSION['_USER_EMAIL']) ){?>

     <div class="home_default">

      <div class="row">
        <div class="col-md-6 col-md image__slide_container">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="assets/img/book1.png" class="d-block w-100" alt="book1_slide_show" />
                  </div>
                  <div class="carousel-item">
                    <img src="assets/img/book2.png" class="d-block w-100" alt="book2_slide_show" />
                  </div>
                  <div class="carousel-item">
                    <img src="assets/img/book3.png" class="d-block w-100" alt="book3_slide_show" />
                  </div>
                </div>
              </div>
        </div>

        <div class="col-md-6 col-md text_container d-flex justify-content-center align-items-center">

            <div class="inner__container">
                   <h1 class="h1 h1_welcome_title"> Welcome To BrainShare</h1>
                   <p class="welcome__message">
                       BrainShare is an SOC online Q&A <br/>  platform for knowlegde-sharing.
                   </p>
            </div>

        </div>

        
    </div>


<!--  How it works section -->

    <div class="row my-4 mx-4">

        <div class="container how_it_works_section py-4">
            <div class="inner__how_it_works_section">
                <div class="row my-4 ">
                    <div class="col how_it_works_div">
                        <h1 class="h1 how_it_works">How it Works</h1>
                        <ul>
                            <li>Create Account</li>
                            <li>Login</li>
                            <li>Ask and/or Answer Question</li>
                        </ul>
            
                    </div>
            
                    <div class="col">
                          <div class="inner__how_it_works-metrics  d-flex justify-content-between align-items-center">
                                 <div class="cirle_container d-flex justify-content-center align-items-center">
                                        <div class="student_metric metric">
                                            <div class="inner__metric">
                                                 <h1 class="h1"> 10K</h1> 
                                            </div>
                                        </div>
                                        <h2>Students</h2>
                                 </div>
    
                                 <div class="cirle_container d-flex justify-content-center align-items-center">
                                    <div class="question_metric metric">
                                        <div class="inner__metric">
                                                <h1 class="h1"> 120K </h1> 
                                        </div>
                                    </div>
                                    <h2>Questions</h2>
                                </div>
    
                             <div class="cirle_container d-flex justify-content-center align-items-center">
                                <div class="answer_metric metric">
                                    <div class="inner__metric">
                                            <h1 class="h1"> 180K </h1> 
                                    </div>
                                </div>
                                <h2>Answers</h2>
                             </div>
                          </div> 
                    </div>
                </div>
            </div>
        </div>
        
    </div>


     </div>

     <?php  } ?>



   


    <div class="my_footer bg-light d-flex justify-content-center align-items-center p-4">
        <div class="footer_container">
            <p>
                <p class="footer_text"> Copyright  BrainShare <span class="year"></span></p>
             
                <span class="footer_developer">By Nkechi Taribo-Joseph </span>
            </p>
        </div>
    </div>

    
    <script src="assets/js/main.js"></script>
</body>
</html>