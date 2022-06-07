<?php
class DB{
    public $con;
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "mvc";
    protected $port = "3307";
    protected $socket = "";

    function __construct() {
        try {
            $this->con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname, $this->port, $this->socket);
        } catch (mysqli_sql_exception $e) { 
            die("Unfortunately, the details you entered for connection are incorrect!");
        }
        // check bug
        // mysqli_query($this->con, "SET NAME 'utf8'");
        $this->con->set_charset("utf8");
    }
}
?>