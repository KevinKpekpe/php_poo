<?php 
namespace Database;
use PDO;
class DBConnection{
    private $dbname;
    private $dbhost;
    private $username;
    private $password;
    private $pdo;


    public function __construct(string $dbname, string $dbhost, string $username, string $password)
    {
        $this->dbname = $dbname;
        $this->dbhost = $dbhost;
        $this->username = $username;
        $this->password = $password;
    }
    public function getPDO(): PDO 
    {
        return $this->pdo ?? $this->pdo = new PDO("mysql:host={$this->dbhost};dbname={$this->dbname}",$this->username,$this->password
        ,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8']);
    }
}