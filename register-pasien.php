<?php
session_start();
//connection script
include 'connect.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>The Health Clinic - Registration </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    </head>

    <body>

        <!-- REGISITER PAGE SETTING -->
        <style>
        *, html{
            margin: 0px;
            padding: 0px;
        }

        body{
            margin: 0px;
            padding: 0px;
            background-image: url('header/header11.jpg'); 
            background-size: cover;
            background-attachment: fixed;
            background-position: center top;  
            background-repeat: no-repeat;
        }

        .layout-registform{
            background: #008080;
            margin-right: 60%;
            padding: 3%;
            padding-top: 3%;
            padding-bottom: 3%;
            opacity: 0.8;
        }

        .regist-title{
            margin-bottom: 2%;
            text-align: center;
        }

        .regist-title h1{
            color: white;
            font-family: Arial;
        }

        .regist-title h5{
            color: yellow;
            font-family: Arial;
        }

        .regist-form{
            margin-top: 7%;
            margin-left: 25%;
        }

        .registform-part{
            margin-bottom: 10px;
            color: white;
            font-size: 12px;
            font-family: Arial;
        }

        input{
            width: 60%;
        }

        .buttonregist{
            background: white;
            color: #008080;
            border: none;
            padding-left: 10%;
            padding-right: 10%;
            padding-top: 2%;
            padding-bottom: 2%;
            margin-left: 22%;
            margin-top: 8%;
        }

        .buttonregist:hover {
            background: grey;
            color: white;
        }
        </style>



        <!-- REGISTER PAGE -->
        <div class="layout-registform">

            <div class="regist-title">
                <h1>Registration</h1>
                <h5>Please fill the registration form below.</h5>
            </div>

            <form method="post" class="regist-form" enctype="multipart/form-data">

                <div class="registform-part">
                    <label>Full Name:</label> <br>
                    <input type="text" name="namapasien" class="regist-form-inside" placeholder="Your Full Name" required>
                </div>

                <div class="registform-part">
                    <label>Email:</label> <br>
                    <input type="text" name="emailpasien" class="regist-form-inside" placeholder="Your Email" required>
                </div>

                <div class="registform-part">
                    <label>Password:</label> <br>
                    <input type="password" name="passwordpasien" class="regist-form-inside" placeholder="Your Password" required>
                </div>

                <div class="registform-part">
                    <label>Born Date:</label> <br>
                    <input type="date" name="tgllahirpasien" class="regist-form-inside" required>
                </div>

                <div class="registform-part">
                    <label>Gender:</label> <br>
                    <select name="jkpasien" id="" required>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                    </select>
                </div>

                <div class="registform-part">
                    <label>Address:</label> <br>
                    <textarea type="text" name="alamatpasien" class="regist-form-inside" placeholder="Your Adress" required></textarea>
                </div>

                <div class="registform-part">
                    <label>Telephone:</label> <br>
                    <input type="text" name="teleponpasien" class="regist-form-inside" placeholder="Your Phone Number" required>
                </div>

                <div class="registform-part">
                    <label>Profile Picture:</label> <br>
                    <input type="file" name="foto" class="regist-form-inside">
                </div>

                <button class="buttonregist" name="daftarpasien">Join</button>
                </form>

                <?php
                if (isset($_POST['daftarpasien']))
                {

                    //take data from register form
                    $nama = $_POST["namapasien"];
	                $email = $_POST["emailpasien"];
	                $password = $_POST["passwordpasien"];
	                $tgllahir = $_POST["tgllahirpasien"];
	                $jk = $_POST["jkpasien"];
                    $alamat = $_POST["alamatpasien"];
                    $telepon = $_POST["teleponpasien"];
                    $tgldaftar = date("Y-m-d");
        
                    //seacrh the same email
	                $take = $connect->query("SELECT * FROM pasien WHERE email_pasien='$email'");
	                $match = $take->num_rows;
	                if ($match==1)
	                {
                        //if failed
		                echo "<script>alert('Registration failed, Email has been used.');</script>";
		                echo "<script>location='register-pasien.php';</script>";
	                }
                    else
                    {
                        //upload picture
                        $namafoto = $_FILES['foto']['name'];
                        $lokasi = $_FILES['foto']['tmp_name'];

                        //save to database
                        if (!empty($lokasi))
                        {
                        move_uploaded_file($lokasi, "fotopasien/$fotopasien");

		                $connect->query("INSERT INTO pasien (nama_pasien,email_pasien,password_pasien,tgllahir_pasien,jk_pasien,alamat_pasien,
                        telepon_pasien,foto_pasien,tglgabung_pasien)
                        VALUES('$nama','$email','$password','$tgllahir','$jk','$alamat','$telepon','$fotopasien','$tgldaftar') ");
                        }
                        else
                        {
                            $connect->query("INSERT INTO pasien (nama_pasien,email_pasien,password_pasien,tgllahir_pasien,jk_pasien,alamat_pasien,
                            telepon_pasien,tglgabung_pasien)
                            VALUES('$nama','$email','$password','$tgllahir','$jk','$alamat','$telepon','$tgldaftar') ");
                        }

                        //if success
		                echo "<script>alert('Registration success, you can login now.');</script>";
		                echo "<script>location='login-pasien.php';</script>";
                    }
                }  
                ?>
            
    </div>

    </body>
</html>