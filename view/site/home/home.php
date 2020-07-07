<?php
require_once 'view/layout/header.php';
?>
<!-- css page -->
<link rel="stylesheet" href="public/css/home.css">
<!-- banner -->
<div class="banner">
	<?php foreach($banner as $item ):?>
    <div class="js-banner-wrap">
        <div class="slider-left">
			<img src="<?=$item->img_banner?>" alt=""/> 
		</div>
		<div class="slider-right">
			<h1><?=$item->title?></h1>
			<p><?=$item->content?></p>
			<div class="btn"><a href="shop">Mua Ngay <i class="fas fa-arrow-right"></i></i></a></div>
		</div>
	</div>
	<?php endforeach ?>
</div>
<!-- social -->
<div class="wrap-social">
	<div class="left-social">
		<div class="item-social">	
			<a href="https://www.facebook.com/adidasVN" class="face"><i class="fab fa-facebook-f"></i></a>
			<img src="public/images/radius.png" alt="">
			<p class="num">1.51K</p>
		</div>
		<div class="item-social">	
			<a href="https://twitter.com/adidas"><i class="fab fa-twitter"></i></a>
			<img src="public/images/radius.png" alt="">
			<p class="num">1.51K</p>	
		</div>
	</div>
	<div class="right-social">
		<div class="item-social">	
			<a href=""><i class="fab fa-instagram"></i></a>
			<img src="public/images/radius.png" alt="">
			<p class="num">1.51K</p>		
		</div>
		<div class="item-social">	
			<a href=""><i class="fas fa-share-alt"></i></a>
			<img src="public/images/radius.png" alt="">
			<p class="num">1.51K</p>		
		</div>
	</div>
</div>
<div class="content">
	<!-- product -->
	<div class="thumbnail">
		<img src="public/images/CONTINENTAL80_1.jpg" alt="" >
		<img src="public/images/CONTINENTAL80_2.jpg" alt="">
		<div class="status">
		<img src="public/images/new.png" alt="">
		<img src="public/images/hot.png" alt="">	
		</div>
        <h1>Name Shoes</h1>
		<h1>£480</h1>
        <div class="overlay">
                <a href="single" class="btn">View Detail</a>
		</div>
		<div class="thumb-bottom">
		<ul class="ratings">
			<li class="star"></li>
			<li class="star"></li>
			<li class="star"></li>
			<li class="star"></li>
			<li class="star"></li>
		</ul>
			<a href="#" class="btn"><i class="fas fa-plus"></i> Add To Cart</a>
		</div>
	</div>
	<div class="thumbnail">
		<img src="public/images/CONTINENTAL80_1.jpg" alt="" >
		<img src="public/images/CONTINENTAL80_2.jpg" alt="">
        <h1>Name Shoes</h1>
		<h1>£480</h1>
        <div class="overlay">
                <a href="single" class="btn">View Detail</a>
		</div>
		<div class="thumb-bottom">
		<ul class="ratings">
			<li class="star"></li>
			<li class="star"></li>
			<li class="star"></li>
			<li class="star"></li>
			<li class="star"></li>
		</ul>
			<a href="#" class="btn"><i class="fas fa-plus"></i> Add To Cart</a>
		</div>
	</div>
</div>
<script src="public/js/slideshow.js"></script>
<?php
require_once 'view/layout/footer.php';
?>
