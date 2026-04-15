<?php
if(isset($_POST['timkiem'])){ 
    $tukhoa = $_POST['tukhoa'];
}else {
    $tukhoa = '';
}
    $sql_pro = "SELECT * FROM tbl_sanpham, tb_danhmuc WHERE tbl_sanpham.id_danhmuc = tb_danhmuc.id_danhmuc AND tbl_sanpham.tensanpham LIKE '%" . $tukhoa . "%' ORDER BY tbl_sanpham.id_sanpham DESC";
    $query_pro = mysqli_query($mysqli, $sql_pro);
?>
    <h1>Từ khóa tìm kiếm: <?php echo $tukhoa; ?></h1>
                <ul class="product_list">
                    <?php
                        while($row = mysqli_fetch_array($query_pro)){
                    ?>
                        <li>
                        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                            <img src="admin/module/qlsanpham/uploads/<?php echo $row['hinhanh'] ?>">
                            <p class="Ten_san_pham">Tên sản phẩm: <?php echo $row['tensanpham'] ?></p>
                            <p class="Gia_san_pham">Giá: <?php echo number_format($row['giasp'], 0, ',', '.'). 'vnđ' ?></p>
                            <p style="text-align: center; color: #857e7e;"><?php echo $row['tendanhmuc'] ?></p>
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>