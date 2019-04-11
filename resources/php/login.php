<?php
session_start();
require("connect.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TrueBlu Calendar Scheduler</title>
        <link rel="stylesheet" type="text/css" href="../css/login.css">
    </head>
    <body>
        <nav>
            <img id="logo" src="../images/logo.svg" alt="logo" draggable="false">
            <section id = "login">
                <a>Log in</a>
            </section>
        </nav>
        <?php
        try {
            $dbh = new PDO("mysql:host=localhost;dbname=martinaJ_TrueBlu", $user, $passwd);
        } catch (PDOException $e) {
            echo 'Connection error: ' . $e->getMessage();
        }

        if (isset($_POST['username'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $_SESSION['username'] = $username;

            $command = "SELECT * from login where username = '$username' and password = '$password' "; //set up command"
            $stmt = $dbh->prepare($command); //prepare PDO statement ";
            $execOk = $stmt->execute(); //execute the statement  "

            if ($execOk) { //Check if error executing query   "
                if ($stmt->rowCount() == 0)
                //echo "<script> location.href='Incorrect.php'; </script>";
                //echo 'Incorrect username or password';
                    if ($stmt->rowCount() == 1) {
                        //echo 'Login Successful';
                        echo "<script> location.href='employee.php'; </script>";


                        exit;
                    }
            } else
                echo 'Error executing query: ';

            //unset($username, $password);
        }

        if (isset($_POST['username2'])) {

            $username1 = $_POST['username2'];
            $password1 = $_POST['password2'];

            $_SESSION['username2'] = $username;

            $command = "SELECT * from login where username = '$username1' and password = '$password1' "; //set up command"
            $stmt = $dbh->prepare($command); //prepare PDO statement ";
            $execOk = $stmt->execute(); //execute the statement  "

            if ($execOk) { //Check if error executing query   "
                if ($stmt->rowCount() == 0)
                //echo "<script> location.href='Incorrect.php'; </script>";
                //echo 'Incorrect username or password';
                    if ($stmt->rowCount() == 1) {
                        //echo 'Login Successful';
                        echo "<script> location.href='manager.php'; </script>";


                        exit;
                    }
            } else
                echo 'Error executing query: ';

            //unset($username, $password);
        }
        ?>
<!--        <section class="page-wrapper" >

            <form action="index.php" method="POST">
                <div class="imgcontainer">
                    <img src="../resources/images/login.jpg" alt="Avatar" class="avatar">
                </div>

                <div class="container" style="float: left;">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="username" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required>

                    <button type="submit">Manager Login</button>
                    <button type="submit">Employee Login</button>

                </div>

                <div class="container" style="background-color:#f1f1f1;">
                    <button type="button" class="cancelbtn" href="index.html">Cancel</button>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                </div>
            </form>

        </section>-->
        <section class="page-wrapper">
            <form name="login" action="login.php" method="POST">
                <div style="float: left;" >

                    <h1>Employee Login</h1>
                    <!--                    <div class="imgcontainer">
                                            <img src="login.jpg" alt="Avatar" class="avatar">
                                        </div>-->
                    UserName<br>
                    <input type="text" name="username" placeholder="Username " required><br><br>
                    Password<br>
                    <input type="password" name="password" placeholder="Password" required><br><br>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>

                    <input class="cancelbtn"type="submit" value="Login">
                    <!--                    <button type="button" class="cancelbtn" href="index.html">Cancel</button><br>
                                        <span class="psw">Forgot <a href="#">password?</a></span>-->
                </div>
            </form>
            <form action="login.php" method="POST">
                <div style="float: right;" >
                    <h1>Manager Login</h1>
                    <!--                    <div class="imgcontainer">
                                            <img src="login.jpg" alt="Avatar" class="avatar">
                                        </div>-->
                    UserName<br>
                    <input type="text" name="username2" placeholder="Username " required><br><br>
                    Password<br>
                    <input type="password" name="password2" placeholder="Password" required><br><br>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                    <input class="cancelbtn"type="submit" value="Login">
                    <!--                    <button type="button" class="cancelbtn" href="index.html">Cancel</button>
                                        <span class="psw">Forgot <a href="#">password?</a></span>-->
                </div>
            </form>
        </section
        <footer> TrueBlu 2019 &#169 Essa Tahir, Gregory Knott, Jerome Martina, Mohammad Shoeb, Willem Wantenaar</footer>
    </body>
</html>