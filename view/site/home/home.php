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
			<div class="btn"><a href="shop">Shop Now <i class="fas fa-arrow-right"></i></i></a></div>
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
<!-- product -->
<div class="content">
	
  <div class="box-show">
    <!-- <div class="row-show">
      <h1>New Arrivals</h1>
    </div> -->
    <div class="box-paginacao">
      <input type="radio" name="input-paginacao" id="paginacao1" checked>
      <input type="radio" name="input-paginacao" id="paginacao2">
      <!-- <input type="radio" name="input-paginacao" id="paginacao3">
      <input type="radio" name="input-paginacao" id="paginacao4"> -->
      <div class="box-vitrines">
        <ul>
          <div class="vitrine1">
            <h2>New Arrivals</h2>
            <div class="row-vi" >
            <?php $lenProductNew = count($productNew);
            for ($i = 0; $i < $lenProductNew; $i++) : ?>
                <div class="thumbnail pageNew">
                    <?php for ($j = 0; $j < count($imgProductNew[$i]); $j++) : ?>
                        <img src="<?= $imgProductNew[$i][$j]->img ?>" alt="">
                        <?php if (count($imgProductNew[$i]) === 1) : ?>
                            <img src="<?= $imgProductNew[$i][$j]->img ?>" alt="">
                        <?php endif ?>
                    <?php endfor ?>

                    <div class="status">
                        <?php if ($productNew[$i]->isNew) : ?>
                            <img src="public/images/new.png" alt="">
                        <?php endif ?>
                        <?php if ($productNew[$i]->isHot) : ?>
                            <img src="public/images/hot.png" alt="">
                        <?php endif ?>
                    </div>
                    <?php if ($productNew[$i]->discount != 0) : ?>
                        <div class="discount">
                            <div class="text-sale">
                                <img src="public/images/sale.png" alt="">
                                <h3><?= $productNew[$i]->discount ?>%</h3>
                            </div>
                        </div>
                    <?php endif ?>
                    <h1><?= $productNew[$i]->name ?></h1>
                    <h1><?php echo number_format($productNew[$i]->price, 0, '', ','); ?> vnđ</h1>
                    <div class="overlay">
                        <a href="single?id=<?= $productNew[$i]->id?>" class="btn">View Detail</a>
                    </div>
                    <div class="thumb-bottom">
                        <ul class="ratings">
                            <li class="star"></li>
                            <li class="star"></li>
                            <li class="star"></li>
                            <li class="star"></li>
                            <li class="star"></li>
                        </ul>
                    </div>
                </div>
            <?php endfor ?>
            </div>
            <i class="fas fa-chevron-left btn-left pro-prev" onclick="changeNew('l')"></i>
            <i class="fas fa-chevron-right btn-right pro-next" onclick="changeNew('r')"></i>
          </div>
          <div class="vitrine2">
            <h2>Top Sellers</h2>
            <div class="row-vi" >
            <?php $lenProductHot = count($productHot);
            for ($i = 0; $i < $lenProductHot; $i++) : ?>
                <div class="thumbnail pageHot">
                    <?php for ($j = 0; $j < count($imgProductHot[$i]); $j++) : ?>
                        <img src="<?= $imgProductHot[$i][$j]->img ?>" alt="">
                        <?php if (count($imgProductHot[$i]) === 1) : ?>
                            <img src="<?= $imgProductHot[$i][$j]->img ?>" alt="">
                        <?php endif ?>
                    <?php endfor ?>

                    <div class="status">
                        <?php if ($productHot[$i]->isNew) : ?>
                            <img src="public/images/new.png" alt="">
                        <?php endif ?>
                        <?php if ($productHot[$i]->isHot) : ?>
                            <img src="public/images/hot.png" alt="">
                        <?php endif ?>
                    </div>
                    <?php if ($productHot[$i]->discount != 0) : ?>
                        <div class="discount">
                            <div class="text-sale">
                                <img src="public/images/sale.png" alt="">
                                <h3><?= $productHot[$i]->discount ?>%</h3>
                            </div>
                        </div>
                    <?php endif ?>
                    <h1><?= $productHot[$i]->name ?></h1>
                    <h1><?php echo number_format($productHot[$i]->price, 0, '', ','); ?> vnđ</h1>
                    <div class="overlay">
                        <a href="single?id=<?= $productHot[$i]->id?>" class="btn">View Detail</a>
                    </div>
                    <div class="thumb-bottom">
                        <ul class="ratings">
                            <li class="star"></li>
                            <li class="star"></li>
                            <li class="star"></li>
                            <li class="star"></li>
                            <li class="star"></li>
                        </ul>
                    </div>
                </div> 
            <?php endfor ?>
            </div>
            <i class="fas fa-chevron-left btn-left pro-prev" onclick="changeHot('l')"></i>
            <i class="fas fa-chevron-right btn-right pro-next" onclick="changeHot('r')"></i>
          </div>
          <!-- <div class="vitrine3">
            <h2>Pagina 3</h2>
            <div class="row-vi">
              <div class="thumbnail">
                <img src="public/images/CONTINENTAL80_1.jpg" alt="">
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
                <img src="public/images/CONTINENTAL80_1.jpg" alt="">
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
                <img src="public/images/CONTINENTAL80_1.jpg" alt="">
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
                <img src="public/images/CONTINENTAL80_1.jpg" alt="">
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
                <img src="public/images/CONTINENTAL80_1.jpg" alt="">
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
                <img src="public/images/CONTINENTAL80_1.jpg" alt="">
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
            </div>
            <i class="fas fa-chevron-left btn-left pro-prev"></i>
            <i class="fas fa-chevron-right btn-right pro-next"></i>
          </div>
          <div class="vitrine4">
            <h2>Pagina 4</h2>
            <div class="row-vi">
              <div class="thumbnail">
                <img src="public/images/CONTINENTAL80_1.jpg" alt="">
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
                <img src="public/images/CONTINENTAL80_1.jpg" alt="">
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
                <img src="public/images/CONTINENTAL80_1.jpg" alt="">
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
                <img src="public/images/CONTINENTAL80_1.jpg" alt="">
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
                <img src="public/images/CONTINENTAL80_1.jpg" alt="">
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
                <img src="public/images/CONTINENTAL80_1.jpg" alt="">
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
            </div>
            <i class="fas fa-chevron-left btn-left pro-prev"></i>
            <i class="fas fa-chevron-right btn-right pro-next"></i>
          </div> -->
        </ul>
        <div class="btn-paginacao">
          <ul>
            <li><label for="paginacao1">1</label></li>
            <li><label for="paginacao2">2</label></li>
            <!-- <li><label for="paginacao3">3</label></li>
            <li><label for="paginacao4">4</label></li> -->
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="public/js/slideshow.js"></script>
<script src="public/js/showHot.js"></script>
<?php
require_once 'view/layout/footer.php';
?>
