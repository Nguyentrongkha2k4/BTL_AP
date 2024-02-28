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
                    <form method="post" action="login_action.php">
                        <h2>LOGIN FORM</h2><br>
                        Email<br>
                        <input type="email" name="email" ><br>
                        Password<br>
                        <input type="password" name="password"><br>
                        <input type="submit" value="LOGIN"><br><br>
                        Don't have an account yet? <a href="signup.php">Sign up</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>