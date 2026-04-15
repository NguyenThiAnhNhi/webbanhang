<div id="main">
    <?php
        if(isset($_GET['quanly'])){
            $tam = $_GET['quanly'];
        } else {
            $tam = '';
        }

        // ❌ KHÔNG load sidebar khi login
        if($tam != 'dangnhap'){
            include("sidebar/sidebar.php");
        }

    ?>
            <div class="maincontent">
                <?php
                    if($tam == 'danhmucsanpham'){
                        include("main/danhmuc.php");
                    }
                    elseif($tam == 'gioithieu'){
                        include("main/gioithieu.php");
                    }
                    elseif($tam == 'giohang'){
                        include("main/giohang.php");
                    }
                    elseif($tam == 'tintuc'){
                        include("main/tintuc.php");
                    }
                    elseif($tam == 'lienhe'){
                        include("main/lienhe.php");
                    }
                    elseif($tam == 'sanpham'){
                        include("main/sanpham.php");
                    }
                    elseif($tam == 'dangky'){
                        include("main/dangky.php");
                    }
                    elseif($tam == 'thanhtoan'){
                        include("main/thanhtoan.php");
                    }
                     elseif($tam == 'dangnhap'){
                        include("main/dangnhap.php");
                    }
                    elseif($tam == 'timkiem'){
                        include("main/timkiem.php");
                    }
                     elseif($tam == 'camon'){
                        include("main/camon.php");
                    }
                    elseif($tam == 'thaydoimatkhau'){
                        include("main/thaydoimatkhau.php");
                    }
                    // elseif($tam == 'dangxuat'){
                    //     include("main/dangxuat.php");
                    // }
                     else{
                        include("main/mainchinh.php");
                    }
                ?>
            </div>
            
        </div>