<?php
    if(isset($_GET['trang'])){
        $page = $_GET['trang'];
    } else {
        $page = 1;
    }
    if($page == '' || $page == 1){
        $begin = 0;
    } else {
        $begin = ($page*10) - 10;
    }
    $sql_pro = "SELECT * FROM tbl_sanpham, tb_danhmuc WHERE tbl_sanpham.id_danhmuc = tb_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC limit " . $begin . ",10";
    $query_pro = mysqli_query($mysqli, $sql_pro);
?>
            <h1>Sản phẩm mới nhất</h1>
                <ul class="product_list">
                    <?php
                        while($row = mysqli_fetch_array($query_pro)){
                    ?>
                        <li>
                        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                            <img src="admin/module/qlsanpham/uploads/<?php echo $row['hinhanh'] ?>" alt="<?php echo $row['tensanpham'] ?>">
                            <p class="Ten_san_pham"><?php echo $row['tensanpham'] ?></p>
                            <p class="Gia_san_pham"><?php echo number_format($row['giasp'], 0, ',', '.'). ' vnđ' ?></p>
                            <p style="text-align: center; color: #7f8c8d; font-size: 14px;"><?php echo $row['tendanhmuc'] ?></p>
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
                <div style="clear:both;"></div>
                <style>
                    .list_trang{
                        margin: 20px 0;
                        padding: 0;
                        list-style: none;
                        display: flex;
                        justify-content: center;
                        gap: 5px;
                    }
                    .list_trang li{
                        padding: 8px 12px;
                        background: #fff;
                        border: 1px solid #ddd;
                        border-radius: 10px;
                        display: block;
                        transition: background 0.3s ease, color 0.3s ease;
                    }
                    .list_trang li:hover{
                        background: #3498db;
                        border-color: #3498db;
                    }
                    .list_trang li a{
                        color: #333;
                        text-decoration: none;
                        font-weight: 500;
                        font-size: 21px;
                    }
                    .list_trang li:hover a{
                        color: #fff;
                    }
                    .list_trang li.active{
                        background: #3498db;
                        border-color: #3498db;
                        color: #fff;
                    }
                    .list_trang li.active a{
                        color: #fff;
                    }
                </style>
                
                <?php
                    $sql_trang = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham");
                    $row_count = mysqli_num_rows($sql_trang);
                    $trang = ceil($row_count/10);
                ?>
                <p>Trang hiện tại: <?php echo $page ?>/<?php echo $trang ?></p>
                <ul class ="list_trang">
                    <?php
                        for($i=1; $i<=$trang; $i++){
                    ?>
                    <li <?php if($page == $i) { echo 'class="active"'; } ?> >
                        <a href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>

      