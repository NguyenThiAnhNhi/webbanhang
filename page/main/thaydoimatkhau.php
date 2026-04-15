<?php
    if(isset($_POST['doimatkhau'])){
        $taikhoan = $_POST['email'];
        $matkhau_cu = $_POST['password_cu'];
        $matkhau_moi = $_POST['password_moi'];
        $sql = "SELECT * FROM tbl_dangky WHERE email='$taikhoan' AND matkhau='$matkhau_cu' LIMIT 1";
        $row = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row);
        if($count > 0){
            $sql_update = "UPDATE tbl_dangky SET matkhau='$matkhau_moi' WHERE email='$taikhoan'";
            mysqli_query($mysqli, $sql_update);
            echo '<p class="message message-success">Đổi mật khẩu thành công.</p>';
        } else {
            echo '<p class="message message-error">Tài khoản hoặc mật khẩu sai, vui lòng nhập lại.</p>';
        }
    }
?>

<style>
    .change-password-box {
        max-width: 420px;
        margin: 20px auto;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 28px rgba(0,0,0,0.15);
        padding: 24px;
        border: 1px solid #e1e4e8;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .change-password-box h3 {
        margin: 0 0 18px;
        text-align: center;
        color: #1f3a70;
        letter-spacing: 0.5px;
    }
    .form-row {
        margin-bottom: 14px;
    }
    .form-row label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: #333;
        font-size: 14px;
    }
    .form-row input {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #c3cfd8;
        border-radius: 8px;
        font-size: 14px;
        box-sizing: border-box;
        transition: border-color .25s ease, box-shadow .25s ease;
    }
    .form-row input:focus {
        border-color: #4978d0;
        box-shadow: 0 0 0 3px rgba(73, 120, 208, 0.16);
        outline: none;
    }
    .form-actions {
        text-align: center;
        margin-top: 18px;
    }
    .form-actions input[type="submit"] {
        cursor: pointer;
        width: 100%;
        padding: 11px 16px;
        border: none;
        border-radius: 8px;
        background: linear-gradient(130deg, #2163d2, #4480f2);
        color: white;
        font-weight: 700;
        font-size: 15px;
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .form-actions input[type="submit"]:hover {
        transform: translateY(-1px);
        box-shadow: 0 8px 18px rgba(33, 99, 210, 0.35);
    }
    .message {
        text-align: center;
        margin-bottom: 12px;
        padding: 9px 12px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
    }
    .message-success { background: #e6f6ea; color: #1f7e30; border: 1px solid #b8e4c5; }
    .message-error { background: #fde8e8; color: #b12e2e; border: 1px solid #f2b2b2; }
</style>

<div class="change-password-box">
    <h3>Đổi mật khẩu</h3>
    <form action="" autocomplete="off" method="POST">
        <div class="form-row">
            <label for="email">Tài khoản (Email)</label>
            <input id="email" type="email" name="email" placeholder="Nhập email" required>
        </div>
        <div class="form-row">
            <label for="password_cu">Mật khẩu cũ</label>
            <input id="password_cu" type="password" name="password_cu" placeholder="Nhập mật khẩu cũ" required>
        </div>
        <div class="form-row">
            <label for="password_moi">Mật khẩu mới</label>
            <input id="password_moi" type="password" name="password_moi" placeholder="Nhập mật khẩu mới" required>
        </div>
        <div class="form-actions">
            <input type="submit" name="doimatkhau" value="Đổi mật khẩu">
        </div>
    </form>
</div>