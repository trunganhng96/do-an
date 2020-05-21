<?php
// ob_start();
// session_start();
// if( !isset($_SESSION["idUser"]) && $_SESSION["idGroup"]!=1 ) {
//     header("location:../source/index.php");
// }

require "../source/lib/dbCon.php";
require "../source/lib/quantri.php";
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
                <form>
                    <table>
                        <tr>
                            <h3>DANH SACH THE LOAI</h3>
                        </tr>
                        <tr>
                            <td>idTL</td>
                            <td>TenTL</td>
                            <td>TenTL_KhongDau</td>
                            <td>ThuTu</td>
                            <td>AnHien</td>
                            <td><a href="themTheLoai.php">Them</a></td>
                        </tr>
                        <?php
                            $theloai = DanhSachTheLoai();
                            while( $row_theloai = mysqli_fetch_array($theloai) ) {
                                ob_start();
                        ?>
                        <tr>
                            <td>{idTL}</td>
                            <td>{TenTL}</td>
                            <td>{TenTL_KhongDau}</td>
                            <td>{ThuTu}</td>
                            <td>{AnHien}</td>
                            <td><a href="suaTheLoai.php?idTL={idTL}">Sua</a> - <a onclick="return confirm('Ban co chac muon xoa khong?')" href="xoaTheLoai.php?idTL={idTL}">Xoa</a></td>
                        </tr>
                        <?php
                            $s = ob_get_clean();
                            $s = str_replace("{idTL}", $row_theloai["idTL"], $s);
                            $s = str_replace("{TenTL}", $row_theloai["TenTL"], $s);
                            $s = str_replace("{TenTL_KhongDau}", $row_theloai["TenTL_KhongDau"], $s);
                            $s = str_replace("{ThuTu}", $row_theloai["ThuTu"], $s);
                            $s = str_replace("{AnHien}", $row_theloai["AnHien"], $s);
                            echo $s;
                        }
                        ?>
                    </table>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>
