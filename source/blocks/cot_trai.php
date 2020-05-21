<div class="box-cat">
	<div class="cat">
    <div class="main-cat">
      <a href="#">Tin xem nhiều nhất</a>
    </div>
    <div class="clear"></div>
    <div class="cat-content">
      <?php
        $tinxemnhieunhat = TinXemNhieuNhat();
          while ( $row_tinxemnhieunhat = mysqli_fetch_assoc($tinxemnhieunhat) ) {
      ?>
        <div class="col1">
          <div class="news">
            <img class="images_news" src="upload/tintuc/<?php echo $row_tinxemnhieunhat['urlHinh'] ?>"  />
            <h3 class="title" >
              <a href="index.php?p=chitiettin&idTin=<?php echo $row_tinxemnhieunhat['idTin'] ?>"><?php echo $row_tinxemnhieunhat['TieuDe'] ?></a>
              <br>
              <span class="hit"><?php echo $row_tinxemnhieunhat['SoLanXem'] ?></span>
            </h3>
            <div class="clear"></div>
          </div>
        </div>
      <?php
        };
      ?>
    </div>
  </div>
</div>
<div class="clear"></div>

