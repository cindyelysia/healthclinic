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

<!-- HEALING PAGE SETTING -->
<style>
    .form-heal{
        font-family: Arial;
        font-size: 14px;
    }

    .formheal-title{
        text-align: center;
        margin-bottom: 5%;
        border-bottom: 1px solid #008080;
    }

    .formheal-title h2{
        font-family: Arial;
        color: #008080;
    }

    .formheal-title p{
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

    .formheal-part{
        margin-bottom: 1%;
    }

    .checkbox{
        margin-right: 5px;
    }

    .input{
        width: 50%;
        border: 1px solid #008080;
        font-family: Arial;
        font-size: 14px;
        color: black;
        padding: 5px;
    }

    .buttonhealing{
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

    .buttonhealing:hover {
        color: white;
        background: grey;
    }

    .button-heal-back{
        
    }

    .button-heal-back a{
        position: absolute;
        text-decoration: none;
        font-family: Arial;
        color: white;
        background: #008080;
        padding-top: 11px;
        padding-bottom: 11px;
        padding-left: 30px;
        padding-right: 30px;
        border-radius: 20px;
        font-size: 14px;
        margin-left: 77%;
        margin-top: 31%;
    }

    .button-heal-back a:hover {
        color: white;
        background: grey;
    }
</style>

<!-- HEALING PAGE -->
    <div class="form-heal">

        <div class="formheal-title">
        <h2>Healing Form</h2>
        <p>Please fill the form below!</p>
        </div>

        <div class="button-heal-back">
        <a href="homepasien.php" placeholder="Back to Home"><img src="icon/home.png" alt="" width="15px"> </a>
        </div>

        <form method="post" class="formhealing">
        <div class="formheal-part">
            <label>Title:</label>
            <input type="text" class="input" name="judul-pengobatan" placeholder="Pengobatan penyakit (dalam/luar)" required>
        </div>

        <div class="formheal-part">
            <label>Symptom:</label> <br>
            <textarea name="gejala" class="input" cols="" rows="3" placeholder="Tuliskan gejala yang anda alami" required></textarea>
        </div>

        <div class="formheal-part">
            <label>Long Symptoms:</label>
            <input type="checkbox" name="durasigejala" class="checkbox" value="One day" >One day
            <input type="checkbox" name="durasigejala" class="checkbox" value="Two days" >Two days
            <input type="checkbox" name="durasigejala" class="checkbox" value="Three days" >Three days
            <input type="checkbox" name="durasigejala" class="checkbox" value="More than 3 days" >More
        </div>

        <div class="formheal-part">
            <label>Note:</label> <br>
            <textarea name="pesan-pengobatan" class="input" cols="" rows="2" placeholder="Catatan tambahan untuk dokter. (ex: memiliki penyakit bawaan)"></textarea>
        </div>

        <button class="buttonhealing" name="kirimpengobatan"><img src="icon/paper-plane.png" alt="" width="15px"></button>
        </form>

        <?php
        if (isset($_POST['kirimpengobatan']))
        {
            //take data from healing form
            $tglpengobatan = date("Y-m-d");
            $judulpengobatan = $_POST['judul-pengobatan'];
            $gejalapasien = $_POST['gejala'];
            $lamagejala = $_POST['durasigejala'];
            $catatanpasien = $_POST['pesan-pengobatan'];

            //save data to database
            $connect->query("INSERT INTO pengobatan(id_pasien,tgl_pengobatan,judul_pengobatan,gejala,durasi_gejala,catatan_pengobatan) 
            VALUES('$id_pasien_login','$tglpengobatan','$judulpengobatan','$gejalapasien','$lamagejala','$catatanpasien') ");

            //after success
            echo "<script>alert('Healing form has been sent.');</script>";
            echo "<script>location='riwayat-pasien.php';</script>";
        }
        ?>
    </div>