<p style="text-align: center; font-size: 28px; font-weight: bold;">Chào mừng bạn đến với trang sản phẩm</p>
<?php
    $sql_chitiet = "SELECT * FROM tbl_sanpham, tb_danhmuc WHERE tbl_sanpham.id_danhmuc = tb_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham = ".$_GET['id']." LIMIT 1";
    $query_chitiet = mysqli_query($mysqli, $sql_chitiet);
    while($row_chitiet = mysqli_fetch_array($query_chitiet)){
?>
<div class="wrapper_chitiet">
    <div class="hinhanh_sanpham">
        <img src="admin/module/qlsanpham/uploads/<?php echo $row_chitiet['hinhanh'] ?>" alt="<?php echo $row_chitiet['tensanpham'] ?>">
    </div>
    <form method="POST" action="page/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>">
        <div class="chitiet_sanpham">
            <h3><?php echo $row_chitiet['tensanpham'] ?></h3>
            <p><span>Mã sản phẩm:</span> <?php echo $row_chitiet['masp'] ?></p>
            <p><span>Giá:</span> <?php echo number_format($row_chitiet['giasp'], 0, ',', '.'). ' vnđ' ?></p>
            <p><span>Số lượng:</span> <?php echo $row_chitiet['soluong'] ?></p>
            <!-- <p><span>Danh mục:</span> <?php echo $row_chitiet['tendanhmuc'] ?></p> -->
            <p><span>Thông tin sản phẩm:</span><br> <?php echo $row_chitiet['thongtin'] ?></p>
            <p><span>Mô tả chi tiết:</span> <br><?php echo $row_chitiet['noidung'] ?></p>
            <p><input class="themgiohang" name="themgiohang" type="submit" value="Thêm vào giỏ hàng"></p>
        </div>
    </form>

</div>
<?php
    }   
?>