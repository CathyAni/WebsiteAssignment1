<?php

// namespace .;
class MysqlConnector
{

    private $servername;

    private $username;

    private $password;

    private $conn;

    private $dbname;

    public function __construct($server = "localhost", $user = "root", $pass = null, $db = "websystems")
    {
        $this->dbname = $db;
        $this->servername = $server;
        $this->password = $pass;
        $this->username = $user;
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection error");
        }
    }

    public function getConnector()
    {
        return $this->conn;
        // return $this->password;
    }


    public function nono()
    {
        strtoupper($this->password);
    }
    public function createUserInDb($firstname, $lastname, $email, $password)
    {
        $firstname = $this->securecontent($firstname);
        $lastname = $this->securecontent($lastname);
        $email = $this->securecontent($email);
        $password = md5($password);
        $createdAt = new DateTime();
        $modifiedAt = new DateTime();

        $sql = "INSERT INTO users (firstname, lastname, password, email, createdAt, modifiedAt)
    VALUES ('$firstname', '$lastname', '$password', '$email')";
        var_dump(mysqli_query($this->conn, $sql));
        if (mysqli_query($this->conn, $sql)) { 
            return true;
        } else{
            return false;
        }
    }
    /**
     * This strips all input of malicious contents
     * @return string
     * @param string
     */
    private function securecontent(string $content)
    {
        $ctn = strip_tags($content);
        return $ctn;
    }
}
