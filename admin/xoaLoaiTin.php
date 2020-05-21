<?php
// ob_start();
// session_start();
// if( !isset($_SESSION["idUser"]) && $_SESSION["idGroup"]!=1 ) {
//     header("location:../source/index.php");
// }

require "../source/lib/dbCon.php";
require "../source/lib/quantri.php";
?>

<?php
    $idLT = $_GET["idLT"];
        settype($idLT, "int");
    $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
    $qr = mysqli_query($mysqli, "DELETE FROM loaitin WHERE idLT = $idLT");
    header("location:listLoaiTin.php");
?>