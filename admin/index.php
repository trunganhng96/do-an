<?php
ob_start();
session_start();
if( !isset($_SESSION["idUser"]) && $_SESSION["idGroup"]!=1 ) {
    header("location:../source/index.php");
}

require "../source/lib/dbCon.php";
require "../source/lib/quantri.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quan Tri</title>
    <link rel="stylesheet" type="text/css" href= "layout.css">
    <link rel="stylesheet" type="text/css" href= "layout2.css">
</head>
<body>
    <table width="933px" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
            <td id="hangTieuDe">TRANG QUAN TRI</td>
        </tr>
        <tr>
            <td id="hang2"><?php require "menu.php" ?></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
    </table>
</body>
</html>