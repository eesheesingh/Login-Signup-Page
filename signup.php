<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Sign Up Page</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <img class="avatar img-fluid" src="img/maleavatar.png" alt="img">
            </div>

            <div class="col-sm-4">

            </div>
        </div>


        <div class="row">

            <?php 
        if(isset($_POST['signup']))
        {
            extract($_POST);
            if(strlen($firstname)<3)
            {
                $error[]='Please enter First Name using 3 characters atleast';
            }

            if(strlen($firstname)>20)
            { //max
                $error[]='Maximum Legnth of characters not more than 20 ';
            }
            if(!preg_match("/^[A-Za-z _]*[A-za-z ]+[A-za-z _]*$/",$firstname)){
                $error[]='Invalid Entry First Name. Please enter Letters without any Digital or special Symbols like(1,2,3#,$,%,&,*,!,~,`,^,-,)';
            }

            if(strlen($lastname)<5)
            {
                $error[]='Please enter Last Name using 3 characters atleast';
            }

            if(strlen($lastname)>20)
            { //max
                $error[]='Maximum Legnth of characters not more than 20 ';
            }
            if(!preg_match("/^[A-Za-z _]*[A-za-z ]+[A-za-z _]*$/",$lastname)){
                $error[]='Invalid Entry First Name. Please enter Letters without any Digital or special Symbols like(1,2,3#,$,%,&,*,!,~,`,^,-,)';
            }


            if(strlen($username)<3)
            {
                $error[]='Please enter username using 3 characters atleast';
            }

            if(strlen($username)>50)
            { //max
                $error[]='Maximum Legnth of characters not more than 50 ';
            }
            if(!preg_match("/^^[^0-9][a-z0-9]+([_-]?[a-z0-9])*$/",$username)){
                $error[]='Invalid entry for Username. Enter lowercase letters without any 
                space and no number at the start- Eg - myusername, heyimroy or myusername123';
            }


            if($passwordConfirm =='')
            {
                $error[]='Please Confirm the Password';
            }
            if($password!=$passwordConfirm){
                $error[]='Password does not match';
            }
            if(strlen($password)<5){
                $error[]='The password is 6 characters long';
            }
            if(strlen($password)>20){
                $error[]='Password contains more than 20 characters';
            }


            $sql="select * from users where (username='$username' or email='$email');";
            $res=mysqli_query($dbc,$sql);
            if (mysqli_num_rows($res) > 0){
                $row=mysqli_fetch_assoc($res);

                if($username==$row['username'])
                {
                    $error[]='Username already exists';
                }
                if($email==$row['email'])
                {
                    $error[]='Email already exists';
                }
            }

            if(!isset($error)){
                $date=date('Y-m-d');
                $options=array("cost"=>4);
                $password=password_hash($password,PASSWORD_BCRYPT,$options);

                $result= mysqli_query($dbc,"INSERT into users 
                values ('','$firstname','$lastname','$username','$email','$password','$date') ");

                if($result)
                {
                    $done=2;
                }
                else{
                    $error[]='Failed : Something went wrong';
                }
            }
        }
        ?>

            <div class="col-sm-4">

                <?php
            if(isset($error))
            {
                foreach($error as $error)
                {
                    echo '<p class="errmsge">&#x26A0;'.$error.'</p>';
                }
            }
            ?>

            </div>

            <div class="col-sm-4">

                <?php if(isset($done))
                { ?>
                <div class="successmsg"><span style="font-size: 100px;">&#9989;</span> <br>
            You have Registered successfully. <br><a href="login.php" style="color: #fff;">Login Here...</a> </div>
            <?php } else { ?>
                <div class="sign_form">
                    <form action="" method="POST">
                        <div class="form-group">

                            <label class="label_text">First Name</label>
                            <input type="text" class="form-control" name="firstname" value="<?php if(isset($error)) { echo $firstname;}?>" required="">
                        </div>

                        <div class="form-group">
                            <label class="label_text">Last Name </label>
                            <input type="text" class="form-control" name="lastname" value="<?php if(isset($error)) { echo $lastname;}?>">
                        </div>

                        <div class="form-group">
                            <label for="" class="label_text">Username </label>
                            <input type="text" class="form-control" name="username" value="<?php if(isset($error)) { echo $username;}?>">
                        </div>

                        <div class="form-group">
                            <label for="" class="label_text">Email </label>
                            <input type="email" class="form-control" name="email" value="<?php if(isset($error)) { echo $email;}?>">

                        </div>

                        <div class="form-group">
                            <label for="" class="label_text">Password </label>
                            <input type="password" class="form-control" name="password">

                        </div>


                        <div class="form-group">
                            <label for="" class="label_text">Confirm Password </label>
                            <input type="password" class="form-control" name="passwordConfirm">

                        </div>

                        <button type="submit" name="signup" class="form_btn">Sign Up</button>

                        <p>Have an Account? <a href="login.php">Log In</a></p>
                        <?php } ?>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>