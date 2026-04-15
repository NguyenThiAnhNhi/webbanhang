<?php
include("../../config/config.php");
// Xử lý thêm danh mục sản phẩm vào cơ sở dữ liệu
    $tendanhmuc = $_POST['tendanhmuc'];
    $thutu = $_POST['thutu'];
if (isset($_POST['themdanhmuc'])) {
    $sql_them = "INSERT INTO tb_danhmuc (tendanhmuc, thutu) VALUES ('$tendanhmuc', '$thutu')";
    mysqli_query($mysqli, $sql_them);
    header("Location:../../index.php?action=quanlidanhmuc&query=them");
} 
elseif (isset($_POST['suadanhmuc'])) {
    $id = $_GET['iddanhmuc'];
    $sql_sua = "UPDATE tb_danhmuc SET tendanhmuc='$tendanhmuc', thutu='$thutu' WHERE id_danhmuc='$id'";
    mysqli_query($mysqli, $sql_sua);
    header("Location:../../index.php?action=quanlidanhmuc&query=them");
} 
elseif (isset($_GET['iddanhmuc'])) {
    $id = $_GET['iddanhmuc'];
    $sql_xoa = "DELETE FROM tb_danhmuc WHERE id_danhmuc='$id'";
    mysqli_query($mysqli, $sql_xoa);
    header("Location:../../index.php?action=quanlidanhmuc&query=them");
}

?>