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
                            <h3>DANH SACH TIN</h3>
                        </tr>
                        <tr>
                            <td>idTin</td>
                            <td>Noi Dung</td>
                            <td>TheLoai - LoaiTin</td>
                            <td>
                                SoLanXem 
                                <br>
                                TinNoiBat - AnHien
                            </td>
                            <td><a href="themTin.php">Them</a></td>
                        </tr>
                        <?php
                            $tin = DanhSachTin();
                            while( $row_tin = mysqli_fetch_assoc($tin) ) {
                                ob_start();
                        ?>
                        <tr>
                            <td>{idTin}</td>
                            <td>
                                <a href="suaTin.php?idTin={idTin}">{TieuDe}</a>
                                <br>
                                <img style="float:left; margin-right:5px;" src="../source/upload/tintuc/{urlHinh}" width="152" height="96">{TomTat}
                            </td>
                            <td>
                                {TenTL}
                                <br>
                                {Ten}
                            </td>
                            <td>
                                So Lan Xem: {SoLanXem}
                                <br>
                                {TinNoiBat} - {AnHien}
                            </td>
                            <td><a href="suaTin.php?idTin={idTin}">Sua</a> - <a onclick="return confirm('Ban co chac muon xoa khong?')" href="xoaTin.php?idTin={idTin}">Xoa</a></td>
                        </tr>
                        <?php
                            $s = ob_get_clean();
                            $s = str_replace("{idTin}", $row_tin["idTin"], $s);
                            $s = str_replace("{TieuDe}", $row_tin["TieuDe"], $s);
                            $s = str_replace("{urlHinh}", $row_tin["urlHinh"], $s);
                            $s = str_replace("{TomTat}", $row_tin["TomTat"], $s);
                            $s = str_replace("{TenTL}", $row_tin["TenTL"], $s);
                            $s = str_replace("{Ten}", $row_tin["Ten"], $s);
                            $s = str_replace("{SoLanXem}", $row_tin["SoLanXem"], $s);
                            $s = str_replace("{TinNoiBat}", $row_tin["TinNoiBat"], $s);
                            $s = str_replace("{AnHien}", $row_tin["AnHien"], $s);
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