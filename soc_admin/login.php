<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainShare - Admin Login</title>
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
    <!--  Inclue the boostrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"></head>

    <!-- Include Bootstrap Icon CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../assets/css/main.css" />
 </head>
<body>

    <div class="row">

        <div class="col-md-5">
             <div class="img_container">
                <a href="./index.php">
                    <img src="../assets/img/logo.png" alt="logo"  />
                 </a>
             </div>
        </div>

        <div class="col-md-7 form_con">

            <div class="form_container">
                <h1> ADMIN LOGIN </h1>
                <form action="" class="container create__account">  

                      <div class="form-floating mb-3">
                        <input type="text" class="form-control form-control-lg" id="username"  name="username" placeholder="student Email/username">
                        <label for="username">Username/Email</label>
                      </div>

                      <div class="form-floating mb-3">
                        <input type="password" class="form-control form-control-lg" id="password1" name="password1" placeholder="Choose Password">
                        <label for="password1">Password</label>
                      </div>
                      <input type="hidden" name="login" value="admin">
 

                      <div class="form-floating"> 
                            <button type="submit" class="btn btn-primary btn-lg w-100">Login</button>
                      </div>
                       <div class="response_message"></div> 
                      

                </form>

            </div>

        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script>

      $(document).ready(function(){
         let result = $(".response_message");
         $(document).on("submit", ".create__account",function(evt){
              evt.preventDefault();
                          let formData = $(this).serialize(); 
                          console.log(formData);

                          $.ajax({
                              url:"../api/auth/login.php",
                              method:"post", 
                              data: formData, 
                              beforeSend:()=>{
                                result.html('<div class="text-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');
                                $(this).find('button[type=submit]').prop('disabled', true); 
                              },
                              success: (res,status)=>{
                                console.log(res);
                                let r = JSON.parse(res);
                                  if(r.msg =='success'){
                                    result.html('<div class ="alert alert-success"> Successful! </div>');
                                    setTimeout(function(event){ window.location.href="./"; },3000);
                                    localStorage.setItem("ACTIVE_USER",r.user);
                                  }else{ 
                                    result.html('<div class ="alert alert-danger">'+r.msg+'</div>'); 
                                    $(this).find('button[type=submit]').prop('disabled', false); 
                                }
                          },
                          error: function(error) { 
                              console.log(error); 
                        }
                  });
              }
          );
             

      });
    
    </script>
    
</body>
</html>