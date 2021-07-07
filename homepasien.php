<?php
session_start();
//connection script
include 'connect.php';

//if not login, access denided
if(!isset($_SESSION["pasien"]) OR empty($_SESSION["pasien"]))
{
	echo "<script>alert('Access not allowed!.');</script>";
	echo "<script>location='login-pasien.php';</script>";
	exit();
}

//get id pasien
$id_pasien_login = $_SESSION["pasien"]["id_pasien"];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>HEALTH CLINIC - Home </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body>
    
    <!-- HOME PAGE SETTING -->
    <style>
    *, html{
        margin: 0px;
        padding: 0px;
    }

    body{
        margin: 0px;
        padding: 0px;
        background-image: url('');
    }

    .header-pasien {
        margin: 0px;
        background: #008080;
        height: auto;
    }

    .header-pasien img{
        width: 100%;
    }

    #title-pasien{
        position: relative;
        padding-top: 8px;
        padding-bottom: 20px;
        padding-left: 3%;
        margin-left: 0%;
        background: #008080;
        margin-top: 0%;
    }

    #title-pasien img{
        position: absolute;
        width: 75px;
        height: 75px;
        object-fit:cover;
        border-radius:50%;
    }

    #pasien-name{
        position: relative;
        margin-left:7%;
        margin-top:0%;
    }

    #pasien-name h5{
        color: yellow;
        font-family: Arial;
    }

    #pasien-name h3{
        color: white;
        font-family: Arial;
        margin-bottom: 10px;
    }

    #pasien-name a{
        text-decoration: none;
        color: #008080;
        background: white;
        border: 1px solid white;
        padding: 5px;
        font-family: Arial;
        font-size: 14px;
        border-radius: 10px;
    }

    #pasien-name a:hover{
        color: white;
        background: grey;
        border: 1px solid grey;
    }

    #menu-pasien{
        margin-top: 2%;
        background: yellow;
    }

    .menu-pasien-inside{
        position: relative;
        
    } 

    .menu-pasien-inside p{
        text-decoration: none;
        color: black;
        font-family: Arial;
        font-size: 15px;
        margin-top: 2%;
    } 

    .menu-pasien-inside a{
        text-decoration: none;
        padding: 5px;
        background: #008080;
        opacity: ;
        width: 15%;
        text-align: center;
        margin-left: 5%;
        margin-bottom: 1%;
        float: left;
        padding: 2%;
        border-radius: 15px 15px 15px;
        
    }

    .menu-pasien-inside a:hover{
        background: white;
        box-shadow: 0px 6px 6px 6px grey;
    }

    </style>



    <!-- HOME PAGE -->
    <div class="header-pasien">
        <img src="header/header1.jpg" alt="" width="">
        
    </div>

    <div id="title-pasien">

            <?php
            $take = $connect->query("SELECT * FROM pasien WHERE id_pasien='$id_pasien_login'");
            $data = $take->fetch_assoc();
            ?>

        <img src="fotopasien/<?php echo $data["foto_pasien"]; ?>" alt="">

        <div id="pasien-name">

            <h5>The Health Clinic.</h5>
            <h3>Hallo! <?php echo $data["nama_pasien"]; ?></h3>
            <a href="logout-pasien.php">Logout</a>

        </div>
    </div>

    <div id="menu-pasien">
        <div class="menu-pasien-inside">
        <a href="profile-pasien.php" title="Profile">
            <img src="icon/profile.png" width="160px">
            <p><b>Patient's Profile</b></p>
        </a>
        </div>

        <div class="menu-pasien-inside">
        <a href="konsultasi-pengobatan.php" title="Konsultasi & Pengobatan">
            <img src="icon/stethoscope.png" alt="" width="160px">
            <p><b>Consultation & Healing</b></p>
        </a>
        </div>

        <div class="menu-pasien-inside">
        <a href="riwayat-pasien.php" title="Riwayat Pasien">
            <img src="icon/medical-history.png" alt="" width="160px">
            <p><b>Patient's Medical History</b></p>
        </a>
        </div>

        <div class="menu-pasien-inside">
        <a href="informasi-pasien.php" title="Informasi">
            <img src="icon/cardiogram.png" alt="" width="160px">
            <p><b>Information</b></p>
        </a>
        </div>
    
    </div>

</body>
</html>