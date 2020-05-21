<?php
// ob_start();
// session_start();
// if( !isset($_SESSION["idUser"]) && $_SESSION["idGroup"]!=1 ) {
//     header("location:../source/index.php");
// }

require "../source/lib/dbCon.php";
require "../source/lib/quantri.php";
?>

<?php
    if( isset($_POST["them"]) ) {
        $TieuDe = $_POST["TieuDe"];
        $TieuDe_KhongDau = changeTitle($TieuDe);
        $TomTat = $_POST["TomTat"];
        $urlHinh = $_POST["urlHinh"];
        $idUser = $_POST["idUser"];
            settype($idUser, "int");
        $SoLanXem = $_POST["SoLanXem"];
            settype($SoLanXem, "int");
        $Content = $_POST["Content"];
        $TinNoiBat = $_POST["TinNoiBat"];
            settype($TinNoiBat, "int");
        $AnHien = $_POST["AnHien"];
            settype($AnHien, "int");
        $idTL = $_POST["idTL"];
            settype($idTL, "int");
        $idLT = $_POST["idLT"];
            settype($idLT, "int");
        $mysqli = mysqli_connect("localhost", "root", "", "vnexpress");
        $qr = mysqli_query($mysqli, "INSERT INTO tin VALUES(null, '$TieuDe', '$TieuDe_KhongDau', '$TomTat', '$AnHien', '$idTL', '$urlHinh', '$idUser', '$SoLanXem', '$Content', '$TinNoiBat', '$idLT')");
        header("location:listTin.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quan Tri</title>
    <link rel="stylesheet" type="text/css" href= "layout2.css">
    <link rel="stylesheet" type="text/css" href= "layout.css" />
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="ckefinder/ckfinder.js"></script>
    <script type="text/javascript">
        function BrowseServer( startupPath, functionData ){
            var finder = new CKFinder();
            finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
            finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
            finder.selectActionFunction = SetFileField; // hàm sẽ được gọi khi 1 file được chọn
            finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
            //finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn	
            finder.popup(); // Bật cửa sổ CKFinder
        } //BrowseServer

        function SetFileField( fileUrl, data ){
            document.getElementById( data["selectActionData"] ).value = fileUrl;
        }
        function ShowThumbnails( fileUrl, data ){	
            var sFileName = this.getSelectedFile().name; // this = CKFinderAPI
            document.getElementById( 'thumbnails' ).innerHTML +=
            '<div class="thumb">' +
            '<img src="' + fileUrl + '" />' +
            '<div class="caption">' +
            '<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
            '</div>' +
            '</div>';
            document.getElementById( 'preview' ).style.display = "";
            return false; // nếu là true thì ckfinder sẽ tự đóng lại khi 1 file thumnail được chọn
        }
    </script>
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
                <form method="POST">
                    <table width="500px" border="1" cellspacing="0" cellpadding="0">
                        <tr>THEM TIN</tr>
                        <tr>
                            <td>TieuDe</td>
                            <td><input type="text" id="TieuDe" name="TieuDe"></td>
                        </tr>
                        <tr>
                            <td>TomTat</td>
                            <td><textarea cols="45" rows="5" id="TomTat" name="TomTat"></textarea></td>
                        </tr>
                        <tr>
                            <td>urlHinh</td>
                            <td>
                                <input type="text" id="urlHinh" name="urlHinh">
                                <input type="button" id="ChonHinh" name="ChonHinh" value="ChonHinh" onclick="BrowseServer('Images:/','urlHinh')">
                            </td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>
                                <textarea id="Content" name="Content"></textarea>
                                <script type="text/javascript">
                                    var editor = CKEDITOR.replace( 'Content',{
                                        uiColor : '#9AB8F3',
                                        language:'vi',
                                        skin:'v2',
                                        filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
                                        filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
                                        filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                        filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',			 	
                                        toolbar:[
                                        ['Source','-','Save','NewPage','Preview','-','Templates'],
                                        ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
                                        ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
                                        ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
                                        ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
                                        ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
                                        ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
                                        ['Link','Unlink','Anchor'],
                                        ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
                                        ['Styles','Format','Font','FontSize'],
                                        ['TextColor','BGColor'],
                                        ['Maximize', 'ShowBlocks','-','About']
                                        ]
                                    });		
                                </script>
                            </td>
                        </tr>
                        <tr>
                            <td>idTL</td>
                            <td>
                                <select name="idTL" id="idTL">
                                    <?php
                                        $theloai = DanhSachTheLoai();
                                        while( $row_theloai = mysqli_fetch_assoc($theloai) ) {
                                    ?>
                                    <option value="<?php echo $row_theloai["idTL"] ?>"><?php echo $row_theloai["TenTL"] ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>idLT</td>
                            <td>
                                <select name="idLT" id="idLT">
                                    <?php
                                        $loaitin = DanhSachLoaiTin();
                                        while( $row_loaitin = mysqli_fetch_assoc($loaitin) ) {
                                    ?>
                                    <option value="<?php echo $row_loaitin["idLT"] ?>"><?php echo $row_loaitin["Ten"] ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>    
                            <td>TinNoiBat</td>
                            <td>
                                <input type="radio" name="TinNoiBat" id="TinNoiBat1" value="0">Noi Bat
                                <input type="radio" name="TinNoiBat" id="TinNoiBat0" value="1">Binh Thuong
                            </td>
                        </tr>
                        <tr>    
                            <td>AnHien</td>
                            <td>
                                <input type="radio" name="AnHien" id="AnHien0" value="0">An
                                <input type="radio" name="AnHien" id="AnHien1" value="1">Hien
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" id="them" name="them" value="them"></td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>

