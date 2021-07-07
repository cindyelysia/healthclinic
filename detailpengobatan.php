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
$idberobat = $_GET["id"];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>HEALTH CLINIC - Patient's Detail History</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

<body>
    
     <!-- PATIENT DETAIL HISTORY PAGE SETTING -->
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

    .layout-detailhistory-pasien{
        position: absolute;
        text-align: left;
        background: transparent;
        margin-left: 50%;
        margin-top: 3%;
        width: 40%;
        height: auto;
    }

    .layout-detail-inside{
        margin-bottom: 1%;
        background: white;
        padding: 2%;
        border-radius: 10px;
        width: 100%;
    }

    .layout-detail-inside h4{
        text-align: center;
        font-family: Arial;
        color: #008080;
    }

    .layout-detail-inside h5{
        margin-top: 1px;
        text-align: center;
        font-family: Arial;
        color: #008080;
        border-bottom: 1px solid #008080;
        padding-bottom: 1%;
    }

    .buttonconsult{
        position: relative;
        margin-top: 3%;
        margin-bottom: 1%;
        text-align: center;
    }

    .buttonconsult a{
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
    }

    .buttonconsult a:hover{
        background: grey;
    }

    .layout-detail-inside2{
        font-family: Arial;
        font-size: 13px;
        margin-bottom: 1%;
        background: white;
        opacity: 0.8;
        padding-top: 2%;
        padding-bottom: 3%;
        padding-left: 2%;
        padding-right: 2%;        
        width: 100%;
        border-radius: 10px;
    }

    .layout-detail-inside2{
        font-family: Arial;
        font-size: 13px;
        margin-bottom: 1%;
        background: white;
        opacity: 0.8;
        padding-top: 2%;
        padding-bottom: 2%;
        padding-left: 2%;
        padding-right: 2%;        
        width: 100%;
        border-radius: 10px;
    }

    .layout-detail-inside2 p{
        text-align: justify;
        margin-bottom: 1%;
    }

    .layout-detail-inside2 h3{
        font-family: Arial;
        margin-bottom: 3%;
        color: #008080;
    }

    .layout-detail-inside2 h5{
        text-align: center;
        font-family: Arial;
        margin-top: 3%;
        margin-bottom: 1%;
        color: grey;
    }

    .layout-header-detailhistory{
        background-image: url('header/header4.jpg');
        background-size: cover;
        width: 70%;
        margin-left: 0%;
        padding-top: 45%;
    }
    </style>

    <!-- PATIENT DETAIL HISTORY PAGE -->
    
    <div class="layout-detailhistory-pasien">

        <?php
        $take = $connect->query("SELECT * FROM pasien WHERE id_pasien='$id_pasien_login'");
        $data = $take->fetch_assoc();
        ?>

        <?php
        $take2 = $connect->query("SELECT * FROM pengobatan WHERE id_pengobatan='$idberobat'");
        $data2 = $take2->fetch_assoc();
        ?>

        <div class="layout-detail-inside">
        <h4>Healing History</h4>
        <h5>on <?php echo date("l, d F Y",strtotime($data2["tgl_pengobatan"])) ?></h5>
        
            <div class="buttonconsult">
            <a href="riwayat-pasien.php">Back</a>
            </div>

        </div>

        <div class="layout-detail-inside2">
        <h3>Symptoms</h3>
        <?php echo $data2["judul_pengobatan"]; ?>
        <p>
        <?php echo $data2["gejala"]; ?> <br> <br>
        Long Symptoms <?php echo $data2["durasi_gejala"]; ?> <br> <br> 
        Note: <br> <?php echo $data2["catatan_pengobatan"]; ?> <br>
        </p>

        <h5><?php echo $data2["status_pengobatan"]; ?><h5>
        </div>

        <?php if ($data2["status_pengobatan"]=="Get Schedule"): ?>
        <div class="layout-detail-inside2">
        <h3>Schedule</h3>
        <p>Please visit our clinic on <?php echo $data2["jadwal_pengobatan"]; ?> <br>
        In room No.<?php echo $data2["ruang_pengobatan"]; ?> and entry No.<?php echo $data2["no_antrian"]; ?>

        <?php
        $namadokter = $data2["id_dokter"];
        $takedokter = $connect->query("SELECT * FROM dokter WHERE id_dokter='$namadokter'");
        $dokterstay = $takedokter->fetch_assoc();
        ?>

         with <?php echo $dokterstay["nama_dokter"]; ?>.
        </p>
        </div>
        <?php endif ?>

        <?php if ($data2["status_pengobatan"]=="Healing Time"): ?>
        <div class="layout-detail-inside2">
        <h3>Schedule</h3>
        <p>Please visit our clinic on <?php echo $data2["jadwal_pengobatan"]; ?> <br>
        In room No.<?php echo $data2["ruang_pengobatan"]; ?> and entry No.<?php echo $data2["no_antrian"]; ?>

        <?php
        $namadokter = $data2["id_dokter"];
        $takedokter = $connect->query("SELECT * FROM dokter WHERE id_dokter='$namadokter'");
        $dokterstay = $takedokter->fetch_assoc();
        ?>

         with <?php echo $dokterstay["nama_dokter"]; ?>.
        </p>
        </div>

        <div class="layout-detail-inside2">
        <h3>Medical Prescription</h3>
        <?php echo $data2["resep_obat"]; ?>
        </div>
        <?php endif ?>
        

        <?php if ($data2["status_konsultasi"]=="Healing Time"): ?>


        <?php endif ?>

    </div>
    <div class="layout-header-detailhistory">
    </div>
</body>
</html>