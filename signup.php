<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up Page</title>
</head>
<body>
    <form method="post" action="signup_action.php">
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
    </form>
</body>
</html>