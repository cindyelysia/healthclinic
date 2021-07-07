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

<!-- DEFAULT CONSULT & HEALING PAGE SETTING -->
<style>
    .defaultch{
        font-family: Arial;
        font-size: 14px;
        padding: 4%;
    }

    .picture-ch{
        text-align: center;
    }

    .picture-ch img{
        width: 25%;
    }

    .inside-ch{
        text-align: center;
        margin-top: 3%;
    }

    .button-ch{
        margin-left: 43%;
        margin-top: 4%;
    }

    .button-ch a{
        text-decoration: none;
        font-family: Arial;
        font-size: 14px;
        color: white;
        padding-left: 8%;
        padding-right: 8%;
        padding-top: 2%;
        padding-bottom: 2%;
        background: grey;
        border-radius: 15px 15px 15px;   
    }

    .button-ch a:hover{
        background: #008080;
    }
</style>

<!-- CONSULT & HEALING PAGE -->
    <div class="defaultch">

    <div class="picture-ch">
    <img src="icon/stethoscope.png" alt="">
    </div>

    <div class="inside-ch">
    <?php
        $take = $connect->query("SELECT * FROM pasien WHERE id_pasien='$id_pasien_login'");
        $data = $take->fetch_assoc();
    ?>

    <h4>Hallo, <?php echo $data["nama_pasien"];?>! Please fill the form for consultation and register. <br> Thank you.</h4>
    </div>
    
    <div class="button-ch">
    <a href="homepasien.php" placeholder="Back to Home"><img src="icon/home.png" alt="" width="15px"> </a>
    </div>
    </div>