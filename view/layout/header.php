<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adidas</title>
    <link rel="icon" href="public/images/favicon.svg" type="image/svg">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css" />
    <script type="text/javascript">
        function notify() {
            $.notify("success", "success");
        }
    </script>
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="public/css/header.css">
    <link rel="stylesheet" href="public/css/footer.css">
</head>

<body>
    <div class="header-top">
        <div class="wrap col-4-4">
            <div class="logo">
                <a href='home'><img src="public/images/logo.png" alt="" /></a>
            </div>
            <div class="search col-2-4 col-mb-2-3">
                <form action="shopSearch" method="get" class="form-search">
                    <input type="text" name="search" class="text-search" placeholder="Search">
                    <button type="submit" class="icon-search"><i class="fas fa-search "></i></button>
                </form>
            </div>
            <ul class="menu-mb col-mb-1-3">
                <li class="dropdown-mb">
                    <a href="javascript:void(0)" class="dropbtn-mb">Menu</a>
                    <div class="dropdown-content-mb">
                        <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) : ?>
                            <a href="account"><?= 'Hi,' . $user->email ?> </a>
                        <?php endif ?>
                        <a href="logout" class="logout <?php if (isset($_SESSION["loggedin"]) &&
                                                            $_SESSION["loggedin"] === true
                                                        ) echo 'block'; ?>">Logout</a>
                        <a href="login" class="<?php if (
                                                    isset($_SESSION["loggedin"]) &&
                                                    $_SESSION["loggedin"] === true
                                                ) echo 'none'; ?>">Login</a>
                        <a href="register">Sign in</a>
                        <a href="shop">Store</a>
                        <a href="checkout">Checkout: <span style="color:#FF1493;"><?=$count?></span></a>
                    </div>
                </li>
            </ul>
            <div class="menu col-2-4">
                <ul>
                    <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) : ?>
                        <li><a href="account"><?= 'Hi,' . $user->email ?></a></li>
                    <?php endif ?>
                    <li><a href="logout" class="logout <?php if (
                                                            isset($_SESSION["loggedin"]) &&
                                                            $_SESSION["loggedin"] === true
                                                        ) echo 'block'; ?>">Logout</a></li>
                    <li><a href="login" class="<?php if (
                                                    isset($_SESSION["loggedin"]) &&
                                                    $_SESSION["loggedin"] === true
                                                ) echo 'none'; ?>">Login</a></li>
                    <li><a href="register">Sign in</a></li>
                    <li><a href="shop">Store</a></li>
                    <li style="position: relative;"><a href="checkout"><img src="public/images/cart.png" alt=""><span style="position: absolute;right: 0px; top:0px;color:#FF1493;"><?=$count?></span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header-bot">
        <ul class="megamenu">
            <li class="megapanel"><a href='home'>Home</a></li>
            <?php foreach ($categories as $menu) : ?>
                <li class="dropdown megapanel col-mb-3-3">
                    <a href="javascript:void(0)" class="dropbtn"><?= $menu->item_name ?></a>
                    <div class="dropdown-content">
                        <div class="col-1-4 col-mb-3-3">
                            <h4>features</h4>
                            <ul>
                                <li><a href="shop?cate=new<?= $menu->item_name ?>">new arrivals</a></li>
                                <li><a href="shop?cate=hot<?= $menu->item_name ?>">top sellers</a></li>
                            </ul>
                        </div>
                        <div class="col-1-4 col-mb-3-3">
                            <h4>Products</h4>
                            <ul>
                                <?php foreach ($categoriesDetail[$menu->id - 1] as $item) : ?>
                                    <li><a href="shop?cate=<?= $item['id'] ?>"><?= $item['item_name'] ?></a></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <div class="col-1-4 col-mb-3-3">
                            <img src="<?= $menu->img ?>" alt="<?= $menu->item_name ?>" />
                        </div>
                    </div>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
    <script>
           <?php if(isset($_SESSION['add_cart_success'])):?> 
            notify();
            <?php unset($_SESSION['add_cart_success']); endif?>
            <?php if(isset($_SESSION['clear_cart_success'])):?> 
            notify();
            <?php unset($_SESSION['clear_cart_success']); endif?>
            <?php if(isset($_SESSION['remove_cart_success'])):?> 
            notify();
            <?php unset($_SESSION['remove_cart_success']); endif?>
            <?php if(isset($_SESSION['login_success'])):?> 
            notify();
            <?php unset($_SESSION['login_success']); endif?>
            <?php if(isset( $_SESSION['reg_success'])):?> 
            notify();
            <?php unset( $_SESSION['reg_success']); endif?>
            <?php if(isset($_SESSION['change_success'])):?> 
            notify();
            <?php unset($_SESSION['change_success']); endif?>
            <?php if(isset($_SESSION['logout_success'])):?> 
            notify();
            <?php unset($_SESSION['logout_success']); endif?>
    </script>