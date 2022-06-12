<!DOCTYPE html>
<?php require_once("config.php");
if (isset($_SESSION["login_sess"]))
{
    header("location:account.php");
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Forget Password</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-4">
                <form action="forget_process.php" method="POST">
                    <div class="login__form">
                        <div class="form-group">
                            <img class="avatar img-fluid" src="img/maleavatar.png" alt="">
                            <?php if (isset($_GET['err'])){
                                $err=$_GET['err'];
                                echo '<p class="errmsge">No user Found. </p>';
                            }
                            //if server error
                            if(isset($_GET['servererr'])){
                                echo "<p class='errmsge'>The server failed to send the message. Please try again later.</p>";
                            }
                            //if other issue
                            
                            if (isset($_GET['sent'])){
                                echo "<p class='errmsge'>Something wen wrong.</p>";  
                            }
                            //if success |link sent
                            if (isset($_GET['sent'])){
                                echo "<div class='successmsg'> Reset Link has been sent to your registered email id.
                                Kindly check your mail. It can be taked 2 To 3 minutes to deliver on your email id. </div>";
                            }
                            ?>
                            <?php if(!isset($_GET['sent'])){ ?>
                            <label class="label_text"> Registered Email</label>
                            <input type="text" name="login_var" value="<?php if (!empty($err)){ echo $err;} ?>"
                                class="form-control">
                        </div>
                        <button type="submit" name="subforget" class="form_btn btn-group-lg">Send Link</button>
                        <?php } ?>
                    </div>
                </form>
                <br>
                <p>Have an Account? <a href="login.php">Login</a> </p>
                <p>Don't have an Account <a href="signup.php">Sign up</a></p>
            </div>
            <div class="col-sm-4">
            </div>

        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>

</html>