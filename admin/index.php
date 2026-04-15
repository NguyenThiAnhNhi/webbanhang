<?php
session_start();

if(!isset($_SESSION['dangnhap'])) {
    header('Location: login.php');
    exit();
}

if(isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['dangnhap']);
    header('Location: login.php');
    exit();
}

?>
<?php
        include("config/config.php");
// Đếm sản phẩm
$sql_sp = "SELECT COUNT(*) as total FROM tbl_sanpham";
$query_sp = mysqli_query($mysqli, $sql_sp);
$row_sp = mysqli_fetch_assoc($query_sp);
$total_sp = $row_sp['total'];

// Đếm danh mục
$sql_dm = "SELECT COUNT(*) as total FROM tb_danhmuc";
$query_dm = mysqli_query($mysqli, $sql_dm);
$row_dm = mysqli_fetch_assoc($query_dm);
$total_dm = $row_dm['total'];

// Đếm đơn hàng
$sql_dh = "SELECT COUNT(*) as total FROM tbl_cart";
$query_dh = mysqli_query($mysqli, $sql_dh);
$row_dh = mysqli_fetch_assoc($query_dh);
$total_dh = $row_dh['total'];

// Đếm người dùng
$sql_user = "SELECT COUNT(*) as total FROM tbl_dangky";
$query_user = mysqli_query($mysqli, $sql_user);
$row_user = mysqli_fetch_assoc($query_user);
$total_user = $row_user['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/styleadmin.css">    
</head>
<body>
    <h3 class="title_admin">Trang chủ Admin</h3>
    <div class="wrapper">
    <?php
        include("module/header.php");
        include("module/menu.php");
        include("module/main.php");
        include("module/footer.php");
    ?>
    </div>
</body>
</html>