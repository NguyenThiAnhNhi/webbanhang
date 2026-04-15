<?php
    include("../../config/config.php");
    if (isset($_GET['cart_status'])&& isset($_GET['code'])) {
        $cart_status = $_GET['cart_status'];
        $code = $_GET['code'];
        $sql_update = "UPDATE tbl_cart SET cart_status='" . $cart_status . "' WHERE code_cart='" . $code . "'";
        mysqli_query($mysqli, $sql_update);
        header('Location:../../index.php?action=donhang&query=lietke');
    } else {
        $cart_status = 'Đã xử lý';
        $code = 'Đã xử lý';
    }
?>