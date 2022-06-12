<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Log In Page</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-4"> 
        </div>

        <div class="col-sm-4"> 
            <div class="login__form">
                <img class="avatar img-fluid" src="img/maleavatar.png" alt="">

                <?php
                if (isset($_GET['loginerror'])){
                  $loginerror=$_GET['loginerror'];
                } 
                if(!empty($loginerror)){ 
                  echo '<p class="errmsge">Invalid Login
                  credentials, Please Try Again..</p>';}?>
                
        <form action="login_process.php" method="POST">


  <div class="mb-3">
    <label for="label_text" class="form-label">Username or Email</label>
    <input type="email" name="login_var" value="<?php if(!empty($loginerror)){ echo $loginerror;} ?>" class="form-control">
    
  <div class="mb-3">
    <label for="label_text" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  
  <button type="submit" name="sublogin" class="form_btn">Login</button>
</form>
<p style="font: size 12px;text-align:center;margin-top: 10px; "><a class="hoveringblue" href="forgot-password.php">Forgot Password?</a></p>
<br>
<p>Don't have an account? <a href="signup.php">Sign up</a> </p>
</div>
        </div>

        <div class="col-sm-4"> 
        </div>

        <div class="col-sm-4"> 
        </div>
    </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>