<?php
$sql_danhmuc = "SELECT * FROM tb_danhmuc ORDER BY id_danhmuc DESC";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);

?>
<?php
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['tenkhachhang']);
}

?>
<div class="menu">
    <ul class="list_menu">
        <li><a href="index.php">Trang chủ</a></li>
        <li><a href="index.php?quanly=gioithieu">Giới thiệu</a></li>
        <li class="dropdown">
            <a href="#">Danh mục</a>
            <ul class="dropdown-menu">
                <?php
                $sql_danhmuc_drop = "SELECT * FROM tb_danhmuc ORDER BY id_danhmuc DESC";
                $query_danhmuc_drop = mysqli_query($mysqli, $sql_danhmuc_drop);
                while ($row_danhmuc_drop = mysqli_fetch_array($query_danhmuc_drop)) { ?>
                    <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc_drop['id_danhmuc'] ?>"><?php echo $row_danhmuc_drop['tendanhmuc'] ?></a></li>
                <?php } ?>
            </ul>
        </li>

        <li><a href="index.php?quanly=tintuc">Tin tức</a></li>
        <li><a href="index.php?quanly=lienhe">Liên hệ</a></li>
        <li><a href="index.php?quanly=giohang">Giỏ hàng</a></li>
        <li><a href="index.php?quanly=dangnhap">Đăng nhập</a></li>
        <?php
        if (isset($_SESSION['tenkhachhang'])) {
        ?>
            <li><a href="index.php?dangxuat=1">Đăng xuất</a></li>
            <li><a href="index.php?quanly=thaydoimatkhau">Thay đổi mật khẩu</a></li>
        <?php
        } else {
        ?>
        <li><a href="index.php?quanly=dangky">Đăng ký</a></li>
        <?php
        }
        ?>
        <!-- <li><a href="index.php?quanly=dangxuat">Đăng xuất</a></li> -->
    </ul>
    <form class="search-form" action="index.php?quanly=timkiem" method="POST">
        <input type="text" placeholder="Tìm kiếm sản phẩm..." name="tukhoa">
        <input type="submit" name="timkiem" value="Tìm kiếm">
        <a href="page/main/ai_suggest.php">🐾 Gợi ý</a>
    </form>
    
</div>