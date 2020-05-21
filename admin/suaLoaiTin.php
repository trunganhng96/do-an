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
    $row_loaitin = ChiTietLoaiTin($idLT);
?>
<?php
    if( isset($_POST["sua"]) ) {
        $Ten = $_POST["Ten"];
        $Ten_KhongDau = changeTitle($Ten);
        $ThuTu = $_POST["ThuTu"];
            settype($ThuTu, "int");
        $AnHien = $_POST["AnHien"];
            settype($AnHien, "int");
        $idTL = $_POST["idTL"];
            settype($idTL, "int");
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "UPDATE loaitin SET Ten = '$Ten', Ten_KhongDau = '$Ten_KhongDau', ThuTu = '$ThuTu', AnHien = '$AnHien', idTL = '$idTL', WHERE idLT = $idLT");
        header("location:listLoaiTin.php");
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
                        <tr>SUA LOAI TIN</tr>
                        <tr>
                            <td>Ten</td>
                            <td><input type="text" id="Ten" name="Ten" value="<?php echo $row_loaitin["Ten"] ?>"></td>
                        </tr>
                        <tr>
                            <td>ThuTu</td>
                            <td><input type="text" id="ThuTu" name="ThuTu" value="<?php echo $row_loaitin["ThuTu"] ?>"></td>
                        </tr>
                        <tr>    
                            <td>AnHien</td>
                            <td>
                                <input type="radio" name="AnHien" id="AnHien0" value="0" <?php if($row_loaitin["AnHien"]==0) echo "checked='checked'"; ?>>An
                                <input type="radio" name="AnHien" id="AnHien1" value="1" <?php if($row_loaitin["AnHien"]==1) echo "checked='checked'"; ?>>Hien
                            </td>
                        </tr>
                        <tr>
                            <td>idTL</td>
                            <td>
                                <select name="idTL" id="idTL">
                                    <?php
                                        $theloai = DanhSachTheLoai();
                                        while( $row_theloai = mysqli_fetch_assoc($theloai) ) {
                                    ?>
                                    <option <?php if($row_theloai["idTL"] == $row_loaitin["idTL"]) echo "selected='selected'" ?> value="<?php echo $row_theloai["idTL"] ?>"><?php echo $row_theloai["TenTL"] ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
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

