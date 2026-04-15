<?php
include("../../config/config.php");
// Xử lý thêm danh mục sản phẩm vào cơ sở dữ liệu
    $tensanpham = $_POST['tensanpham'];
    $masp = $_POST['masp'];
    $giasp = $_POST['giasp'];
    $soluong = $_POST['soluong'];
    //xử lý hình ảnh
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh = time().'_'.$hinhanh; // Đặt tên mới cho hình ảnh để tránh trùng lặp

    $thongtin = $_POST['thongtin'];
    $noidung = $_POST['noidung'];
    $tinhtrang = $_POST['tinhtrang'];
    $danhmuc = $_POST['danhmuc'];   

if (isset($_POST['themsanpham'])) {
    $sql_them = "INSERT INTO tbl_sanpham(tensanpham,masp,giasp,soluong,hinhanh,thongtin,noidung,tinhtrang,id_danhmuc) VALUES ('$tensanpham', '$masp', '$giasp', '$soluong', '$hinhanh', '$thongtin', '$noidung', '$tinhtrang', '$danhmuc')";
    mysqli_query($mysqli, $sql_them);
    move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh); // Di chuyển hình ảnh vào thư mục uploads
    header("Location:../../index.php?action=quanlisanpham&query=them");
} 
//sửa sản phẩm
elseif (isset($_POST['suasanpham'])) {
    $id = $_GET['idsanpham'];
    if($hinhanh != '') {
        move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh); // Di chuyển hình ảnh mới vào thư mục uploads
        $sql_update = "UPDATE tbl_sanpham SET tensanpham='$tensanpham', masp='$masp', giasp='$giasp', soluong='$soluong', hinhanh='$hinhanh', thongtin='$thongtin', noidung='$noidung', tinhtrang='$tinhtrang', id_danhmuc='$danhmuc' WHERE id_sanpham='$id'";
        // Xóa hình ảnh cũ khỏi thư mục uploads
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$id' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);   
        while ($row = mysqli_fetch_array($query)) {
            unlink('uploads/'.$row['hinhanh']); 
        }
    } else {
        $sql_update = "UPDATE tbl_sanpham SET tensanpham='$tensanpham', masp='$masp', giasp='$giasp', soluong='$soluong', thongtin='$thongtin', noidung='$noidung', tinhtrang='$tinhtrang', id_danhmuc='$danhmuc' WHERE id_sanpham='$id'";
    }

    mysqli_query($mysqli, $sql_update);
    header("Location:../../index.php?action=quanlisanpham&query=them");
} 
elseif (isset($_GET['idsanpham'])) {
    $id = $_GET['idsanpham'];
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('uploads/'.$row['hinhanh']); // Xóa hình ảnh cũ khỏi thư mục uploads
    }
    $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham='$id'";
    mysqli_query($mysqli, $sql_xoa);
    header("Location:../../index.php?action=quanlisanpham&query=them");
}

?>