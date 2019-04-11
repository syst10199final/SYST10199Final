<!--
Page handling login functionality.

@author Essa Tahir
@author Jerome Martina
-->
<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TrueBlu - Login</title>
        <link rel="stylesheet" type="text/css" href="../css/login.css">
    </head>
    <body>
        <nav>
            <a href="../../index.html"><img id="logo" src="../images/logo.svg" alt="logo" draggable="false"></a>
        </nav>
        <section class="page-wrapper">
            <form action="login_redirect.php" method="POST">
                <div id="employee-login-form-container">
                    <h1>Employee Login</h1>
                    Username<br>
                    <input type="text" name="employee-username" placeholder="Username" required><br><br>
                    Password<br>
                    <input type="password" name="employee-password" placeholder="Password" required><br><br>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember Me
                    </label>
                    <input type="submit" value="Login">
                </div>
            </form>
            <form action="login_redirect.php" method="POST">
                <div id="manager-login-form-container">
                    <h1>Manager Login</h1>
                    Username<br>
                    <input type="text" name="manager-username" placeholder="Username" required><br><br>
                    Password<br>
                    <input type="password" name="manager-password" placeholder="Password" required><br><br>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember Me
                    </label>
                    <input type="submit" value="Login">
                </div>
            </form>
        </section>
        <footer>TrueBlu 2019 &#169 Essa Tahir, Gregory Knott, Jerome Martina, Mohammad Shoeb, Willem Wantenaar</footer>
    </body>
</html>