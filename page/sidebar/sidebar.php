<?php 
    $sql_danhmuc = "SELECT * FROM tb_danhmuc ORDER BY id_danhmuc DESC";
    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
?>
<div class="sidebar">
<ul class="list_sidebar">
<?php
    while($row = mysqli_fetch_array($query_danhmuc)){ 
?>
<li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc'] ?>"><?php echo $row['tendanhmuc'] ?></a></li>
<?php 
    }
?>
</ul>
</div>