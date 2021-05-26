<?php 
ob_start();
session_start();
include("../db.php");

if(isset($_POST["login"])){
    $userName = $_POST["admin_email"];
    $password = md5($_POST["admin_password"]);

    
    $sqlLogin= "select * from admin_info where admin_email='$userName ' AND `admin_password` ='$password'";
    $result = mysqli_query($con,$sqlLogin);
    $row = mysqli_fetch_row($result);
   
    if(count($row)){
        $_SESSION["login"] = $row;
        header("location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="assets/css/logincss.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sign In</h5>
                        <form class="form-signin" method="post">
                            <div class="form-label-group">
                                <input type="email" id="admin_email" class="form-control"  placeholder="Email address"
                                    name="admin_email" required autofocus>
                                <label for="admin_email">Email address</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="admin_password" class="form-control" placeholder="Password"
                                    name="admin_password" required>
                                <label for="admin_password">Password</label>
                            </div>

                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1" name="remember"
                                    value="1">Remember password</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit"
                                name="login" value="login">Sign
                                in</button>
                            <hr class="my-4">
                            <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i
                                    class="fab fa-google mr-2"></i> Sign in with Google</button>
                            <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i
                                    class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>