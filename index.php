
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Web phụ kiện thú cưng </title>
</head>

<body>
    <div class="wrapper">
        <?php
            session_start();
            include("admin/config/config.php");
            include("page/header.php");
            include("page/menu.php");
            include("page/main.php");
            include("page/footer.php");
        ?>
    </div>
</body>

</html>