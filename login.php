<?php
session_start();

echo $_SESSION['welcome']; //this is where the variable is used but it was defined at the index
?>
<html>

<head>

</head>

<body>
    <div id="menu"></div>
    <div id="header"></div>
    <div id="container">
        <h3>Login Form</h3>
        <form action="/login.php">
            <label for="fname">Username:</label>
            <input type="text" id="username" name="username"><br><br> <!-- defines the input field -->
            <label for="lname">Password:</label>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Submit">
        </form>

        <a href="register.php">Click to Register</a>
    </div>
    <div id="footer"></div>

    

</body>

</html>