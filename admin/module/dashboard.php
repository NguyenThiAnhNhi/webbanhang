
<?php
$total_user = $total_user ?? 0;
$total_sp = $total_sp ?? 0;
$total_dh = $total_dh ?? 0;
$total_dm = $total_dm ?? 0;
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang quản trị</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }
        .sidebar {
            width: 220px;
            height: auto;
            background: #2c3e50;
            color: #fff;
            position: fixed;
        }
        .sidebar h2 {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid #34495e;
        }
        .sidebar a {
            display: block;
            color: #ecf0f1;
            padding: 12px 20px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #34495e;
        }
        .main {
            margin-left: 220px;
            padding: 20px;
        }
        .header {
            background: #ffffff;
            padding: 5px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .card {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .logout {
            float: right;
            color: red;
        }
          .grid {
                display:grid;
                grid-template-columns: repeat(auto-fit,minmax(200px,1fr));
                gap:20px;
                margin-bottom:20px;
            }

            .box {
                background: pink;
                padding:20px;
                border-radius:10px;
                box-shadow:0 2px 8px rgba(0,0,0,0.08);
                text-align:center;
            }

            .box h2 {margin:0;font-size:28px;color:#333;}
            .box p {margin:5px 0;color:#888;}

            canvas {max-width:100%;}
    </style>
</head>
<body>

<div class="sidebar">
    <h2>ADMIN</h2>
    <a href="index.php">Trang chủ</a>
    <a href="index.php?action=quanlidanhmuc&query=them">Quản lý danh mục</a>
    <a href="index.php?action=quanlisanpham&query=them">Quản lý sản phẩm</a>
    <a href="index.php?action=quanlidonhang&query=lietke"> Quản lý Đơn hàng</a>
    <a href="index.php?dangxuat=1">Đăng xuất: <?php if(isset($_SESSION['dangnhap'])) {echo $_SESSION['dangnhap']; } ?></a>
</div>


<div class="main">

    <div class="header">
        <h2>👋 Xin chào Admin: <?php if(isset($_SESSION['dangnhap'])) {echo $_SESSION['dangnhap']; } ?></h2>
        <p>Chúc bạn một ngày làm việc hiệu quả 🚀</p>
    </div>

    <!-- Thống kê nhanh dạng box -->
   <div class="grid">
    <div class="box">
        <h2><?php echo $total_user; ?></h2>
        <p>Người dùng</p>
    </div>

    <div class="box">
        <h2><?php echo $total_sp; ?></h2>
        <p>Bạn đang có <?php echo $total_sp; ?> sản phẩm</p>
    </div>

    <div class="box">
        <h2><?php echo $total_dh; ?></h2>
        <p>Tổng đơn hàng</p>
    </div>

    <div class="box">
        <h2><?php echo $total_dm; ?></h2>
        <p>Danh mục</p>
    </div>
</div>

    <!-- Biểu đồ doanh thu
    <div class="card">
        <h3>📈 Doanh thu 7 ngày</h3>
        <canvas id="revenueChart"></canvas>
    </div> -->

    <!-- Biểu đồ sản phẩm -->
    <!-- <div class="card">
        <h3>📊 Sản phẩm bán chạy</h3>
        <canvas id="productChart"></canvas>
    </div> -->

</div>

<script>
// Doanh thu
new Chart(document.getElementById('revenueChart'), {
    type: 'line',
    data: {
        labels: ['T2','T3','T4','T5','T6','T7','CN'],
        datasets: [{
            label: 'Doanh thu',
            data: [120,190,300,250,220,400,350],
            borderWidth: 3,
            fill: false
        }]
    }
});

// Sản phẩm
new Chart(document.getElementById('productChart'), {
    type: 'bar',
    data: {
        labels: ['SP A','SP B','SP C','SP D'],
        datasets: [{
            label: 'Số lượng bán',
            data: [30,50,20,40],
            borderWidth: 1
        }]
    }
});
</script>

</body>
</html>
