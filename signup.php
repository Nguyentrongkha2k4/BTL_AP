<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./css/images/shortcut-icon.png">
    <link rel="stylesheet" href="./css/signup.css">
    <title>Bệnh viện ABC - Đăng ký</title>
</head>
<body>
    <div class="background-setting" style="background: url(./css/images/login.jpg) no-repeat center /cover; ">
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
                        <div>Full name:</div>
                        <input class="name-input" type="text" name="name" placeholder="Your name...">
                        <div class="attr">Email:</div>
                        <input class="email-input" type="email" name="email" placeholder="abc@gmail.com" >
                        <div class="attr">Password:</div>
                        <input class="password-input" type="password" name="password" placeholder="Your Password...">
                        <div class="attr">Confirm password*:</div>
                        <input class="password-confirm-input" type="password" name="password-confirm" placeholder="Your password..."><br>
                        <div class="button-box">
                            <input class="button-submit" type="submit" value="SIGN UP">
                        </div>
                        <div>
                            Already have an account? <a class="signup-button" href="login.php">Login</a>
                        </div> 
                        <div>
                            
                        </div>
                    </form>
                </div>


                <!-- <form method="post" action="signup_action.php">
                    <h2>SIGN UP FORM</h2><br>
                    Full name<br>
                    <input type="text" name="name"><br>
                    Email<br>
                    <input type="email" name="email" ><br>
                    Password<br>
                    <input type="password" name="password"><br>
                    Role<br>
                    <select name="role">
                        <option value="0">Role</option>
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                    </select><br>
                    <input type="submit" value="SIGNUP"><br><br>
                    Already have an account? <a href="login.php">Login</a>
                </form> -->
            </div>
        </div>
    </div>
</body>
</html>