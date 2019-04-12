<!--
Page handling login functionality.

@author Essa Tahir
-->
<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TrueBlu - Login</title>
        <link rel="stylesheet" type="text/css" href="../css/master.css">
        <link rel="stylesheet" type="text/css" href="../css/login.css">
    </head>
    <body>
        <nav>
            <a href="../../index.html"><img id="logo" src="../images/Logo.svg" alt="logo" draggable="false"></a>
        </nav>
        <main id="page-wrapper">
            <div id="employee-login-form-container">
                <form action="login_redirect.php" method="POST">
                    <h1>Employee Login</h1>
                    Username<br>
                    <input type="text" name="employee-username" placeholder="Username" required><br><br>
                    Password<br>
                    <input type="password" name="employee-password" placeholder="Password" required><br><br>
                    <label>
                        <!-- <input type="checkbox" checked="checked" name="remember">Remember Me 
                        This feature beyond the scope of the class and thus not implemented. -->
                    </label>
                    <input type="submit" value="Login">
                </form>
            </div>
            <div id="manager-login-form-container">
                <form action="login_redirect.php" method="POST">
                    <h1>Manager Login</h1>
                    Username<br>
                    <input type="text" name="manager-username" placeholder="Username" required><br><br>
                    Password<br>
                    <input type="password" name="manager-password" placeholder="Password" required><br><br>
                    <label>
                        <!-- <input type="checkbox" checked="checked" name="remember">Remember Me 
                        This feature beyond the scope of the class and thus not implemented. -->
                    </label>
                    <input type="submit" value="Login">
                </form>
            </div>
            <!-- TODO Create way to alert user of error if login fails. Current site 
            architecture prohibits effective use of session management to achieve this goal. -->
        </main>
        <footer>TrueBlu 2019 &#169; Essa Tahir, Gregory Knott, Jerome Martina, Mohammad Shoeb, Willem Wantenaar</footer>
    </body>
</html>
