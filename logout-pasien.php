<?php
session_start();

//menghapus session
session_destroy();
echo "<script>alert('You has been logout, Thank you.');</script>";
echo "<script>location='index.php';</script>";

?>