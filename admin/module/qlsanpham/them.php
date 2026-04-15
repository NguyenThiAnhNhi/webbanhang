<p>Thêm sản phẩm</p>
<table class="bangsanpham" border="1" WIDTH="100%" style="border-collapse: collapse;">
  <form class="formsanpham" method="post" action="module/qlsanpham/xuly.php" enctype="multipart/form-data">
    <tr>
        <td>Tên sản phẩm</td>
        <td><input type="text" name="tensanpham"></td>
    </tr>
    <tr>
        <td>Mã sản phẩm</td>
        <td><input type="text" name="masp"></td>
    </tr>
    <tr>
        <td>Giá sản phẩm</td>
        <td><input type="text" name="giasp"></td>
    </tr>
    <tr>
        <td>Số lượng</td>
        <td><input type="text" name="soluong"></td>
    </tr>
    <tr>
        <td>Ảnh sản phẩm</td>
        <td><input type="file" name="hinhanh"></td>
    </tr>
    <tr>
        <td>Thông tin sản phẩm</td>
        <td><textarea rows="10" name="thongtin" style="resize: none;"></textarea></td>
    </tr>
    <tr>
        <td>Mô tả sản phẩm</td>
        <td><textarea rows="10" name="noidung" style="resize: none;"></textarea></td>
    </tr>
    <tr>
        <td>Danh mục sản phẩm </td>
        <td>
            <select name="danhmuc">
            <?php
              $sql_danhmuc = "SELECT * FROM tb_danhmuc ORDER BY id_danhmuc DESC";
              $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
            ?>
                <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
            <?php
                }
            ?>
        </select>
    </td>
    </tr>
    <tr>
        <td>Tình trạng sản phẩm</td>
        <td><select name="tinhtrang">
            <option value="1">Còn hàng</option>
            <option value="0">Hết hàng</option>
        </select></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center;"><input type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
    </tr>
  </form>
</table>