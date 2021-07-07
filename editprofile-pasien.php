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
        <title>HEALTH CLINIC - Edit Patient's Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

<body>
    
    <!-- EDIT PROFILE PAGE SETTING -->
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

    .layout-editprofile-pasien{
        position: absolute;
        text-align: left;
        background: white;
        margin-left: 30%;
        margin-top: 10%;
        width: 58%;
        height: 49%;
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

    .layout-pp-inside h3{
        color: #008080;
        font-family: Arial;
        margin-left: 33%;
        padding-bottom: 1%;
        padding-right: 2%;
        border-bottom:1px solid #008080;
    }

    .editprofile-pasien{
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

    .layout-header-editprofile{
        margin-top: 0px;
        background-image: url('header/header5.jpg');
        width: 60%;
        margin-left: 0%;
        padding-top: 45%;
    }

    .button-editprofile-pasien{
        margin-top: 1%;
        margin-left: 83%;
    }

    .tombolsimpan{
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
        margin-left: 43px;
    }

    .tombolsimpan:hover{
        color: white;
        background: grey;
    }
    </style>

    <!-- EDIT PROFILE PAGE -->
    <div class="layout-editprofile-pasien">

        <?php
        $take = $connect->query("SELECT * FROM pasien WHERE id_pasien='$id_pasien_login'");
        $data = $take->fetch_assoc();
        ?>

        <div class="layout-pp-inside">
        <img src="fotopasien/<?php echo $data["foto_pasien"]; ?>">
        <h3>Edit Patient's Profile</h3>
        </div>

        <div class="editprofile-pasien">
        <form method="post" class="editprofile-form" enctype="multipart/form-data">
        <table>
        <tr>
	    <th>Full Name</th>
	    <td>: <input type="text" name="nama" value="<?php echo $data["nama_pasien"]; ?>"> </td>
        </tr>

        <tr>
	    <th>Born on</th>
	    <td>: <input type="date" name="tgllahir" value="<?php echo $data["tgllahir_pasien"]; ?>"> </td>
        </tr>

        <tr>
	    <th>Address</th>
	    <td>: <textarea type="text" name="alamat"> <?php echo $data["alamat_pasien"]; ?> </textarea>
        </tr>

        <tr>
	    <th>Change Picture</th>
	    <td>: <input type="file" name="foto" value=""> </td>
        </tr>

        <tr>
	    <th>Telephone</th>
	    <td>: <input type="number" name="telepon" value="<?php echo $data["telepon_pasien"]; ?>"> </td>
        </tr>

        <tr>
	    <th>Email</th>
	    <td>: <input type="text" name="email" value="<?php echo $data["email_pasien"]; ?>"> </td>
        </tr>

        <tr>
	    <th>Password</th>
	    <td>: <input type="text" name="password" value="<?php echo $data["password_pasien"]; ?>"> </td>
        </tr>
        </table>
        </div>

        <div class="button-editprofile-pasien">
        <input type="submit" class="tombolsimpan" name="simpan" value="Save">
        </div>
        </form>
        
    </div>

    <div class="layout-header-editprofile">
    </div>

    <?php
        if (isset($_POST['simpan']))
        {

            //take data picture from edit profile form
            $fotopasien = $_FILES['foto']['name'];
            $lokasifoto = $_FILES['foto']['tmp_name'];

            //upload new picture
            if (!empty($lokasifoto))
            {
                //upload foto
                move_uploaded_file($lokasifoto, "fotopasien/$fotopasien");

                //update to database
                $connect->query("UPDATE pasien SET nama_pasien='$_POST[nama]',tgllahir_pasien='$_POST[tgllahir]',
                alamat_pasien='$_POST[alamat]',telepon_pasien='$_POST[telepon]',foto_pasien='$fotopasien',
                email_pasien='$_POST[email]',password_pasien='$_POST[password]' WHERE id_pasien='$id_pasien_login'");
            }
            else
            {
                //update to database
                $connect->query("UPDATE pasien SET nama_pasien='$_POST[nama]',tgllahir_pasien='$_POST[tgllahir]',
                alamat_pasien='$_POST[alamat]',telepon_pasien='$_POST[telepon]',email_pasien='$_POST[email]',
                password_pasien='$_POST[password]' WHERE id_pasien='$id_pasien_login'");
            }

            //output if success
            echo "<script>alert('Profile has been updated.');</script>";
	        echo "<script>location='profile-pasien.php';</script>";
        }
        ?>

</body>
</html>