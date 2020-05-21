<?php
    // Quan ly The Loai
    function DanhSachTheLoai() {
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "SELECT * FROM theloai ORDER BY idTL ");
        return $qr;
    }

    function ChiTietTheLoai($idTL) {
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $row = mysqli_query($mysqli, "SELECT * FROM theloai WHERE idTL = $idTL");
        return mysqli_fetch_assoc($row);
    }

    function DanhSachLoaiTin() {
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "SELECT * FROM theloai, loaitin WHERE theloai.idTL = loaitin.idTL ORDER BY idLT ");
        return $qr;
    }

    function ChiTietLoaiTin($idLT) {
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $row = mysqli_query($mysqli, "SELECT * FROM loaitin WHERE idLT = $idLT");
        return mysqli_fetch_assoc($row);
    }

    function DanhSachTin() {
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "SELECT tin.*, TenTL, Ten FROM tin, loaitin, theloai WHERE theloai.idTL = tin.idTL AND tin.idLT = loaitin.idLT ORDER BY idTin LIMIT 0,350 ");
        return $qr;
    }

    function ChiTietTin($idTin) {
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $row = mysqli_query($mysqli, "SELECT * FROM tin WHERE idTin = $idTin");
        return mysqli_fetch_assoc($row);
    }


    function stripUnicode($str){
        if(!$str) return false;
            $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'=>'đ',
            'D'=>'Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',	  
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
            );
        foreach($unicode as $khongdau=>$codau) {
            $arr=explode("|",$codau);
            $str = str_replace($arr,$khongdau,$str);
        }
        return $str;
    }

    function changeTitle($str){
        $str=trim($str);
        if ($str=="") return "";
        $str =str_replace('"','',$str);
        $str =str_replace("'",'',$str);
        $str = stripUnicode($str);
        $str = mb_convert_case($str,MB_CASE_TITLE,'utf-8');
        
        // MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
        $str = str_replace(' ','-',$str);
        return $str;
    }
?>