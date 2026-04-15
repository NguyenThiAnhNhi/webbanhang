<?php
    $sql_lietke_sp = "SELECT * FROM tbl_sanpham, tb_danhmuc WHERE tbl_sanpham.id_danhmuc = tb_danhmuc.id_danhmuc ORDER BY giasp ASC";
    $query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
?>
<p>Liệt kê sản phẩm</p>
<table class="table">
    <tr>
        <th>Id</th>
        <th>Tên sản phẩm</th>
        <th>Mã sản phẩm</th>
        <th>Giá sản phẩm</th>
        <th>Số lượng</th>
        <th>Danh mục</th>
        <th>Ảnh sản phẩm</th>
        <th>Thông tin sản phẩm</th>
        <th>Mô tả sản phẩm</th>
        <th>Tình trạng</th>
        <th>Quản lý</th>
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_sp)){
      $i++;
    ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['tensanpham'] ?></td>
            <td><?php echo $row['masp'] ?></td>
            <td><?php echo $row['giasp'] ?></td>
            <td><?php echo $row['soluong'] ?></td>
            <td><?php echo $row['tendanhmuc'] ?></td>
            <td><img src="module/qlsanpham/uploads/<?php echo $row['hinhanh'] ?>" width="100px"></td>
            <td><?php echo $row['thongtin'] ?></td>
            <td><?php echo $row['noidung'] ?></td>
            <td><?php if($row['tinhtrang']==1){ 
                echo "Còn hàng"; 
                }
                else{ 
                    echo "Hết hàng"; } 
            ?></td>
            <td>
                <a href="index.php?action=quanlisanpham&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a> | <a href="module/qlsanpham/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Xóa</a>
            </td>
        </tr>
    <?php
    }
    ?>
   
</table>