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
?>

<!DOCTYPE html>
<html>
    <head>
        <title>HEALTH CLINIC - Patient's Medical History</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

<body>
    
    <!-- PATIENT HISTORY PAGE SETTING -->
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

    .layout-history-pasien{
        position: absolute;
        text-align: left;
        background: transparent;
        margin-left: 10%;
        margin-top: 5%;
        width: 40%;
        height: auto;
    }

    .layout-hp-inside{
        margin-bottom: 1%;
        background: white;
        padding: 2%;
        border-radius: 10px;
        width: 100%;
    }

    .layout-hp-inside img{
        position: absolute;
        width: 45px;
        height: 45px;
        object-fit: cover;
        border-radius: 50%;
    }

    .layout-hp-inside h3{
        margin-left: 11%;
        font-family: Arial;
        color: #008080;
    }

    .layout-hp-inside h5{
        margin-top: 1px;
        margin-left: 11%;
        font-family: Arial;
        color:#008080;
    }

    .layout-hp-inside a{
        position: absolute;
        text-decoration: none;
        font-family: Arial;
        color: white;
        background: #008080;
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 30px;
        padding-right: 30px;
        border-radius: 20px;
        font-size: 12px;
        margin-left: 84%;
        margin-top: 2px;
    }

    .layout-hp-inside a:hover{
        background: grey;
    }

    .layout-hp-inside2{
        margin-bottom: 1%;
        background: white;
        opacity: 0.8;
        padding-top: 2%;
        padding-bottom: 3%;
        padding-left: 2%;
        padding-right: 2%;        
        width: 100%;
    }

    .layout-hp-inside2 h4{
        font-family: Arial;
        margin-bottom: 5px;
        opacity: 0.8;
    }

    .layout-hp-inside2 h3{
        font-family: Arial;
        margin-bottom: 5px;
        margin-left: 4%;
        color: #008080;
    }

    .layout-hp-inside2 h5{
        margin-bottom: 2%;
        font-family: Arial;
        margin-left: 4%;
        color: grey;
    }

    .layout-hp-inside2 a{
        color: white;
        background: #008080;
        text-decoration: none;
        padding: 1%;
        font-family: Arial;
        font-size: 12px;
        border-radius: 5px;
        margin-left: 4%;
    }

    .layout-hp-inside2 a:hover{
        color: white;
        background: grey;
    }

    .layout-hp-inside3{
        text-align: center;
        margin-bottom: 1%;
        background: white;
        opacity: 0.8;
        padding: 2%;
        width: 100%;
    }

    .layout-hp-inside3 img{
        margin-top: 5%;
        margin-bottom: 2%;
        opacity: 0.8;
    }

    .layout-hp-inside3 h5{
        font-family: Arial;
        color: #008080;
        margin-bottom: 5%;
    }

    .layout-hp-inside3 a{
        color: white;
        background: #008080;
        padding-left: 5px;
        padding-right: 5px;
        text-decoration: none;
        font-family: Arial;
        font-size: 12px;
    }

    .layout-hp-inside3 a:hover{
        color: white;
        background: grey;
    }

    .layout-header-history{
        background-image: url('header/header4.jpg');
        background-size: cover;
        width: 70%;
        margin-left: 30%;
        padding-top: 45%;
    }
    </style>

    <!-- PATIENT HISTORY PAGE -->

    <div class="layout-history-pasien">

        <?php
        //get id pasien
        $id_pasien_login = $_SESSION["pasien"]["id_pasien"];
        //take patient data
        $take = $connect->query("SELECT * FROM pasien WHERE id_pasien='$id_pasien_login'");
        $data = $take->fetch_assoc();
        ?>

        <div class="layout-hp-inside">
        <img src="fotopasien/<?php echo $data["foto_pasien"]; ?>" alt="">
        <a href="homepasien.php">Back</a>
        <h5>Patient's Medical History</h5>
        <h3><?php echo $data["nama_pasien"]; ?></h3>
        </div>

        <?php
        //get id pasien
        $id_pasien_login = $_SESSION["pasien"]["id_pasien"];
        //take healing data
        $takepengobatan = $connect->query("SELECT * FROM pengobatan WHERE id_pasien='$id_pasien_login' ORDER BY tgl_pengobatan DESC");
        $datapengobatan = $takepengobatan->fetch_assoc();
        ?>

        <?php if ($datapengobatan["id_pengobatan"]!=0): ?>
        <div class="layout-hp-inside2">
        <h4><img src="icon/calendar.png" alt="" width="15px"> On <?php echo date("l, d F Y",strtotime($datapengobatan["tgl_pengobatan"]))?> </h4>
        <h3>Healing</h3>
        <h5> <?php echo $datapengobatan["status_pengobatan"];?> </h5>
        <a href="detailpengobatan.php?id=<?php echo $datapengobatan['id_pengobatan']; ?>">See Detail</a>
        </div>
        <?php else: ?>
        <div class="layout-hp-inside3">
        <img src="icon/medical-history.png" alt="" width="30px">
        <h5>There is no patient's healing history<br>
        Start healing <a href="konsultasi-pengobatan.php">here</a>
        </h5>
        </div>
        <?php endif ?>


        <?php
        //get id pasien
        $id_pasien_login = $_SESSION["pasien"]["id_pasien"];
        //take consultation data
        $takeriwayat = $connect->query("SELECT * FROM konsultasi WHERE id_pasien='$id_pasien_login' ORDER BY tgl_konsultasi DESC");
        $datariwayat = $takeriwayat->fetch_assoc();
        ?>

        <?php if ($datariwayat["id_konsultasi"]!=0): ?>
        <div class="layout-hp-inside2">
        
        <h4><img src="icon/calendar.png" alt="" width="15px"> On <?php echo date("l, d F Y",strtotime($datariwayat["tgl_konsultasi"]))?> </h4>
        <h3>Consultation</h3>
        <h5> <?php echo $datariwayat["status_konsultasi"];?> </h5>
        <a href="detailkonsultasi.php?id=<?php echo $datariwayat['id_konsultasi']; ?>">See Detail</a>
        </div>
        <?php else: ?>
        <div class="layout-hp-inside3">
        <img src="icon/medical-history.png" alt="" width="30px">
        <h5>There is no patient's consultation history <br>
        Start consultation <a href="konsultasi-pengobatan.php">here</a>
        </h5>
        </div>
        <?php endif ?>
    </div>

    <div class="layout-header-history">
    </div>

</body>
</html>