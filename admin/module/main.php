<div class="clear"></div>
<div class="main">
    
    <?php
        if(isset($_GET['action']) && isset($_GET['query'])) {
            $tam = $_GET['action'];
            $query = $_GET['query'];
        } else {
            $tam = '';
            $query = '';
        }

        if($tam == 'quanlidanhmuc' && $query == 'them') {
            include("module/qldanhmucsp/them.php");
            include("module/qldanhmucsp/lietke.php");
        }
        elseif($tam == 'quanlidanhmuc' && $query=='sua') {
            include("module/qldanhmucsp/sua.php");
        }
        elseif($tam == 'quanlisanpham' && $query=='them') {
            include("module/qlsanpham/them.php");
            include("module/qlsanpham/lietke.php");
        }
        elseif($tam == 'quanlisanpham' && $query=='sua') {
            include("module/qlsanpham/sua.php");
        }
        elseif($tam == 'quanlidonhang' && $query=='lietke') {
            include("module/quanlydonhang/lietke.php");
        }
        elseif($tam == 'donhang' && $query=='xemdonhang') {
            include("module/quanlydonhang/xemdonhang.php");
        }
        else{
            include("module/dashboard.php");
        }
    ?>
</div>