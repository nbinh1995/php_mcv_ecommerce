<?php
require_once 'view/layout/header.php';
?>
<link rel="stylesheet" href="public/css/myaccount.css">  
<form class="detail-container" action="account" method="post">
    <h1>your detail</h1>
    <p>Feel free to edit any of your details below so your account is up to date</p>
    <div class="detail-wrap">
        <div class="detail-wrap-left">
            <h3>Email:</h3>
            <div class='info'><?=$user->email?></div>
            <div class="change-pass" >
            <label for="change"><h3>Change Password:</h3></label>
            <input type="checkbox" name="" id="change" hidden>
                <div class="toggle">
                    <div class="in-change">
                        <div>
                            <h3>Old Password</h3>
                            <input  type="password" name="old_pass" placeholder="Old Password"
                            pattern="(?=.*[a-zA-Z0-9]).{6,}" required
                            title="Mật khẩu có ít nhất 6 kí tự và không có kí tự đặc biệt!">
                            <h3 class="err"><?=$err['old_pass']?></h3>
                        </div>
                        <div>
                            <h3>New Password</h3>
                            <input  type="password" name="new_pass" placeholder="New Password"
                            pattern="(?=.*[a-zA-Z0-9]).{6,}" required
                            title="Mật khẩu có ít nhất 6 kí tự và không có kí tự đặc biệt!">
                            <h3 class="err"><?=$err['new_pass']?></h3>
                        </div>
                        </div>
                    <div class="detail-container-btn">
                        <input type="submit" value="SAVE CHANGE">
                    </div>
                </div>    
            </div>            
        </div>
        <div class="detail-wrap-right">
            <h3>Name</h3>
            <div class='info'><?=$user->name?></div>
            <h3>Address</h3>
            <div class='info'><?=$user->address?></div>
            <h3>PhoneNumber</h3>
            <div class='info'><?=$user->phone?></div>
        </div>
        <h3 class="err"><?=$err['old_pass']?></h3>
    </div>
</form>

<?php
require_once 'view/layout/footer.php';
?>