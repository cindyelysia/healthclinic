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
?>

<!DOCTYPE html>
<html>
    <head>
        <title>HEALTH CLINIC - Information</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

<body>
    
    <!-- INFORMATION PAGE SETTING -->
    <style>
    *, html{
        margin: 0px;
        padding: 0px;
    }

    body{
        margin: 0px;
        padding: 0px;
        background-image: url('header/header3.jpg');
        background: #008080;
    }

    .layout-information{
        position: absolute;
        text-align: left;
        background: white;
        margin-left: 5%;
        margin-top: 3%;
        width: 29%;
        opacity: 0.9;
        height: 88%;
        padding-left: 2%;
        padding-top: 0%;
        border-radius: 30px;
    }

    .li-inside{
        margin-bottom: %;
        margin-top: 5%;
        width: 90%;
    }

    .li-inside img{
        position:absolute;
        margin-top: 0px;
        width:60px;
        height:60px;
        object-fit:cover;
        border-radius:50%;
    }

    .li-inside h4{
        color: #008080;
        font-family: Arial;
        padding-bottom: 5px;
        margin-bottom: 5px;
        border-bottom: 1px solid grey;
    }

    .li-inside h3{
        text-align: center;
        color: white;
        padding: 1%;
        background: grey;
        font-family: Arial;
        border-radius: 30px;
    }

    .li-inside p{
        color: black;
        font-size: 14px;
        padding-bottom: 5px;
        margin-bottom: 20px;
        font-family: Arial;
    }

    .dokter{
        margin-left: 20%;
        padding-top: 1%;
    }

    .layout-header-information{
        margin-top: 0px;
        background-image: url('header/header9.jpg');
        background size: fixed;
        width: 70%;
        margin-left: 30%;
        padding-top: 45%;
    }

    .button-ip a{
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
        margin-left: 73%;
    }

    .button-ip a:hover{
        color: #008080;
        background: grey;
    }
    </style>

    <!-- INFORMATION PAGE -->
    <div class="layout-information">

            <div class="li-inside">
                <h3>Today: <?php echo date(' l, d M Y'); ?>.</h3>
            </div>

            <div class="li-inside">
                <h4>Open</h4>
                <p>
                Monday - Sunday <br>
                At 07.00 am until 11.00 pm
                </p>
            </div>

            <div class="li-inside">
            <h4>Schedule</h4>

                <?php
                $hari = date ("D");
                $takejadwal = $connect->query("SELECT * FROM jadwal WHERE hari_praktek='$hari'");
                while ($loopjadwal = $takejadwal->fetch_assoc()){
                ?>

                <div class="gambardokter">
                <?php
                $iddokter = $loopjadwal["id_dokter"];
                $takedokter = $connect->query("SELECT * FROM dokter WHERE id_dokter='$iddokter'");
                $dokterdetail = $takedokter->fetch_assoc();
                ?>
                <img src="fotodokter/<?php echo $dokterdetail["foto_dokter"]; ?>" alt="">
                </div>

                <p class="dokter">
                With <?php echo $dokterdetail["nama_dokter"]; ?> <br>
                At <?php echo $loopjadwal["jam_praktek"]; ?> <br>
                In Room No.<?php echo $loopjadwal["ruang_praktek"]; ?><br>
                </p>
                <?php } ?>

            </div>

            <div class="li-inside">
            <h4>Contact Infomation</h4>
            <p class="kontak">
            Telp: 021 051 664 | Email: info@healthclinic
            </p>
            </div>

            <div class="button-ip">
            <a href="homepasien.php" placeholder="Back to Home"><img src="icon/home.png" alt="" width="15px"> </a>
            </div>

    </div>

    <div class="layout-header-information">
    </div>

</body>
</html>