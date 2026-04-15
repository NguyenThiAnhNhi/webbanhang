<?php
    $sql_lietke_danhmuc = "SELECT * FROM tb_danhmuc ORDER BY thutu DESC";
    $query_lietke_danhmuc = mysqli_query($mysqli, $sql_lietke_danhmuc);
?>
<p>Liệt kê danh mục sản phẩm</p>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Quản lý</th>
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_danhmuc)) {
      $i++;
    ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['tendanhmuc'] ?></td>
            <td>
                <a href="index.php?action=quanlidanhmuc&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Sửa</a> | <a href="module/qldanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Xóa</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>