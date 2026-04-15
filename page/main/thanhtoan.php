<?php
session_start();
include("../../admin/config/config.php");

if(!isset($_SESSION['cart'])){
    echo "Không có sản phẩm!";
    exit();
}

if(isset($_POST['dathang'])){
    $ten=$_POST['ten'];
    $email=$_POST['email'];
    $dienthoai=$_POST['dienthoai'];
    $diachi=$_POST['diachi'];
    $hinhthuc=$_POST['hinhthuc'];


    $id_khachhang=$_SESSION['id_khachhang'];
    $code_cart=rand(1000,9999);


    $tongtien=0;
    foreach($_SESSION['cart'] as $value){
        $tongtien += $value['soluong'] * $value['giasp'];
    }

    mysqli_query($mysqli,"INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status)
    VALUES('$id_khachhang','$code_cart',1)");

    foreach($_SESSION['cart'] as $value){
    $id_sanpham = $value['id'];
    $soluongmua = $value['soluong'];

    // kiểm tra tồn kho
    $sql_check = "SELECT soluong FROM tbl_sanpham WHERE id_sanpham = $id_sanpham";
    $query_check = mysqli_query($mysqli, $sql_check);
    $row_check = mysqli_fetch_array($query_check);

    if($row_check['soluong'] >= $soluongmua){
        // trừ kho
        $sql_update = "UPDATE tbl_sanpham 
                       SET soluong = soluong - $soluongmua 
                       WHERE id_sanpham = $id_sanpham";
        mysqli_query($mysqli, $sql_update);
    } else {
        echo "Sản phẩm không đủ số lượng!";
        exit();
    }
}

    foreach($_SESSION['cart'] as $value){
        mysqli_query($mysqli,"INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua)
        VALUES('{$value['id']}','$code_cart','{$value['soluong']}')");
    }

    unset($_SESSION['cart']);
    header("Location: order_detail.php?code=$code_cart");
}
?>
<?php       
$id_khachhang = $_SESSION['id_khachhang'];
$sql_user = "SELECT * FROM tbl_dangky WHERE id_dangky='$id_khachhang' LIMIT 1";
$query_user = mysqli_query($mysqli, $sql_user);
$row_user = mysqli_fetch_array($query_user);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Thanh toán</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
<div class="row">

<div class="col-md-6">
<div class="card shadow p-4">
<h4>Thông tin thanh toán</h4>
<form method="POST">
    <input class="form-control mb-2" name="ten"
    value="<?php echo $row_user['tenkhachhang'] ?>" required>

    <input class="form-control mb-2" name="email"
    value="<?php echo $row_user['email'] ?>" required>

    <input class="form-control mb-2" name="dienthoai"
    value="<?php echo $row_user['dienthoai'] ?>" required>

    <input class="form-control mb-2" name="diachi"
    value="<?php echo $row_user['diachi'] ?>" required>

    <select class="form-control mb-3" name="hinhthuc">
    <option value="cod">Thanh toán khi nhận hàng</option>
    <!-- <option value="vnpay">Thanh toán VNPay</option> -->
    </select>

<button class="btn btn-primary w-100" name="dathang">Mua hàng</button>
</form>
</div>
</div>

<div class="col-md-6">
<div class="card shadow p-4">
<h4>Đơn hàng của bạn</h4>
<table class="table">
<tr><th>Tên</th><th>SL</th><th>Giá</th></tr>


<?php
$tong = 0;
foreach($_SESSION['cart'] as $v){
    $thanhtien = $v['soluong'] * $v['giasp'];
    $tong += $thanhtien;
?>
<tr>
    <td><?php echo $v['tensanpham'] ?></td>
    <td><?php echo $v['soluong'] ?></td>
    <td><?php echo number_format($thanhtien) ?> VND</td>
</tr>
<?php } ?>

<tr>
<td colspan="2"><b>Tổng</b></td>
 <td><?php echo number_format($tong, 0, ',', '.') ?> VND</td>
</tr>
</table>
</div>
</div>

</div>
</div>

</body>
</html>
