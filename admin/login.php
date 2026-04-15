<?php
    session_start();
    include('../admin/config/config.php');
    if(isset($_POST['dangnhap'])){
        $taikhoan = $_POST['username'];
        $matkhau = $_POST['password'];
        $sql = "SELECT * FROM tb_admin WHERE username='$taikhoan' AND password='$matkhau' LIMIT 1";
        $row = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row);
        if($count > 0){
            $_SESSION['dangnhap'] = $taikhoan;
            header('Location:../admin/index.php');
        } else {
            echo '<p style="color:red">Tài khoản hoặc mật khẩu sai, vui lòng nhập lại.</p>';
            header('Location:../admin/login.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập admin</title>
    <style type="text/css">
       body {
            background: linear-gradient(135deg, #b7bac8 0%, #c9cfdb 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .wrapper-login {
            width: 80%;
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        }

        .wrapper-login h3 {
            text-align: center;
            color: #0d23e7;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 28px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #666;
            font-size: 18px;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box; /* Đảm bảo padding không làm tràn input */
            outline: none;
            transition: border-color 0.3s;
        }

        .form-group input:focus {
            border-color: #764ba2;
        }

        .btn-login {
            width: 50%;
            padding: 12px;
            background: #4b64a2;
            border: none;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 10px;
            transform: translate(50%, -50%);
        }

        .btn-login:hover {
            background: #5a3782;
        }
    </style>
</head>
<body>
    <div class="wrapper-login">
    <form action="" autocomplete="off" method="POST">
        <h3>Quản trị hệ thống</h3>
        
        <div class="form-group">
            <label>Tài khoản</label>
            <input type="text" name="username" placeholder="Nhập tài khoản..." required>
        </div>

        <div class="form-group">
            <label>Mật khẩu</label>
            <input type="password" name="password" placeholder="Nhập mật khẩu..." required>
        </div>

        <input type="submit" name="dangnhap" class="btn-login" value="ĐĂNG NHẬP">
    </form>

</div>
</body>    
</html>