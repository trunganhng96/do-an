<div class="thongtin-title">
	<div class="right">
    
          <!-- <a href="#"><span class="SetHomePage ico_respone_01">&nbsp;</span>Đặt VnExpress làm trang chủ</a> -->
          
          <a href="#"><span class="top">&nbsp;</span>Về đầu trang</a>
       
    </div>
</div>

<div class="thongtin-content">
   <?php
   $theloai = DanhSachTheLoai();
   while ( $row_theloai = mysqli_fetch_assoc($theloai) ) {
      $idTL = $row_theloai['idTL'];
   ?>
	<ul class="ulBlockMenu">
      <li class="liFirst">
         <h2>
            <h4 class="mnu_giaoduc"><?php echo $row_theloai['TenTL'] ?></h4>
         </h2>
      </li>
      <?php
         $loaitin = DanhSachLoaiTin_TheoTheLoai($idTL);
         while( $row_loaitin = mysqli_fetch_assoc($loaitin) ) {

      ?>
      <li class="liFollow">
         <h2>
            <a href="./index.php?p=tintrongloai&idLT=<?php echo $row_loaitin['idLT'] ?>"><?php echo $row_loaitin['Ten'] ?></a>
         </h2>
      </li>
      <?php
         };
      ?>
   </ul>   
   <?php
      };
   ?>
</div>



