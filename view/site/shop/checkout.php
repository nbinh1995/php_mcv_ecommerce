<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
require_once 'view/layout/header.php';
?>

<link rel="stylesheet" href="public/css/checkout.css">
<?php if (empty($cart)) { ?>
    <div class="empty-cart">
        <h1>your bag is empty</h1>
        <div class="btn-cart"><a href="shop">continue shopping <i class="fas fa-arrow-right"></i></i></a></div>
    </div>
<?php } else { ?>

    <div class="container-cart">
        <div class="title-cart">
            <h1>YOUR BAG <?= $count ?> item</h1>
            <div><a href="shop">continue shopping <i class="fas fa-arrow-right"></i></i></a></div>
        </div>
        <div class="main-cart">
            <div class="table-responsive left-cart">
                <div align="right">
                    <a href="clearCart"><b>Clear Cart</b></a>
                </div>
                <table class="table table-bordered">
                    <caption>Order Detail</caption>
                    <thead>
                        <tr>
                            <th>Index</th>
                            <th>Item Name</th>
                            <th>Amount</th>
                            <th>Sale</th>
                            <th>Price (VND)</th>
                            <th>Total Detail (VND)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0;
                        $i = 1;
                        $lenCart = count($cart);
                        foreach ($cart as $item) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><img src="<?= $item['product_img'] ?>" alt="">
                                    <?= $item['product_name'] ?></td>
                                <td><?= $item['product_amount'] ?></td>
                                <td><?= $item['product_discount'] ?></td>
                                <td><?php echo number_format($item['product_price'], 0, '', ',') ?></td>
                                <td><?php $total_detail = $item['product_price'] * (100 - $item['product_discount']) / 100 * $item['product_amount'];
                                    echo number_format($total_detail, 0, '', ',');
                                    $total += $total_detail; ?></td>
                                <td> <a href="removeCart?id=<?= $item['product_id'] ?>"><span class="text-danger">Remove</span></td>
                            </tr>
                        <?php $i += 1;
                        endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5" style="text-align: right;">Total (VND)</th>
                            <th style="text-align: right;"><?php echo number_format($total, 0, '', ','); ?> vnd</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="right-cart">
                <div class="order">
                    <h1> ORDER SUMMARY: </h1>
                    <form action="orderCart" method="post">
                        <div class="order-main">
                            <h3><?= $count ?> Product</h3>
                            <h3>Products Total: <?php echo number_format($total, 0, '', ',') ?> VND</h3>
                            <h3>Delivery: <?php if ($total > 1300000) echo 'FREE';
                                            else  echo number_format(145000, 0, '', ',') . ' VND'; ?></h3>
                            <h3>TOTAL: <?php if ($total > 1300000) echo number_format($total, 0, '', ',');
                                        else  echo number_format($total + 145000, 0, '', ','); ?> VND</h3>
                            <input type="hidden" name="total_order" value="<?=$total?>">
                            <input type="text" name="name" placeholder="FullName" required>
                            <input type="text" name="address" placeholder="Address" required>
                            <input type="tel" name='phone' placeholder="PhoneNumber" pattern="^0[0-9]{9,10}$" required title="Không phải số điện thoại!">
                        </div>
                        <button class="btn-cart" type="submit">checkout <i class="fas fa-arrow-right"></i></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
<?php
require_once 'view/layout/footer.php';
?>