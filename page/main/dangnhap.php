<?php
if(isset($_POST['dangnhap'])){
    $email = $_POST['email'];
    $matkhau = $_POST['matkhau'];

    $sql = "SELECT * FROM tbl_dangky WHERE email='$email' AND matkhau='$matkhau' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);

    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_array($query);

        $_SESSION['dangky'] = $row['tenkhachhang'];
        $_SESSION['tenkhachhang'] = $row['tenkhachhang'];

         // ✅ redirect chuẩn
        header('Location: index.php');
        exit();
    } else {
        echo '<p style="color:red">Email hoặc mật khẩu không đúng</p>';
    }

}
?>

<div class="login-container">
    <form action="index.php?quanly=dangnhap" method="POST" class="login-form">
        <h3>Đăng nhập khách hàng</h3>
        <div class="login-field">
            <label for="email">Email</label>
            <input id="email" type="text" name="email" placeholder="Email..." required>
        </div>
        <div class="login-field">
            <label for="matkhau">Mật khẩu</label>
            <input id="matkhau" type="password" name="matkhau" placeholder="Mật khẩu..." required>
        </div>
        <div class="login-action">
            <button type="submit" name="dangnhap">Đăng nhập</button>
        </div>
    </form>
</div>

