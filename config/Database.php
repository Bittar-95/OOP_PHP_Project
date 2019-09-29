<?php
class database
{
    private $db_name = "my_application";
    private $host = "localhost";
    private $user_name = "root";
    private $password = "123456789";
    public $connection;


    public function db_connection()
    {
        try {

            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->user_name, $this->password);
            return $this->connection;

        } catch (PDOExecption $exception) {
            echo $exception->getMessage();
        }

    }
}
?>
