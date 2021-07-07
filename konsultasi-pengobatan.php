<?php
session_start();
//connection script
include 'connect.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>HEALTH CLINIC - Consult & Healing</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

<body>
    
    <!-- CONSULT & HEALING PAGE SETTING -->
    <style>
    *, html{
        margin: 0px;
        padding: 0px;
    }

    body{
        margin: 0px;
        padding: 0px;
        background-image: url('');
        background: #008080;
    }

    .layout-ch{
        position: absolute;
        margin-top: 5%;
        margin-left: 35%;
        width: 60%;
        padding-top: 2%;
        padding-bottom: 2%;
        padding-left: 8px;
        padding-right: 8px;
        background: white;
        border-radius: 20px;
    }


    .menu-ch a{
        position: relative;
        text-decoration: none;
        color: white;
        padding-top: 2%;
        padding-bottom: 2%;
        padding-left: 17%;
        padding-right: 17%;
        margin-right: 2%;
        background: #008080;
        border-radius: 20px;
        font-family: Arial;
        font-size: 14px;
    }

    .menu-ch a:hover{
        background: grey;
    }

    .form-ch{
        position: absolute;
        padding: 1%;
        width: 59%;
        margin-top: 12%;
        margin-left: 35%;
        background: white;
        opacity: 0.9;
        border-radius: 20px;
    }

    .layout-header-ch{
        position: absolute;
        background-image: url('header/header6.jpg');
        background-size: 100% 100%;
        margin-top: 0px;
        margin-left: 0%;
        width: 60%;
        padding-top: 45%;
    }
    </style>

    <!-- CONSULT & HEALING PAGE -->
    <div class="layout-header-ch">
    </div>

    <div class="layout-ch">

        <div class="menu-ch">
            <a href="konsultasi-pengobatan.php?page=consult">
                <img src="icon/conversation.png" alt="" width="15px">
                Consultation Form
            </a>
            <a href="konsultasi-pengobatan.php?page=healing">
                <img src="icon/checklist.png" alt="" width="15px">
                Healing Form
            </a>
        </div>
    </div>

    <div class="form-ch">
    <?php
        if(isset($_GET['page']))
        {
            if($_GET['page']=="consult")
            {
                include 'konsultasi.php';
            }
            else if($_GET['page']=="healing")
            {
                include 'pengobatan.php';
            }
        }
        else
        {
        include 'default-ch.php';
        }          
    ?>
    </div>


</body>
</html>