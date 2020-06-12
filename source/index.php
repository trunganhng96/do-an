<?php
session_start();
require "lib/dbCon.php";
require "lib/trangchu.php";

    if( isset( $_GET["p"] ) ) {
        $p = $_GET["p"];
    } else {
        $p = "";
    }
?>



<!-- formInfo -->
<?php
    if ( isset($_POST["confirm"]) ) {
        // $username = $_POST["username"];
        $age =  isset($_POST["age"]) ? $_POST["age"] : "";
        $category = isset($_POST["category"]) ? $_POST["category"] : "" ;
        $idUser = $_SESSION["idUser"];
        // SELECT * FROM `members` WHERE `membership_number` IN (1,2,3);
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "INSERT INTO user (`idUser`,`idTL`, `idLT`, `rating`, `age`, `category`) VALUES($idUser, 0, 0, 0, '$age', $category)");

        $sql2 = "SELECT tin.* FROM tin Where tin.idTL = '".$category."' ORDER BY idTin DESC LIMIT 1,2";
        $qr2 = mysqli_query($mysqli, $sql2);
        $row2 = mysqli_fetch_all($qr2);

        $sql3 = "SELECT loaitin.* FROM loaitin WHERE loaitin.idTL = '".$category."' LIMIT 0,1 ";
        $qr3 = mysqli_query($mysqli, $sql3);
        $row3 = mysqli_fetch_all($qr3);
        // echo "<pre>";
        // var_dump($row3);
        // echo "</pre>";
        $sql4 = "SELECT tin.* FROM tin Where tin.idTL = '".$category."' ORDER BY idTin DESC LIMIT 0,1";
        $qr4 = mysqli_query($mysqli, $sql4);
        $row4 = mysqli_fetch_all($qr4);

        if(isset($age)) {
            $sql5 = "SELECT t.* FROM loaitin as lt, tin as t WHERE lt.idLT = t.idLT AND lt.age='$age' LIMIT 5  ";
            $qr5 = mysqli_query($mysqli, $sql5);
            $row5 = mysqli_fetch_all($qr5);
            if(!isset($row5)){
                $row5 = [];
            }
            // var_dump($sql5);
        }

        if(isset($category)) {
            $sql6 = "SELECT tin.* FROM tin Where tin.idTL = '".$category."' ORDER BY idTin DESC";
            $qr6 = mysqli_query($mysqli, $sql6);
            $row6 = mysqli_fetch_all($qr6);
            $ids = [];
            foreach($row6 as $key1 => $value){
                array_push($ids, $value[0]);
            }

            $ids = array_rand($ids, 5);
            $sql7 = "SELECT tin.* FROM tin Where tin.idTin IN (".implode(',',$ids).") ORDER BY idTin DESC";
            $qr7 = mysqli_query($mysqli, $sql7);
            $row7 = mysqli_fetch_all($qr7);
        }
    }
    if(isset($_POST['like'])){
        $idLT = $_POST['hidden_idLT'];
        $sql8 = "SELECT tin.* FROM tin where tin.idLT = ".$idLT." LIMIT 5";
        $qr8 = mysqli_query($mysqli, $sql8);
        $row8 = mysqli_fetch_all($qr8);   
    }
?>

<?php

    // var_dump($_SESSION["idUser"]);die;

    if( isset($_POST["like"]) ) {
        $idTL = $_POST['hidden_idTL'];
        $idLT = $_POST['hidden_idLT'];
        $idUser = $_SESSION["idUser"];
        $username = $_SESSION["Username"];
       
        
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        // $test = "SELECT user.* FROM user WHERE user.idUser = '".$idUser."' AND user.idTL = '".$idTL."' AND user.idLT = '".$idLT."'";
        $sql = mysqli_query($mysqli, "SELECT user.* FROM user WHERE user.idUser = '".$idUser."' AND user.idTL = ".$idTL." AND user.idLT = ".$idLT."");
        $row33 = mysqli_fetch_assoc($sql);
        // echo "<pre>";
        //     var_dump(mysqli_num_rows($sql));die;
        // echo "</pre>";
        $like = $_POST['like'];
        if(mysqli_num_rows($sql) == 0){
            // $t = "INSERT INTO user VALUES($idUser, $idTL, $idLT, 1, '', '','')";
            // var_dump($t);
            $qr = mysqli_query($mysqli, "INSERT INTO user VALUES($idUser, $idTL, $idLT, 1, '', '','')");
        } else {
            $qr = mysqli_query($mysqli, "UPDATE user SET idUser = '$idUser', idTL = '$idTL', idLT = '$idLT', rating = '$like' WHERE username = $username ");
        }
    }
?>

<?php
    $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
    $qr = mysqli_query($mysqli, "SELECT theloai.* FROM theloai");
    $list_categories =  mysqli_fetch_all($qr);
    // echo "<pre>";
    // var_dump($list_categories);
    // echo "</pre>";
?>
<!-- //formInfo -->



<!-- formLogin - formHello -->
<?php
    if ( isset($_POST["login"]) ) {
        $username = $_POST["username"];
        $pass = $_POST["pass"];
        $password = md5($pass);
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "SELECT users.* FROM users WHERE users.Username = '".$username."' AND users.Password = '".$password."'");
        
        if( mysqli_num_rows($qr) == 1 ) {
            $row = mysqli_fetch_assoc($qr);
            $_SESSION["idUser"] = $row['idUser'];
            $_SESSION["Username"] = $row['Username'];
            $_SESSION["HoTen"] = $row['HoTen'];
            $_SESSION["idGroup"] = $row['idGroup'];
        }
    }
?>

<?php
    if( isset($_POST["logout"]) ) {
        unset($_SESSION["idUser"]);
        unset($_SESSION["Username"]);
        unset($_SESSION["HoTen"]);
        unset($_SESSION["idGroup"]);
    }
?>
<!-- //formLogin - formHello -->



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vnexpress.net</title>
<link rel="stylesheet" type="text/css" href= "css/layout.css" />
<link rel="stylesheet" type="text/css" href="css/layoutslx.css" />
<link rel="stylesheet" type="text/css" href="css/layoutkf.css" />
<link rel="stylesheet" type="text/css" href="css/layoutulBlockMenu.css" />
<link rel="stylesheet" type="text/css" href="css/layouttk.css" />
<link rel="stylesheet" type="text/css" href="css/popupLogin.css" />
</head>


<body>

<div class="popupLogin">
    <?php require "blocks/formLogin.php" ?>
</div>

<div class="popupInfo">
    <?php require "blocks/formInfo.php" ?>
</div>

<div id="wrap-vp">
	<div id="header-vp">
    	<div id="logo"><a href="index.php"><img src="images/logo.gif" /></a></div>
    </div>
    
    <div>
    	<!--block/menu.php-->
        <?php
        require "blocks/menu.php";
        ?>
    </div>
      <div id="midheader-vp">
    	<div id="left">
        	<ul class="list_arrow_breakumb">
            	<li class="start">
                    <a href="javascript:;">Trang nhất</a>
                    <span class="arrow_breakumb">&nbsp;</span>
                </li>
           </ul>
        </div>
        <div id="right">
			<!--blocks/thongtinchung.php-->
            <?php
                require "blocks/thongtinchung.php";
            ?>
        </div>
    </div>
    <div class="clear"></div>

    <div id="slide-vp">
    	<!--blocks/top_trang_chu.php-->
        <?php
            require "blocks/top_trang_chu.php";
        ?>
        <div id="slide-right">
        <!--blocks/quangcao_top_phai.php-->
            <?php
                require "blocks/quangcao_top_phai.php";
            ?>
        </div>
    </div>

  	<div id="content-vp">
    	<div id="content-left">
		<!--blocks/cot_trai.php-->
            <?php
                require "blocks/cot_trai.php";
            ?>
        </div>
        <div id="content-main">
			<!--PAGES-->
            <?php
                switch($p) {
                    case "tintrongloai" : require "pages/tintrongloai.php";
                    break;
                    case "chitiettin" : require "pages/chitiettin.php";
                    break;
                    case "timkiem" : require "pages/timkiem.php";
                    break;
                    default : require "pages/trangchu.php";
                }
            ?>
        </div>
        <div id="content-right">
		<!--blocks/cot_phai.php-->
            <?php
                if( !isset($_SESSION["idUser"]) ) {
                    // require "blocks/formLogin.php";
                    // require "blocks/formInfo.php";
                } else {
                    require "blocks/formHello.php";
                    // require "blocks/formInfo.php";
                } 
            ?>
            <input type="hidden" id="hidden_idUser" value="<?php echo $row['idUser']; ?>">
            <?php
                require "blocks/cot_phai.php";
            ?>
        </div>

    <div class="clear"></div>
    	
    </div>
    
     <div id="thongtin">
    	<!--blocks/thongtindoanhnghiep.php-->
        <?php
            // require "blocks/thongtindoanhnghiep.php";
        ?>
    </div>
    <div class="clear"></div>
    <div id="footer">
    	<!--blocks/footer.php-->
        <?php
            require "blocks/footer.php";
        ?>
        <div class="ft-bot">
            <div class="bot1"><a href="index.php"><img src="images/logo.gif" /></a></div>
            <div class="bot2">
                     <p>© <span>Copyright 1997 VnExpress.net,</span>  All rights reserved</p>
                     <p>® VnExpress giữ bản quyền nội dung trên website này.</p>
            </div>
            <div class="bot3">
                
                     <p><a href="http://fptad.net/qc/V/vnexpress/2014/07/">VnExpress tuyển dụng</a>   <a href="http://polyad.net/Polyad/Lien-he.htm">Liên hệ quảng cáo</a> / <a href="/contactus">Liên hệ Tòa soạn</a></p>
                     <p><a href="http://vnexpress.net/contact.htm" target="_blank" style="color: #686E7A;font: 11px arial;padding: 0 4px;text-decoration: none;">Thông tin Tòa soạn: </a><span>0123.888.0123</span> (HN) - <span>0129.233.3555</span> (TP HCM)</p>
                  
            </div>
        </div>
    </div>
</div>
<script>
    $(window).load(function() {
        $('.popupLogin').show();
        $('.popupInfo').hide();
        <?php if(  isset($_POST["login"]) ) { ?>
        // $(".login").click(function(){
        $('.popupLogin').hide();

        // });
        <?php } ?>

        <?php if(  isset($_POST["login"]) ) { ?>
        // $(".login").click(function(){

        $('.popupInfo').show();
        // });
        <?php } ?>

        <?php if(  isset($_POST["confirm"]) ) { ?>
        // $(".login").click(function(){

        $('.popupInfo').hide();
        // });
        <?php } ?>

        <?php if(  isset($_POST["confirm"]) ) { ?>
        // $(".login").click(function(){

        $('.popupLogin').hide();
        // });
        <?php } ?>
    });
</script>

</body>
</html>
