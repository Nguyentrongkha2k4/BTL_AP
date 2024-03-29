<?php
include("config.php");
include("firebaseRDB.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/logo.png">
    <link rel="stylesheet" href="./css/signup.css">
    <title>Bệnh viện ABC - Đăng ký</title>
</head>
<body>
    <div class="background-setting" style="background: url(./images/login.jpg) no-repeat center /cover; ">
        <div class = "background-c">
            <div class="login-box">
                <div class="img-login">
                    <!-- <img class="img-in" src="./css/images/login-background.webp" alt="none"> -->
                    <div class="text-in-picture">
                        <div class="BV-in-picture">Bệnh viện ABC</div>
                        <div class="slogan-in-picture">Chuyên nghiệp - Tận tâm - Thân thiện</div>
                    </div>
                </div>
                <div class="login-box-form">
                    <form class="form-login" method="post" action="signup_action.php">
                        <div class="header-form"><b>Đăng ký</b></div>
                        <?php 
                            if(isset($_GET['error'])){ ?>
                            <div class="error"><?php echo $_GET['error']; ?></div>
                        <?php } ?>
                        <div>Họ và tên:</div>
                        <input class="name-input" type="text" name="name" placeholder="Your name...">
                        <div class="attr">Email:</div>
                        <input class="email-input" type="email" name="email" placeholder="Your email..." >
                        <div class="attr">Mật khẩu:</div>
                        <input class="password-input" type="password" name="password" placeholder="Your password...">
                        <div class="attr">Xác nhận mật khẩu*:</div>
                        <input class="password-confirm-input" type="password" name="password-confirm" placeholder="Your password..."><br>
                        <div class="button-box">
                            <input class="button-submit" type="submit" value="Đăng ký">
                        </div>
                        <div>
                            Already have an account? <a class="signup-button" href="login.php">Đăng nhập</a>
                        </div> 
                        <div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>