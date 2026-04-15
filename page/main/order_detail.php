<?php
session_start();
include("../../admin/config/config.php");

if(!isset($_GET['code'])){
    echo "Không có mã đơn";
    exit();
}

$code=$_GET['code'];

$sql="SELECT * FROM tbl_cart_details ctd 
JOIN tbl_sanpham sp ON ctd.id_sanpham=sp.id_sanpham
WHERE ctd.code_cart='$code'";
$query=mysqli_query($mysqli,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Chi tiết đơn hàng</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
<div class="card shadow p-4">
<h3>Chi tiết đơn hàng #<?php echo $code ?></h3>

<table class="table">
<tr><th>Sản phẩm</th><th>SL</th><th>Giá</th></tr>

<?php while($row=mysqli_fetch_array($query)){ ?>
<tr>
<td><?php echo $row['tensanpham'] ?></td>
<td><?php echo $row['soluongmua'] ?></td>
<td><?php echo number_format($row['giasp']) ?> VND</td>
</tr>
<?php } ?>

</table>

<a href="../../index.php" class="btn btn-success">Về trang chủ</a>

</div>
</div>

</body>
</html>