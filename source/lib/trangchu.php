<?php
    function TinMoiNhat_MotTin() {
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "SELECT * FROM tin ORDER BY idTin DESC LIMIT 0,1");
        return $qr;
    }

    function TinMoiNhat_BonTin() {
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "SELECT * FROM tin ORDER BY idTin DESC LIMIT 1,10");
        return $qr;
    }

    function TinXemNhieuNhat() {
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "SELECT * FROM tin ORDER BY SoLanXem DESC LIMIT 0,3");
        return $qr;
    }

    function TinMoiNhat_TheoLoaiTin_MotTin($idLT) {
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "SELECT * FROM tin WHERE idLT = $idLT ORDER BY idTin DESC LIMIT 0,1");
        return $qr;
    }

    function TinMoiNhat_TheoLoaiTin_BonTin($idLT) {
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "SELECT * FROM tin WHERE idLT = $idLT ORDER BY idTin DESC LIMIT 1,2");
        return $qr;
    }

    function TenLoaiTin($idLT) {
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $loaitin = mysqli_query($mysqli, "SELECT Ten FROM loaitin WHERE idLT = $idLT");
        $row = mysqli_fetch_assoc($loaitin);
        return $row['Ten'];
    }

    function QuangCao($vitri) {
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "SELECT * FROM quangcao WHERE vitri = $vitri");
        return $qr;
    }

    function DanhSachTheLoai() {
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "SELECT * FROM theloai");
        return $qr;
    }

    function DanhSachLoaiTin_TheoTheLoai($idTL) {
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "SELECT * FROM loaitin WHERE idTL = $idTL");
        return $qr;
    }

    function TinMoi_BenTrai($idTL) {
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "SELECT * FROM tin WHERE idTL = $idTL ORDER BY idTin DESC LIMIT 0,1");
        return $qr;
    }

    function TinMoi_BenPhai($idTL) {
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "SELECT * FROM tin WHERE idTL = $idTL ORDER BY idTin DESC LIMIT 1,2");
        return $qr;
    }

    function TinTheoLoaiTin($idLT) {
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "SELECT * FROM tin WHERE idLT = $idLT ORDER BY idTin DESC");
        return $qr;
    }

    function TinTheoLoaiTin_PhanTrang($idLT, $from, $sotin1trang) {
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "SELECT * FROM tin WHERE idLT = $idLT ORDER BY idTin DESC LIMIT $from, $sotin1trang");
        return $qr;
    }

    function breadCrumb($idLT) {
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "SELECT TenTL, Ten FROM theloai, loaitin WHERE theloai.idTL = loaitin.idTL AND idLT = $idLT");
        return $qr;
    }
    function breadCrumbs($idTin) {
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "SELECT TenTL, Ten FROM theloai, loaitin, tin WHERE idTin = $idTin AND theloai.idTL = tin.idTL AND loaitin.idLT = tin.idLT");
        return $qr;
    }

    function ChiTietTin($idTin) {
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "SELECT * FROM tin WHERE idTin = $idTin");
        return $qr;
    }

    function TinCungLoaiTin($idTin, $idLT) {
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "SELECT * FROM tin WHERE idTin <>$idTin AND idLT = $idLT ORDER BY RAND() LIMIT 0,3");
        return $qr;
    }

    function CapNhatSoLanXemTin($idTin) {
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "UPDATE tin SET SoLanXem = SoLanXem + 1 WHERE idTin = $idTin");
        return $qr;
    }

    function TimKiem($tukhoa) {
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "SELECT * FROM tin WHERE TieuDe REGEXP '$tukhoa' ORDER BY idTin DESC");
        return $qr;
    }
?>