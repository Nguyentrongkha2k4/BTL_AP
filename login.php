<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Longin Page</title>
</head>
<body>
    <div class="background-setting"style="background: url(./images/login.jpg) no-repeat center /cover; ">
        <div class = "background-c">
            <div class="login-box">
                <div class="img-login">
                    <img class="img-in" src="./images/login-background.webp" alt="none">
                </div>
                <div class="login-box-form">
                    <form class="form-login" method="post" action="login_action.php">
                        <div class="header-form"><b>LOGIN FORM</b></div><br>
                        <div class="email-text">Email:</div>
                        <input class="email-box" type="email" name="email" >
                        <div class="password-text">Password:</div>
                        <input class="password-box" type="password" name="password"><br>
                        <input class="button-submit" type="submit" value="LOGIN"><br><br>
                        Don't have an account yet? <a class="signup-button" href="signup.php">Sign up</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>