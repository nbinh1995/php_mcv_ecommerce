<?php
require_once 'view/layout/header.php';
?>
<link rel="stylesheet" href="public/css/shop.css">
<div class="container-shop">
    <div class="left-shop">
        <?php
        require_once 'view/layout/sidebar.php';
        ?>
    </div>
    <div class="right-shop">
        <div class="line"></div>
        <!-- <div class="toolbar">
            <div class="sort">
                <label>Sort By</label>
                <select>
                    <option value="-1">
                        Popularity </option>
                    <option value="0">
                        Price : High to Low </option>
                    <option type='submit' value="1">
                        Price : Low to High</option>
                </select>
                <a href=""><img src="images/arrow2.gif" alt="" class="v-middle"></a>
            </div>
            <div class="pagination">
                <a href="#">&laquo;</a>
                <a class="active" href="">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a href="#">&raquo;</a>
            </div>
        </div> -->
        <div class="main-shop">
            <?php $lenProduct = count($product);
            for ($i = 0; $i < $lenProduct; $i++) : ?>
                <div class="thumbnail">
                    <?php for ($j = 0; $j < count($imgProduct[$i]); $j++) : ?>
                        <img src="<?= $imgProduct[$i][$j]->img ?>" alt="">
                        <?php if (count($imgProduct[$i]) === 1) : ?>
                            <img src="<?= $imgProduct[$i][$j]->img ?>" alt="">
                        <?php endif ?>
                    <?php endfor ?>

                    <div class="status">
                        <?php if ($product[$i]->isNew) : ?>
                            <img src="public/images/new.png" alt="">
                        <?php endif ?>
                        <?php if ($product[$i]->isHot) : ?>
                            <img src="public/images/hot.png" alt="">
                        <?php endif ?>
                    </div>
                    <?php if ($product[$i]->discount != 0) : ?>
                        <div class="discount">
                            <div class="text-sale">
                                <img src="public/images/sale.png" alt="">
                                <h3><?= $product[$i]->discount ?>%</h3>
                            </div>
                        </div>
                    <?php endif ?>
                    <h1><?= $product[$i]->name ?></h1>
                    <h1><?php echo number_format($product[$i]->price, 0, '', ','); ?> vnđ</h1>
                    <div class="overlay">
                        <a href="single?id=<?= $product[$i]->id ?>" class="btn">View Detail</a>
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
    </div>
</div>
<?php
require_once 'view/layout/footer.php';
?>