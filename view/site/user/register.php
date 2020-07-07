<?php
require_once 'view/layout/header.php';
?>
<!-- css page -->
<link rel="stylesheet" href="public/css/register.css">  
<form class="reg-container" action="register" method="post">
    <h1>create an account</h1>
    <h4 class="err"><?=$err['stmt']?></h4>
    <div class="reg-wrap">
        <div class="reg-wrap-left">
            <input type="email" name="email" placeholder="E-Mail"  required>
            <h4 class="err"><?=$err['email']?></h4>
            <input type="password" name="password" placeholder="Password"
            pattern="(?=.*[a-zA-Z0-9]).{6,}" 
            title="Mật khẩu có ít nhất 6 kí tự và không có kí tự đặc biệt!">
            <h4 class="err"><?=$err['password']?></h4>
            <input type="password" name="confirm_password" placeholder="Confirm Password"
            pattern="(?=.*[a-zA-Z0-9]).{6,}" required
            title="Mật khẩu có ít nhất 6 kí tự và không có kí tự đặc biệt!">
            <h4 class="err"><?=$err['confirm_password']?></h4>         
        </div>
        <div class="reg-wrap-right">
            <input type="text" name="name" placeholder="FullName" required>
            <h4 class="err"><?=$err['name']?></h4>
            <input type="text" name="address" placeholder="Address" required>
            <h4 class="err"><?=$err['address']?></h4> 
            <input type="tel" name= 'phone' placeholder="PhoneNumber" 
            pattern="^0[0-9]{9,10}$" required
            title="Không phải số điện thoại!">
            <h4 class="err"><?=$err['phone']?></h4>
        </div>
    </div>
    <div class="reg-container-btn">
        <input type="submit" value="SUBMIT">
        <p>By clicking 'Create Account' you agree to the<a href=""> Terms & Conditions.</a></p>
    </div> 
</form>
<?php
require_once 'view/layout/footer.php';
?>
