<!DOCTYPE html>
<html>
    <head>
        <title>HEALTH CLINIC</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>

        <!-- FIRST PAGE SETTING -->
        <style>
        *, html{
            margin: 0px;
            padding: 0px;
        }

        body{
            margin: 0px;
            padding: 0px;
            background-image: url('header/header12.jpg'); 
            background-size: 100%;
            background-attachment: fixed;
            background-position: center top;  
            background-repeat: no-repeat;
        }

        .layout{
            position: relative;
            padding-top: 1%;
            padding-bottom: 3%;
            padding-left: 0%;
            background-color: #008080;
            margin-left: 0%;
            opacity: 0.7;
            margin-top: 420px;
        }

        #title{
            margin-top: 1%;
            padding-left: 3%;
        }

        #title h1{
            font-family: Arial;
            color: white;
            margin-bottom: 1%;
        }

        #title h4{
            font-family: Arial;
            color: white;
        }

        #title h5{
            font-family: Arial;
            color: yellow;
        }

        #button{
            margin-left: 3%;
            margin-bottom: 3%;
            margin-top: 2%;
        }

        #button ul li{
            list-style: none;
            float: left;
            margin-right: 30px;
        }

        #button ul li a{
            margin: 0px;
            text-decoration: none;
            font-family: Arial;
            font-size: 12px;            
            color: #008080;
            background: white;
            padding-left: 60px;
            padding-right: 60px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        #button ul li a:hover {
            color: white;
            background: grey;
        }
        </style>
        

        
        <!-- FIRST PAGE -->
        <div class="layout">

            <div id="title">
                <h1>The Health Clinic.</h1>
                <h4>Serve your health.</h4>
                <h5>Melati Street No.55, Cirendeu, South Tangerang, Banten | 021 051 664 | info@healthclinic </h5>
            </div>

            <div id="button">
                <ul>
                    <li><a href="login-pasien.php">Login</a></li>
                    <li><a href="register-pasien.php">Registration</a></li>
                </ul>
            </div>

        </div>
        </div>

    </body>
</html>