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
<link rel="stylesheet" href="../assets/css/main.css" />

<link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon" />
<body>

    <!--  Header - Naviagation bar -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand " href="#"> <img src="../assets/img/logo.png" alt="logo" height="50px" width="180px"></a>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <div class="input-group mb-3">
                    <input type="search" class="form-control form-control-lg  search__input" placeholder="Search question" aria-label="question" aria-describedby="question_adon">
                    <span class="input-group-text" id="question_adon"> <i class="bi bi-search"></i> </span>
                  </div>
              </li> 

              <li> <a href ="#" type="button" class="btn btn-primary btn-lg mx-2 create_account account"  data-bs-toggle="offcanvas" data-bs-target="#Questions" aria-controls="staticBackdrop">Ask a Question</a></li>
            </ul>  
            
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

     


    <div class="row">
        <div class="col-md-4 col-md question__list">
               <div class="inner_questions_list mx-2">

                  <div class="card my-1 w-100"> 
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">
                                With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content...
                            </p>
                            
                        </div>
                        <div class="card-footer text-body-secondary d-flex justify-content-between align-items-center">
                            
                            <div class="tags">
                                  <span>Java|BigO|Data Structures</span>
                            </div>

                            <div class="author_and_date">
                                  <span class="author">Joy John </span>
                                  <span class="datetime"> 27/04/2023</span>
                            </div>
                        
                        </div>
                  </div>
                     
                  <div class="card my-1 w-100"> 
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">
                                With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content...
                            </p>
                            
                        </div>
                        <div class="card-footer text-body-secondary d-flex justify-content-between align-items-center">
                            
                            <div class="tags">
                                  <span>Java|BigO|Data Structures</span>
                            </div>

                            <div class="author_and_date">
                                  <span class="author">Joy John </span>
                                  <span class="datetime"> 27/04/2023</span>
                            </div>
                        
                        </div>
                  </div>
                     
                  <div class="card my-1 w-100"> 
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">
                                With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content...
                            </p>
                            
                        </div>
                        <div class="card-footer text-body-secondary d-flex justify-content-between align-items-center">
                            
                            <div class="tags">
                                  <span>Java|BigO|Data Structures</span>
                            </div>

                            <div class="author_and_date">
                                  <span class="author">Joy John </span>
                                  <span class="datetime"> 27/04/2023</span>
                            </div>
                        
                        </div>
                  </div>
                     
                  <div class="card my-1 w-100"> 
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">
                                With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content...
                            </p>
                            
                        </div>
                        <div class="card-footer text-body-secondary d-flex justify-content-between align-items-center">
                            
                            <div class="tags">
                                  <span>Java|BigO|Data Structures</span>
                            </div>

                            <div class="author_and_date">
                                  <span class="author">Joy John </span>
                                  <span class="datetime"> 27/04/2023</span>
                            </div>
                        
                        </div>
                  </div>
                     
                  <div class="card my-1 w-100"> 
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">
                                With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content.
                                With supporting text below as a natural lead-in to additional content...
                            </p>
                            
                        </div>
                        <div class="card-footer text-body-secondary d-flex justify-content-between align-items-center">
                            
                            <div class="tags">
                                  <span>Java|BigO|Data Structures</span>
                            </div>

                            <div class="author_and_date">
                                  <span class="author">Joy John </span>
                                  <span class="datetime"> 27/04/2023</span>
                            </div>
                        
                        </div>
                  </div>
                     
               

               </div>
        </div>

        <div class="col-md-8 col-md text_container d-flex justify-content-center align-items-center">

            <div class="inner__container"> 
                   <p class="welcome__message">
                       No Question <br/>  Selected yet.
                   </p>
            </div>

        </div>

        
    </div>




    <!-- off canvas for Asking Questions -->
      <div class="offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="Questions" aria-labelledby="staticBackdropLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="staticBackdropLabel">Offcanvas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <div>
            I will not close if you click outside of me.
          </div>
        </div>
      </div>


    <div class="my_footer bg-light d-flex justify-content-center align-items-center p-4">
        <div class="footer_container">
            <p>
                <p class="footer_text"> Copyright  BrainShare <span class="year"></span></p>
             
                <span class="footer_developer">By Nkechi Taribo-Joseph </span>
            </p>
        </div>
    </div>

    <script src="../assets/js/main.js"></script>
</body>
</html>