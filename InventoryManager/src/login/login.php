<?php
    include('registerNewUser_Modal.php');
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../styles/resetCss.css">
    <link rel="stylesheet" href="../../styles/styles.css">
    <link rel="stylesheet" href="../../styles/loginStyles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <title>Inventory Manager Login</title>
</head>

<body>
    <div class="login-container container-fluid">
        <!--Header-->
        <div class="row header">
            <h1 class="col-sm-12" align="center">MyFridge - Login</h1>
        </div>
        <div class="row center padding-top">
            <p class="col-sm-12">Please enter your login data</p>
        </div>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
