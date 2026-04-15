<?php
session_start();
include("../../admin/config/config.php");

$id_khachhang = $_SESSION['id_khachhang'];

$sql = "SELECT * FROM tbl_cart WHERE id_khachhang='$id_khachhang' ORDER BY id_cart DESC";
$query = mysqli_query($mysqli, $sql);
?>

<h2>Đơn hàng của bạn</h2>

<table border="1">
<tr>
    <th>Mã đơn</th>
    <th>Trạng thái</th>
</tr>

<?php
while($row = mysqli_fetch_array($query)){
?>
<tr>
    <td><?php echo $row['code_cart'] ?></td>
    <td>
        <?php
        if($row['cart_status']==1){
            echo "Đang xử lý";
        }else{
            echo "Đã hoàn thành";
        }
        ?>
    </td>
</tr>
<?php
}
?>
</table>