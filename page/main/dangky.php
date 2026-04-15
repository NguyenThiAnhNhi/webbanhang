<?php
if(isset($_POST['dangky'])){
    $tenkhachhang = $_POST['hoten'];
    $email = $_POST['email'];
    $matkhau = $_POST['matkhau'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];

    // Kiểm tra email đã tồn tại chưa
    $sql_check = "SELECT * FROM tbl_dangky WHERE email='$email' LIMIT 1";
    $query_check = mysqli_query($mysqli, $sql_check);

    if(mysqli_num_rows($query_check) > 0){
        echo "<p style='color:red'>Email đã tồn tại!</p>";
    } else {
        $sql_dangky = "INSERT INTO tbl_dangky(tenkhachhang,email,matkhau,dienthoai,diachi)
                       VALUES('$tenkhachhang','$email','$matkhau','$dienthoai','$diachi')";
        $query_dangky = mysqli_query($mysqli, $sql_dangky);

        if($query_dangky){
            // Lấy ID vừa tạo
            $id_moi = mysqli_insert_id($mysqli);

            // Lưu session luôn, không cần đăng nhập lại
            $_SESSION['id_khachhang'] = $id_moi;
            $_SESSION['tenkhachhang'] = $tenkhachhang;

             // Dùng JS redirect thay vì header() vì HTML đã được xuất trước rồi
            echo "<p style='color:green'>Đăng ký thành công!</p>";
            echo "<script>window.location.href='index.php';</script>";
            exit();
        } else {
            echo "<p style='color:red'>Đăng ký thất bại, vui lòng thử lại!</p>";
        }
    }
}
?>

<div class="register-container">
    <div class="register-box">
        <h2>Đăng ký tài khoản</h2>

        <form method="POST">
            <div class="input-group">
                <input type="text" name="hoten" required>
                <label>Họ và tên</label>
            </div>

            <div class="input-group">
                <input type="email" name="email" required>
                <label>Email</label>
            </div>

            <div class="input-group">
                <input type="password" name="matkhau" required>
                <label>Mật khẩu</label>
            </div>

            <div class="input-group">
                <input type="text" name="dienthoai">
                <label>Điện thoại</label>
            </div>

            <div class="input-group">
                <input type="text" name="diachi">
                <label>Địa chỉ</label>
            </div>

            <button type="submit" name="dangky" class="btn-register">
                Đăng ký
            </button>
        </form>
        <p style="margin-top:15px;">
            Đã có tài khoản? 
            <a href="index.php?quanly=dangnhap">Đăng nhập</a>
        </p>
    </div>
</div>