<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="shortcut icon" href="./images/logo.png">
    <title>Bệnh viện ABC - Đăng nhập</title>
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
                    <form class="form-login" method="post" action="login_action.php">
                        <div class="header-form"><b>LOGIN FORM</b></div>
                        <?php
                        if(isset($_GET['in4'])){ ?>
                            <div class="signup-success"><?php echo $_GET['in4']; ?> </div>
                        <?php } ?>
                        <div class="attr">Email:</div>
                        <input class="email-input" type="email" name="email" placeholder="Your email..." >
                        <div class="attr">Password:</div>
                        <input class="password-input" type="password" name="password" placeholder="Your Password..."><br>
                        <div class="button-box">
                            <input class="button-submit" type="submit" value="LOGIN">
                        </div><br>
                        <div>
                            Don't have an account yet? <a class="signup-button" href="signup.php">Sign up</a>
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