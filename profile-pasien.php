<?php
session_start();
//connection script
include 'connect.php';

//if not login, access denided
if(!isset($_SESSION["pasien"]) OR empty($_SESSION["pasien"]))
{
	echo "<script>alert('Access not allowed!');</script>";
	echo "<script>location='login-pasien.php';</script>";
	exit();
}

//get id pasien
$id_pasien_login = $_SESSION["pasien"]["id_pasien"];

?>

<!DOCTYPE html>
<html>
    <head>
        <title>HEALTH CLINIC - Patient's Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

<body>
    
    <!-- PROFILE PAGE SETTING -->
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

    .layout-profile-pasien{
        position: absolute;
        text-align: left;
        background: white;
        margin-left: 30%;
        margin-top: 11%;
        width: 60%;
        height: 48%;
        padding-left: 2%;
        padding-right: 2%;
        padding-top: 2%;
        border-radius: 20px;
    }

    .layout-pp-inside{
        margin-bottom: 2%;
    }

    .layout-pp-inside img{
        position: absolute;
        margin-top: 0px;
        width:250px;
        height:250px;
        object-fit:cover;
        border-radius:50%;
    }

    .layout-pp-inside h5{
        color: #008080;
        font-family: Arial;
        margin-left: 33%;
    }

    .layout-pp-inside h1{
        color: #008080;
        font-family: Arial;
        margin-left: 33%;
        padding-bottom: 1%;
        border-bottom: 1px solid #008080;
    }

    .profile-pasien{
        position: relative;
        margin-top: 2%;
        margin-left: 33%;
    }

    table{
        position: center;
        font-family: Arial;
        font-size: 14px;
    }

    table th{
        text-align: left;
        width: 35%;
    }

    table td{
        text-align: left;
        width: auto%;
    }

    .layout-header-profile{
        margin-top: 0px;
        background-image: url('header/header5.jpg');
        width: 60%;
        margin-left: 0%;
        padding-top: 45%;
    }

    .button-profile-pasien{
        margin-top: 7%;
        margin-left: 79%;
    }

    .button-profile-pasien a{
        text-decoration: none;
        font-family: Arial;
        color: white;
        background: #008080;
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 30px;
        padding-right: 30px;
        border-radius: 20px;
        font-size: 14px;
        margin-left: 6px;
    }

    .button-profile-pasien a:hover{
        color: white;
        background: grey;
    }
    </style>


    <!-- PROFILE PAGE -->

    <div class="layout-profile-pasien">

        <?php
        $take = $connect->query("SELECT * FROM pasien WHERE id_pasien='$id_pasien_login'");
        $data = $take->fetch_assoc();
        ?>

        <div class="layout-pp-inside">
        <img src="fotopasien/<?php echo $data["foto_pasien"]; ?>" alt="">
        <h5>Patient's Profile</h5>
        <h1><?php echo $data["nama_pasien"]; ?></h1>
        </div>

        <div class="profile-pasien">
        <table>
        <tr>
	    <th>Born on</th>
	    <td>: <?php echo date("d F Y",strtotime($data["tgllahir_pasien"])) ?></td>
        </tr>

        <tr>
	    <th>Gender</th>
	    <td>: <?php echo $data["jk_pasien"]; ?></td>
        </tr>

        <tr>
	    <th>Address</th>
	    <td>: <?php echo $data["alamat_pasien"]; ?></td>
        </tr>

        <tr>
	    <th>Telephone</th>
	    <td>: <?php echo $data["telepon_pasien"]; ?></td>
        </tr>

        <tr>
	    <th>Registration</th>
	    <td>: <?php echo $data["tglgabung_pasien"]; ?></td>
        </tr>

        <tr>
	    <th>Email</th>
	    <td>: <?php echo $data["email_pasien"]; ?></td>
        </tr>
        </table>
        </div>

        <div class="button-profile-pasien">
        <a href="homepasien.php" placeholder="Back to Home"><img src="icon/home.png" alt="" width="15px"> </a>
        <a href="editprofile-pasien.php"><img src="icon/pencil.png" alt="" width="15px"></a>
        </div>

    </div>

    <div class="layout-header-profile">
    </div>

</body>
</html>