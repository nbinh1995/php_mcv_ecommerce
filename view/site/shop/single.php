<?php

require_once 'view/layout/header.php';
?>
<link rel="stylesheet" href="public/css/single.css">
<div class="container-single">
    <div class="left-single">
        <?php require_once 'view/layout/sidebar.php'; ?>
    </div>
    <div class="right-single">
        <div class="line"></div>
        <link rel="stylesheet" href="public/css/zoom.css">
        <div class="detail">
            <div class="img-detail">
                <img id="myImg" src="<?= $imProduct[0]->img ?>" alt="<?= $product->name ?>" style="width:100%;max-width:300px">
            </div>
            <div class="text-detail">
                <h1><?= $product->name ?></h3>
                    <div class="money">
                        <h3>Price: </h3>
                        <?php if ($product->discount != 0) : ?>
                            <h3><?php $real = $product->price * (100 - $product->discount) / 100;
                                echo number_format($real, 0, '', ','); ?> vnđ</h3>
                        <?php endif ?>
                        <h3><?php echo number_format($product->price, 0, '', ','); ?> vnđ</h3>
                    </div>
                    <form action="addCart" method="post">
                        <label for="amount">Amount:
                            <input type="number" id="amount" name='product_amount' value="1" min='1'></label>
                        <input type="hidden" name="product_id" value="<?= $product->id ?>">
                        <input type="hidden" name="product_name" value="<?= $product->name ?>">
                        <input type="hidden" name="product_img" value="<?= $imProduct[0]->img ?>">
                        <input type="hidden" name="product_price" value="<?= $product->price ?>">
                        <input type="hidden" name="product_discount" value="<?= $product->discount ?>">
                        <button class="btn-sing" type="submit">Add To Cart</button>
                    </form>
                    <ul class="ratings">
                        <li class="star"></li>
                        <li class="star"></li>
                        <li class="star"></li>
                        <li class="star"></li>
                        <li class="star"></li>
                        <li class="blink">:Vote </li>
                    </ul>
            </div>

        </div>
        <div class="intro">
            <h1><?= $product->name ?></h1>
            <p><?= $product->content ?></p>
        </div>
    </div>
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>
</div>
<script src="public/js/zoom.js"></script>
<?php
require_once 'view/layout/footer.php';
?>