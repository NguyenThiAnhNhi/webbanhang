<?php
    $sql_sua_danhmuc = "SELECT * FROM tb_danhmuc WHERE id_danhmuc = '".$_GET['iddanhmuc']."' LIMIT 1";
    $query_sua_danhmuc = mysqli_query($mysqli, $sql_sua_danhmuc);
?>
<p>Sửa danh mục sản phẩm</p>
<table class="form-table">
  <form method="post" action="module/qldanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>">
  <?php
    while ($dong = mysqli_fetch_array($query_sua_danhmuc)) { 
    ?> 
  <tr>
        <td>Tên danh mục</td>
        <td><input type="text" value="<?php echo $dong['tendanhmuc'] ?>" name="tendanhmuc"></td>
    </tr>
    <tr>
        <td>Thứ tự</td>
        <td><input type="text" value="<?php echo $dong['thutu'] ?>" name="thutu"></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center;"><input type="submit" name="suadanhmuc" value="Sửa danh mục"></td>
    </tr>
    <?php
    }
    ?>

  </form>
</table>