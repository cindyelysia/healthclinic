<?php
session_start();
//connection script
include 'connect.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>The Health Clinic - Login </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>

        <!-- LOGIN PAGE SETTING -->
        <style>
        *, html{
            margin: 0px;
            padding: 0px;
        }

        body{
            margin: 0px;
            padding: 0px;
            background-image: url('header/header11.jpg'); 
            background-size: cover;
            background-attachment: fixed;
            background-position: center top;  
            background-repeat: no-repeat;
        }

        .layout-loginform{
            background: #008080;
            margin-right: 60%;
            padding: %;
            padding-top: 11%;
            padding-bottom: 12%;
            opacity: 0.8;
        }

        .login-title{
            margin-bottom: 2%;
            text-align: center;
        }

        .login-title h1{
            margin-bottom: 2px;
            font-family: Arial;
            color: white;
        }

        .login-title h5{
            margin-top: 0px;
            font-family: Arial;
            color: yellow;
        }

        .login-title a{
            font-family: Arial;
            color: white;
            font-size: 12px;
            text-decoration: none;
        }

        .login-form{
            margin-top: 15%;
            margin-left: 20%;
        }

        .loginform-part{
            margin-bottom: 5%;
            margin-top: 1%;
            color: white;
            font-size: 12px;
            font-family: Arial;
        }

        input{
            width: 75%;
        }

        .buttonlogin{
            background: white;
            color: #008080;
            border: none;
            padding-left: 8%;
            padding-right: 8%;
            padding-top: 2%;
            padding-bottom: 2%;
            margin-left: 23%;
            margin-top: 4%;
        }

        .buttonlogin:hover {
            background: grey;
            color: white;
        }
        </style>



        <!-- LOGIN PAGE -->
        <div class="layout-loginform">

            <div class="login-title">
                <h1>Login</h1>
                <h5>Please login before continue the access.<br>
                Don't have account? do registration<a href="register-pasien.php"> here</a></h5>
            </div>

            <form method="post" class="login-form">

                <div class="loginform-part">
                    <label>Email:</label> <br>
                    <input type="text" name="emailpasien" class="login-form-inside" placeholder="Your Email">
                </div>

                <div class="loginform-part">
                    <label>Password:</label> <br>
                    <input type="password" name="passwordpasien" class="login-form-inside" placeholder="Your Password">
                </div>

                <button class="buttonlogin" name="loginpasien">Login</button>

            <?php
            if(isset($_POST['loginpasien']))
            {
                //take the email and password of patient
                $email = $_POST["emailpasien"];
                $password = $_POST["passwordpasien"];
                $take = $connect->query("SELECT * FROM pasien WHERE email_pasien='$email' AND password_pasien='$password'");
                $match = $take->num_rows;

                //to match the email and password
                if ($match==1)
                {
                    $_SESSION['pasien']=$take->fetch_assoc();
                    echo "<script>alert('Login success.');</script>";
                    echo "<meta http-equiv='refresh' content='1;url=homepasien.php'>";
                }
                else
                {
                    echo "<script>alert('Login failed. Please try again.');</script>";
                }
            }
            ?>
            </form>
        </div>

    </body>
</html>