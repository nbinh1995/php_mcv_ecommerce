<div class="footer">
<div class="footer-top">
    <h3><i class="fas fa-truck" ></i> Free Delivery Over <span><?=number_format($about->delivery, 0, '', ',')?> VND*</span></h3>
    <h3><i class="far fa-comments"></i> HotLine: <span><?=$about->phone?></span></h3>
    <h3><i class="fas fa-envelope"></i> Email: <span><?=$about->email?></span></h3>
</div>
<div class="footer-mid">
    <ul>
        <li><h2>Products 's Store</h2>
            <ul>
                <?php foreach ($categories as $menu):?>
                <div class="ft-categories">
                    <h4><?=$menu->item_name?></h4>
                    <li><a href="shop"><?=$menu->item_name?>'s new arrival</a></li>
                    <li><a href="shop"><?=$menu->item_name?>'s top sellers</a></li>       
                    <?php foreach($categoriesDetail[$menu->id -1] as $item):?>
                    <li><a href="shop"><?= $item['item_name']?></a></li>
                    <?php endforeach?>
                </div>
                <?php endforeach?>  
            </ul>        
        </li>
        <li> 
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3826.216559862403!2d107.590157114229!3d16.464568533096426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3141a13c00686347%3A0x312e8ccbe67acf98!2zMjggTmd1eeG7hW4gVHJpIFBoxrDGoW5nLCBQaMO6IEjhu5lpLCBUaMOgbmggcGjhu5EgSHXhur8sIFRo4burYSBUaGnDqm4gSHXhur8sIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1593611734046!5m2!1svi!2s" width="100%" height="auto" frameborder="0" style="border:1px solid #ddd;padding:1rem;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            <h5>Address: <?=$about->address?></h5>
        </li>    
    </ul>
</div>
<div class="footer-bot">
    <h4>© All rights reserved | CodeGymHUE</h4>
</div>
</div>
</body>
</html>