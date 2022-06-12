<!DOCTYPE html>
<?php
require_once("config.php");
if (!isset($_SESSION["login_sess"])){
    header("location:login.php");
} 
$email=$_SESSION["login_email"];
$findresult=mysqli_query($dbc,"SELECT * FROM users WHERE email='$email'");
if($res = mysqli_fetch_array($findresult))
{
    $username=$res['username'];
    $firstname=$res ['firstname'];
    $lastname= $res['lastname'];
    $email=$res ['email'];
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Home Page</title>
</head>
<body>
    <div class="container">
        <div class="col-sm-3">

        </div>
        <div class="col-sm-6">
            <div class="login__form">
            <p><a href="logout.php"><span style="color:red; float:right;">Logout</span></a></p>
                <p>Here's all your Information <span style="color: #33CC00"><?php echo $username; ?></span></p>
                <table class="table">
                    <tr>
                    <th>First Name</th>
                    <td><?php echo $firstname; ?></td>
                </tr>

                <tr>
                    <th>Last Name</th>
                    <td><?php echo $lastname; ?></td>
                </tr>

                <tr>
                    <th> Userame</th>
                    <td><?php echo $username; ?></td>
                </tr>
            </table>
            
        </div>
        </div>
        
        <div class="col-sm-3">

        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>
</html>