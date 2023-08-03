

<div class="inner__container"> 

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                <h2 class="text-center mb-4">Update Profile</h2>
                <form class="update_profile_form">
                    <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email"  name="email" value ="<?= $t->getUserById($_SESSION["_USER_ID"])['st_email']?>" placeholder="Enter your email" required />
                    </div>
                    <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username"  name="username" value ="<?= $t->getUserById($_SESSION["_USER_ID"])['st_username']?>" placeholder="Enter your username" required />
                    </div>
                    <input type="hidden" name="user_id" value="<?= $_SESSION["_USER_ID"] ?>">
                    <input type="hidden" name="user_type" value="user">
                    <div class="profile_result"></div>
                    <button type="submit" class="btn btn-primary my-4">Update</button>
                </form>
                </div>
            </div>
        </div>



        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                <h2 class="text-center mb-4">Update Password</h2>
                <form class="passwor_update_form"> 
                    <div class="form-group">
                    <label for="currentPassword">Current Password</label>
                    <input type="password" class="form-control" id="currentPassword"  name="currentPassword" placeholder="Enter your current password" required />
                    </div>
                    <div class="form-group">
                    <label for="newPassword">New Password</label>
                    <input type="password" class="form-control" id="newPassword" name="newPassword"  placeholder="Enter your new password" required />
                    </div>
                    <div class="form-group">
                    <label for="confirmNewPassword">Confirm New Password</label>
                    <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword" placeholder="Confirm your new password" required />
                    </div>
                    <input type="hidden" name="user_id" value="<?= $_SESSION["_USER_ID"] ?>">
                    <input type="hidden" name="user_type" value="user">
                    <div class="password_result"></div>
                    <button type="submit" class="btn btn-primary my-4">Update Password</button>
                </form>
                </div>
            </div>
         </div>

</div>
