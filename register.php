<html>

<head>

</head>

<body>


    <div id="menu"></div>
    <div id="header"></div>
    <div id="container">
        <h3>Login Form</h3>

        <?php
        require_once("MysqlConnector.php");
        $conect = new MysqlConnector();
        //$username = $_POST["username"];

        //var_dump ('lllx');
        //var_dump ($_POST["submit"]);
        if (isset($_POST["submit"])) {
            //var_dump ('lll');
            $username = $_POST["username"];
            $firstname = $_POST["firstname"];
            $surname = $_POST["surname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $cpassword = $_POST["cpassword"];
            //echo $username;
            if ($password === $cpassword) {
                //$sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";
                $isInsert = $conect->createUserInDb($firstname, $surname, $email, $password);
                if($isInsert == true){
                    echo 'data inserted';
                }
            }
            else{
                echo "Passwords do not match";
            }
        }

        ?>
        <form method='post' action="/register.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username"><br><br> <!-- defines the input field -->

            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname"><br><br>

            <label for="surname">Surname:</label>
            <input type="text" id="surname" name="surname"><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email"><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password"><br><br>

            <label for="cpassword">Confirm Password:</label>
            <input type="password" id="cpassword" name="cpassword"><br><br>
            <input type="submit" value="Submit" name="submit">
        </form>

        <a href="login.php">Back to Login</a>
    </div>
    <div id="footer"></div>

</body>

</html>