<?php
    $idLT = $_GET['idLT'];
    settype($idLT, "int");
?>
<?php
    $bc = breadCrumb($idLT);
    $row_bc = mysqli_fetch_assoc($bc);
?>
<div>Trang Chủ >> <?php echo $row_bc['TenTL'] ?> >> <?php echo $row_bc['Ten'] ?></div>
<?php
    $sotin1trang = 8;
    if( isset($_GET['trang']) ) {
        $trang = $_GET['trang'];
        settype($trang, "int");
    }else {
        $trang = 1;
    }
    $from = ($trang - 1) * $sotin1trang;
    $tin = TinTheoLoaiTin_PhanTrang($idLT, $from, $sotin1trang);
    while( $row_tin = mysqli_fetch_assoc($tin) ) {
?>

<div class="box-cat">
	<div class="cat1">
        <div class="clear"></div>
        <div class="cat-content">
        	<div class="col0 col1">
            	<div class="news">
                    <h3 class="title" >
                        <a href="index.php?p=chitiettin&idTin=<?php echo $row_tin['idTin'] ?>"><?php echo $row_tin['TieuDe'] ?></a>
                    </h3>
                    <img class="images_news" src="upload/tintuc/<?php echo $row_tin['urlHinh'] ?>" align="left" />
                    <div class="des"><?php echo $row_tin['TomTat'] ?></div>
                    <div class="clear"></div>  
				</div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<?php
    };
?>
<hr>
<style>
    #phantrang {text-align:center; margin-top:10px}
    #phantrang a {background-color:#000; color:#FF0; padding:5px; margin-right:3px}
    #phantrang a:hover{background-color:#09F}
</style>
<div id="phantrang">
    <?php
        $t = TinTheoLoaiTin($idLT);
        $tongsotin = mysqli_num_rows($t);
        $tongsotrang = ceil($tongsotin/$sotin1trang);
        for($i = 1; $i<=$tongsotrang; $i++) {
    ?>
    <a <?php if($i==$trang) echo " style='background-color:red' "; ?> href = "index.php?p=tintrongloai&idLT=<?php echo $idLT ?>&trang=<?php echo $i ?>"><?php echo $i ?></a>
    <?php
        };
    ?>
</div>
