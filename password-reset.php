<!DOCTYPE html>
<?php
require_once('config.php');
if(isset($_SESSION["login_sess"]))
{
    header("location:account.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Password-reset</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-4">
                <?php
                if(isset($_GET['$token']))
                {
                    $token= $_GET['token'];
                } 
                //form for submit
                if(isset($_POST['sub_set'])){
                    extract($_POST);
                    if($password ==''){
                        $error[]='Please enter the password.';

                    }
                    if($passwordConfirm==''){
                        $error[]='PLease confirm the password. ';
                    }
                    if($password!=$passwordConfirm){
                        $error[]='Password does not the match.';
                    }
                    if(strlen($password)<5){
                        $error[]='Password should be atlast of 6 characters';
                    }
                    if(strlen($password)>50){
                        $error[]='Password should be less than 50 characters';
                    }
                    $fetchresultok=mysqli_query($dbc,"SELECT email FROM pass_reset WHERE token='$token'");
                    if($res=mysqli_fetch_array($fetchresultok))
                    {
                        $email=$res['email'];
                    }
                    if(isset($email)!=''){
                        $emailtok=$email;
                    }
                    else
                    {
                        $error[]='Link has been Expired or something is missing.';
                        $hide=1;
                    }
                    if(isset($email)){
                        $options=array("cost"=>4);
                        $password=password_hash($password,PASSWORD_BCRYPT,$options);
                        $resultresetpass=mysqli_query($dbc, "UPDATE uses SET password='$password' WHERE email='$emailtok'");
                        if($resetresetpass)
                        {
                            $success="div class='sucessmsg'><span style='font-size:100px;'>&#9989;</span> <br> 
                            Your Password has been updated successfully..<br> <a href='login.php' style='color=#fff;'>Login Here...</a> </div>";

                            $resultdel=mysqli_query($dbc,"DELETE FROM pass_reset WHERE token='$token'");
                            $hide=1;
                        }
                    }
                    }
                ?>
                <div class="login__form">
                    <form action="" method="POST">
                        <div class="form-group">
                        <img class="avatar img-fluid" src="img/maleavatar.png" alt="">
                        <?php
                        if(isset($error)){
                            foreach($error as $error){
                                echo'<div class="errmsge">'.$error.'</div><br>';
                            }
                        } 
                        if(isset($success)){
                            echo $success;
                        }
                        ?>
                        <?php if(!isset($hide)){ ?>
                        <label class="label_text" for="">Password</label>
                        <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="label_text" for="">Confirm Password </label>
                            <input type="password" name="passwordConfirm" class="form-control">
                        </div>
                        <button type="submit" name="sub_set" class="form_btn">Reset Password</button>
                        <?php }?>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">

            </div>
        </div>
    </div>
    
</body>
</html>