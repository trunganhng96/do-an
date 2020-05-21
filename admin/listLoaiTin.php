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
                            <h3>DANH SACH LOAI TIN</h3>
                        </tr>
                        <tr>
                            <td>idLT</td>
                            <td>Ten</td>
                            <td>Ten_KhongDau</td>
                            <td>ThuTu</td>
                            <td>AnHien</td>
                            <td>idTL</td>
                            <td><a href="themLoaiTin.php">Them</a></td>
                        </tr>
                        <?php
                            $loaitin = DanhSachLoaiTin();
                            while( $row_loaitin = mysqli_fetch_assoc($loaitin) ) {
                                ob_start();
                        ?>
                        <tr>
                            <td>{idLT}</td>
                            <td>{Ten}</td>
                            <td>{Ten_KhongDau}</td>
                            <td>{ThuTu}</td>
                            <td>{AnHien}</td>
                            <td>{TenTL}</td>
                            <td><a href="suaLoaiTin.php?idLT={idLT}">Sua</a> - <a onclick="return confirm('Ban co chac muon xoa khong?')" href="xoaLoaiTin.php?idLT={idLT}">Xoa</a></td>
                        </tr>
                        <?php
                            $s = ob_get_clean();
                            $s = str_replace("{idLT}", $row_loaitin["idLT"], $s);
                            $s = str_replace("{Ten}", $row_loaitin["Ten"], $s);
                            $s = str_replace("{Ten_KhongDau}", $row_loaitin["Ten_KhongDau"], $s);
                            $s = str_replace("{ThuTu}", $row_loaitin["ThuTu"], $s);
                            $s = str_replace("{AnHien}", $row_loaitin["AnHien"], $s);
                            $s = str_replace("{TenTL}", $row_loaitin["TenTL"], $s);
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