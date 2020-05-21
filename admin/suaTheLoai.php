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
    $row_theloai = ChiTietTheLoai($idTL);
?>
<?php
    if( isset($_POST["sua"]) ) {
        $TenTL = $_POST["TenTL"];
        $TenTL_KhongDau = changeTitle($TenTL);
        $ThuTu = $_POST["ThuTu"];
            settype($ThuTu, "int");
        $AnHien = $_POST["AnHien"];
            settype($AnHien, "int");
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "UPDATE theloai SET TenTL = '$TenTL', TenTL_KhongDau = '$TenTL_KhongDau', ThuTu = '$ThuTu', AnHien = '$AnHien' WHERE idTL = $idTL");
        header("location:listTheLoai.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quan Tri</title>
    <link rel="stylesheet" type="text/css" href= "layout2.css">
    <link rel="stylesheet" type="text/css" href= "layout.css" />
</head>
<body>
    <table width="955px" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
            <td id="hangTieuDe">TRANG QUAN TRI</td>
        </tr>
        <tr>
            <td id="hang2"><?php require "menu.php" ?></td>
        </tr>
        <tr>
            <td>
            <form method="POST">
                    <table width="500px" border="1" cellspacing="0" cellpadding="0">
                        <tr>SUA THE LOAI</tr>
                        <tr>
                            <td>TenTL</td>
                            <td><input type="text" id="TenTL" name="TenTL" value="<?php echo $row_theloai["TenTL"] ?>"></td>
                        </tr>
                        <tr>
                            <td>ThuTu</td>
                            <td><input type="text" id="ThuTu" name="ThuTu" value="<?php echo $row_theloai["ThuTu"] ?>"></td>
                        </tr>
                        <tr>    
                            <td>AnHien</td>
                            <td>
                                <input type="radio" name="AnHien" id="AnHien0" value="0" <?php if($row_theloai["AnHien"]==0) echo "checked='checked'"; ?>>An
                                <input type="radio" name="AnHien" id="AnHien1" value="1" <?php if($row_theloai["AnHien"]==1) echo "checked='checked'"; ?>>Hien
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" id="sua" name="sua" value="sua"></td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>