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
    $idTL = $_GET["idTL"];
        settype($idTL, "int");
    $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
    $qr = mysqli_query($mysqli, "DELETE FROM theloai WHERE idTL = $idTL");
    header("location:listTheLoai.php");
?>