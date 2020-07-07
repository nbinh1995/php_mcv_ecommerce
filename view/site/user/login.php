<?php
require_once 'view/layout/header.php';
?>
<link rel="stylesheet" href="public/css/login.css">
   <div class="login-wrap">
        <div class="login-wrap-left">
           <h1>NEW CUSTOMERS</h1>
           <h3>REGISTER ACCOUNT</h3>
           <p>
            Creating an account is easy. Enter your email address and fill in the form on the next page and enjoy the benefits of having an account.
            <br>    - Simple overview of your personal information
            <br>    - Faster checkout
            <br>    - A single global login to interact with adidas products and services
            <br>    - Exclusive offers and promotions
            <br>    - Latest products arrivals
            <br>    - New season and limited collections
            <br>    - Upcoming events
            </p>
            <a href="login"><input type="button" value="Register"></a>
        </div>
        <form class="login-wrap-right" action=""  method="post">
            <h1>REGISTERED CUSTOMERS</h1>
            <input type="email" name="email" placeholder="E-Mail" required>
            <h4 class="err"><?=$err['email']?></h4>
            <input type="password" name="password" placeholder="Password"
            pattern="(?=.*[a-zA-Z0-9]).{6,}" required
            title="Mật khẩu có ít nhất 6 kí tự và không có kí tự đặc biệt!">
            <h4 class="err"><?=$err['password']?></h4>
            <div class="login-container-btn">
                <a href="">Forget Your Password ?</a>
                <input type="submit" value="SUBMIT">
            </div> 
        </form>
    </div>
<?php
require_once 'view/layout/footer.php';
?>