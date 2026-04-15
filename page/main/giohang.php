<div class="cart-container">
<div class="cart-header">
    <h2>Giỏ hàng của bạn</h2>
    <?php
    if(isset($_SESSION['tenkhachhang'])){
        echo '<p class="user-info">Xin chào: <span>' . $_SESSION['tenkhachhang'] . '</span></p>';
    } else {
        echo '<p class="user-info">Bạn chưa đăng ký hoặc đăng nhập</p>';
    }
    ?>
</div>

<?php
    if(isset($_SESSION['cart'])) {
?>
<?php
    }
?>
<div class="cart-table-wrapper">
<table class="cart-table">
  <thead>
    <tr>
      <th>STT</th>
      <th>Mã SP</th>
      <th>Tên sản phẩm</th>
      <th>Hình ảnh</th>
      <th>Số lượng</th>
      <th>Giá</th>
      <th>Thành tiền</th>
      <th>Hành động</th>
    </tr>
  </thead>
  <tbody>
  <?php
    if(isset($_SESSION['cart'])){
        $i = 0;
        $tongtien = 0;
        foreach($_SESSION['cart'] as $cart_item){
            $thanhtien = $cart_item['giasp'] * $cart_item['soluong'];
            $tongtien += $thanhtien;
            $i++;
    ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td class="item-sku"><?php echo $cart_item['masp'] ?></td>
      <td class="item-name"><?php echo $cart_item['tensanpham'] ?></td>
      <td class="item-image"><img src="admin/module/qlsanpham/uploads/<?php echo $cart_item['hinhanh'] ?>" alt="<?php echo $cart_item['tensanpham'] ?>"></td>
      <td class="item-quantity">
        <div class="qty-control">
            <a href="page/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>" class="qty-btn">−</a>
            <span><?php echo $cart_item['soluong'] ?></span>
            <a href="page/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>" class="qty-btn">+</a>
        </div>
      </td>
      <td class="item-price"><?php echo number_format($cart_item['giasp'], 0, ',', '.') ?> VNĐ</td>
      <td class="item-total"><?php echo number_format($thanhtien, 0, ',', '.') ?> VNĐ</td>
      <td class="item-action"><a href="page/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>" class="btn-delete">Xóa</a></td>
    </tr>
    <?php
        }
    ?>
  </tbody>
</table>
</div>

<div class="cart-footer">
    <div class="cart-total">
        <p>Tổng tiền: <span class="total-price"><?php echo number_format($tongtien, 0, ',', '.') . ' VNĐ' ?></span></p>
    </div>
    <div class="cart-actions">
        <a href="page/main/themgiohang.php?xoatatca=1" class="btn btn-danger">Xóa tất cả</a>
        <?php
           if(isset($_SESSION['tenkhachhang'])){
        ?>
        <a href="page/main/thanhtoan.php" class="btn btn-success">Đặt hàng</a>
        <?php
           }else{
        ?>
        <a href="index.php?quanly=dangky" class="btn btn-success">Đăng ký để đặt hàng</a>
        <?php
           }
        ?>
    </div>
</div>
    <?php
    }else{
    ?>
    <div class="cart-empty">
        <p>Giỏ hàng của bạn trống. <a href="index.php">Tiếp tục mua sắm</a></p>
    </div>
    <?php 
    } ?>
</div>
