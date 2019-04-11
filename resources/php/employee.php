<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Welcome to your page</title>
		<link rel="stylesheet" type="text/css" href="resources/css/master.css">
	</head>
	<body>
		<nav>
			<img id="logo" src="resources/images/Logo.svg" alt="logo" draggable="false">
			<section id = "buttons">
<!--				<a href="">View Schedule</a>-->
				<a href="todo.html">Add a TO-DO</a>
                                <a href="viewToDo.php">View your TO-DO list</a>
                                <a href="delete.html">Delete a To-DO</a>

			</section>
				
		</nav>
            <br><br><br>
            <h2>
                <?php 
                $username = $_SESSION['username'];
                if($username== NULL){
                    echo "<script> location.href='login.html'; </script>";
                }
                echo  'Welcome '.$username ;?>
            </h2>
		
		
	</body>
</html>