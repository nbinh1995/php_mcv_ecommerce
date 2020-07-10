<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adidas</title>
    <link rel="icon" href="public/images/favicon.svg" type="image/svg">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="public/css/header.css">
    <link rel="stylesheet" href="public/css/footer.css">  
</head>
<body>
    <div class="header-top">
        <div class="wrap col-4-4"> 
            <div class="logo">
               <a href='home'><img src="public/images/logo.png" alt=""/></a>
            </div>
           <div class="search col-2-4 col-mb-2-3">      
                <form action="shop" method="get" class="form-search">
                    <input type="text" name="search" class="text-search" placeholder="Search">
                    <button type="submit" class="icon-search"><i class="fas fa-search "></i></button>
                </form> 
            </div>
            <ul class="menu-mb col-mb-1-3">
                <li class="dropdown-mb">
                    <a href="javascript:void(0)" class="dropbtn-mb">Menu</a>
                    <div class="dropdown-content-mb">
                        <?php  if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true):?>
                        <a href="account"><?='Hi,'.$user->email?> </a>
                        <?php endif?>
                        <a href="logout" class="logout <?php if (isset($_SESSION["loggedin"]) && 
                        $_SESSION["loggedin"] === true) echo 'block';?>">Logout</a>
                        <a href="login" class="<?php if (isset($_SESSION["loggedin"]) && 
                        $_SESSION["loggedin"] === true) echo 'none';?>">Đăng nhập</a>
                        <a href="register">Đăng ký</a>
                        <a href="shop">Cửa Hàng</a>
                        <a href="checkout">Giỏ Hàng</a>
                    </div>
                </li>
            </ul>
           <div class="menu col-2-4">
                <ul>
                    <?php  if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true):?>
                    <li><a href="account"><?='Hi,'.$user->email ?></a></li>
                    <?php endif?>
                    <li><a href="logout" class="logout <?php if (isset($_SESSION["loggedin"]) && 
                    $_SESSION["loggedin"] === true) echo 'block';?>">Logout</a></li>
                    <li><a href="login" class="<?php if (isset($_SESSION["loggedin"]) && 
                    $_SESSION["loggedin"] === true) echo 'none';?>">Đăng nhập</a></li>
                    <li><a href="register">Đăng Ký</a></li> 
                    <li><a href="shop">Cửa Hàng</a></li>       
                    <li><a href="checkout"><img src="public/images/cart.png" alt=""></a></li>
               </ul>
           </div>
        </div>
    </div>
    <div class="header-bot">
        <ul class="megamenu">
            <li class="megapanel"><a href='home'>trang chủ</a></li>
            <?php foreach ($categories as $menu):?>
            <li class="dropdown megapanel col-mb-3-3">
                <a href="javascript:void(0)" class="dropbtn"><?=$menu->item_name?></a>
                <div class="dropdown-content">
                    <div class="col-1-4 col-mb-3-3">
                        <h4>Đặc sắc</h4>
                        <ul>
                            <li><a href="shop">hàng mới về</a></li>
                            <li><a href="shop">hàng bán chạy</a></li>                                      
                        </ul>
                    </div>
                    <div class="col-1-4 col-mb-3-3">
                        <h4>Sản phẩm</h4>
                        <ul>
                            <?php foreach($categoriesDetail[$menu->id -1] as $item):?>
                            <li><a href="shop"><?= $item['item_name']?></a></li>
                            <?php endforeach?>
                        </ul>	
                    </div>
                    <div class="col-1-4 col-mb-3-3">
                            <img src="<?=$menu->img?>" alt="<?=$menu->item_name?>"/>
                    </div>		               	                                       
                </div>
            </li>
            <?php endforeach?>
        </ul>
</div> 
