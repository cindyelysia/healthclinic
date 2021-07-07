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

<!-- DEFAULT CONSULT PAGE SETTING -->
<style>
    .form-consult{
        font-family: Arial;
        font-size: 14px;
    }

    .formconsult-title{
        text-align: center;
        margin-bottom: 5%;
        border-bottom: 1px solid #008080;
    }

    .formconsult-title h2{
        font-family: Arial;
        color: #008080;
    }

    .formconsult-title p{
        font-family: Arial;
        font-size: 14px;
        margin-bottom: 1%;
        color: #008080;
    }

    form{
        font-family: Arial;
        font-size: 14px;
        color: #008080;
    }

    .formconsult-part{
        margin-bottom: 1%;
    }

    .input{
        width: 50%;
        border: 1px solid #008080;
        font-family: Arial;
        font-size: 14px;
        color: black;
        padding: 5px;
    }

    .buttonconsult{
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
        margin-left: 90%;
    }

    .buttonconsult:hover {
        color: white;
        background: grey;
    }

    .button-consult-back a{
        position: absolute;
        text-decoration: none;
        font-family: Arial;
        color: white;
        background: #008080;
        padding-top: 12px;
        padding-bottom: 12px;
        padding-left: 30px;
        padding-right: 30px;
        border-radius: 20px;
        font-size: 14px;
        margin-left: 77%;
        margin-top: 264px;
    }

    .button-consult-back a:hover {
        color: white;
        background: grey;
    }
</style>

<!-- CONSULT PAGE -->
    <div class="form-consult">

        <div class="formconsult-title">
        <h2>Consultation Form</h2>
        <p>Please fill the form below!</p>
        </div>

        <div class="button-consult-back">
        <a href="homepasien.php" placeholder="Back to Home"><img src="icon/home.png" alt="" width="15px"> </a>
        </div>

        <form method="post" class="formconsultation">
        <div class="formconsult-part">
            <label>Title:</label>
            <input type="text" class="input" name="judul-konsultasi" placeholder="Konsultasi penyakit (dalam/luar)" required>
        </div>

        <div class="formconsult-part">
            <label>Question:</label> <br>
            <textarea class="input" name="pesan-konsultasi" id="" cols="30" rows="10" placeholder="Tell the detail about your health problem" required></textarea>
        </div>

        <button class="buttonconsult" name="kirimkonsultasi"><img src="icon/paper-plane.png" alt="" width="15px"></button>
        </form>

        <?php
        if (isset($_POST['kirimkonsultasi']))
        {
            //take data from consultation form
            $tglkonsul = date("Y_m_d");
            $judulkonsul = $_POST['judul-konsultasi'];
            $isikonsul = $_POST['pesan-konsultasi'];

            //save data to database
            $connect->query("INSERT INTO konsultasi(id_pasien,tgl_konsultasi,judul_konsultasi,isi_konsultasi) 
            VALUES('$id_pasien_login','$tglkonsul','$judulkonsul','$isikonsul') ");

            //after success
            echo "<script>alert('Consultation form has been sent.');</script>";
            echo "<script>location='riwayat-pasien.php';</script>";
        }
        ?>
    </div>