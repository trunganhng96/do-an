<!-- box cat -->
<?php
  $idLT =rand(1,40);
?>
<div class="box-cat">
	<div class="cat">
    <div class="main-cat">
      <?php 
          if( !isset($_POST['confirm'])) {
        ?>
          <a href="index.php?p=tintrongloai&idLT=<?php echo $idLT ?>"><?php echo TenLoaiTin($idLT) ?></a>
        <?php 
        }else {
        ?>
        <a href="#">Gợi ý theo thể loại</a>
        <?php } ?>
    </div>
      <div class="clear"></div>
      <div class="cat-content">
          <div class="col1">
            <div class="news">
              <h3 class="title" >
                <a href="index.php?p=chitiettin&idTin=<?php echo $row7[0][0] ?>">
                  <?php echo $row7[0][1]; ?>
                </a>
              </h3>
              <img class="images_news" src="upload/tintuc/<?php echo $row7[0][4]; ?>" align="left" />
              <div class="des">
                <?php echo $row7[0][3]; ?>  
              </div>
              <div class="clear"></div>          
            </div>
          </div>
      <div class="col2">
        <?php
          foreach($row7 as $key => $r7) {
          if($key > 0){
        ?>
          <h3 class="tlq">
            <a href="index.php?p=chitiettin&idTin=<?php echo $r7[0] ?>">
              <?php echo $r7[1]; ?>
            </a>
          </h3>  
        <?php
          }}
        ?>
      </div> 
    </div>
  </div>
</div>
<div class="clear"></div>
<!-- //box cat -->

<!-- box cat -->
<?php
  $idLT =rand(1,40);
?>
<div class="box-cat">
	<div class="cat">
    <div class="main-cat">
      <?php 
          if( !isset($_POST['confirm'])) {
        ?>
          <a href="index.php?p=tintrongloai&idLT=<?php echo $idLT ?>"><?php echo TenLoaiTin($idLT) ?></a>
        <?php 
        }else {
          
        ?>
        <a href="#">Gợi ý theo độ tuổi</a>
        <?php } ?>
    </div>
      <div class="clear"></div>
      <div class="cat-content">
        <?php
          $mottin = TinMoiNhat_TheoLoaiTin_MotTin($idLT);
          $row_mottin = mysqli_fetch_assoc($mottin);
          // var_dump($row5);die;
        ?>
          <div class="col1">
            <div class="news">
              <h3 class="title" >
                <a href="index.php?p=chitiettin&idTin=<?php echo (count($row5) > 0) ? $row5[0][0] : 0 ?>">
                  <?php echo (count($row5) > 0) ? $row5[0][1] : ""; ?>
                </a>
              </h3>
              <img class="images_news" src="upload/tintuc/<?php echo (count($row5) > 0) ? $row5[0][4] : ""; ?>" align="left" />
              <div class="des">
                <?php echo (count($row5) > 0) ? $row5[0][3] : ""; ?>  
              </div>
              <div class="clear"></div>          
            </div>
          </div>
      <div class="col2">
        <?php
          foreach($row5 as $key => $r5) {
          if($key > 0){
        ?>
          <h3 class="tlq">
            <a href="index.php?p=chitiettin&idTin=<?php echo $r5[0] ?>">
              <?php echo $r5[1]; ?>
            </a>
          </h3>  
        <?php
          }}
        ?>
      </div> 
    </div>
  </div>
</div>
<div class="clear"></div>
<!-- //box cat -->

<!-- box cat -->
<?php
  $idLT = rand(1,40);
?>
<div class="box-cat">
	<div class="cat">
    <div class="main-cat">
      <?php 
          if( !isset($_POST['confirm'])) {
        ?>
          <a href="index.php?p=tintrongloai&idLT=<?php echo $idLT ?>"><?php echo TenLoaiTin($idLT) ?></a>
        <?php 
        }else {
          foreach($row3 as $key => $r3) {
        ?>
        <a href="#">Gợi ý theo sở thích</a>
        <?php
          }
        }
        ?> 
    </div>
      <div class="clear"></div>
      <div class="cat-content">
        <?php
          $mottin = TinMoiNhat_TheoLoaiTin_MotTin($idLT);
          $row_mottin = mysqli_fetch_assoc($mottin);
        ?>
          <div class="col1">
            <div class="news">
              <h3 class="title" >
                <a href="index.php?p=chitiettin&idTin=<?php echo $row_mottin['idTin'] ?>">
                  <?php echo $row_mottin['TieuDe']; ?>
                </a>
              </h3>
              <img class="images_news" src="upload/tintuc/<?php echo $row_mottin['urlHinh']; ?>" align="left" />
              <div class="des">
                <?php echo $row_mottin['TomTat']; ?>  
              </div>
              <div class="clear"></div>          
            </div>
          </div>
      <div class="col2">
        <?php
          $tinmoi_bontin = TinMoiNhat_TheoLoaiTin_BonTin($idLT);
            while ( $row_tinmoi_bontin = mysqli_fetch_assoc($tinmoi_bontin) ) {
        ?>
          <h3 class="tlq">
            <a href="index.php?p=chitiettin&idTin=<?php echo $row_tinmoi_bontin['idTin'] ?>">
              <?php echo $row_tinmoi_bontin['TieuDe']; ?>
            </a>
          </h3>  
        <?php
          };
        ?>
      </div> 
    </div>
  </div>
</div>
<div class="clear"></div>
<!-- //box cat -->




