
<div class="menu">
<ul class="admin_list">
    <li><a href="index.php">Trang chủ</a></li>
    <li><a href="index.php?action=quanlidanhmuc&query=them">Quản lí danh mục </a></li>
    <li><a href="index.php?action=quanlisanpham&query=them">Quản lí sản phẩm </a></li>
    <!-- <li><a href="index.php?action=quanlikhachhang&query=them">Quản lí khách hàng </a></li> -->
    <!-- <li><a href="index.php?action=quanlitintuc&query=them">Quản lí tin tức </a></li> -->
    <li><a href="index.php?action=quanlidonhang&query=lietke">Quản lí đơn hàng </a></li>
    <li><a href="index.php?dangxuat=1">Đăng xuất: <?php if(isset($_SESSION['dangnhap'])) {echo $_SESSION['dangnhap']; } ?></a></li>
</ul>
</div>