<!-- This code is for the login page and permits the access to the registration modal -->

<html>

    <?php
        include('../common/login_header_session_start.php');
        include('login-register/registerNewUser_Modal.php');
    ?>

    <body>
        <div class="login-container container-fluid">

            <!-- Site header -->
            <div class="row header">
                <h1 class="col-sm-12" align="center">MyFridge - Login</h1>
            </div>

            <!-- Form header -->
            <div class="row center padding-top">
                <p class="col-sm-12">Please enter your login data</p>
            </div>

            <!-- Warning messages -->
            <?php
            if (isset($_GET['loginDenied'])) {
                if ($_GET['loginDenied'] == 'userUnknown') {
                    echo "  <div class='alert alert-danger' role='alert'>
                                            User does not exist!
                                        </div>";
                } else if ($_GET['loginDenied'] == 'wrongPassword') {
                    echo "  <div class='alert alert-danger' role='alert'>
                                            Wrong password!
                                        </div>";
                }
            }
            if (isset($_GET['registerSuccessful'])) {
                if ($_GET['registerSuccessful'] == 'false') {
                    echo "  <div class='alert alert-danger' role='alert'>
                                            Registration did not work. Please try again!
                                        </div>";
                }
            }
            ?>

            <!-- Login form -->
            <form method="POST" action="checkLogin.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-12 input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Username</span>
                        </div>
                        <input type="text" class="form-control" name="username" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Password</span>
                        </div>
                        <input type="password" class="form-control" name="password" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                    </div>
                </div>
                <button class="btn full-width margin-bottom button-login" type="submit" name="submit">Login</button>
                <div class="padding-bottom">
                    <a class="btn btn-info" role="button" data-toggle="modal" data-target="#exampleModalCenter">First time on our site? Click here!</a>
                </div>
            </form>
        </div>
    </body>

</html>
