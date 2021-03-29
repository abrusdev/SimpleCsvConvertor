<?php /** @noinspection SqlNoDataSourceInspection */

class Database
{
    private $tableName = Constants::TABLE_NAME;
    /**
     * @var mysqli
     */
    private $conn;

    public function __construct($username, $password, $db)
    {
        $this->conn = mysqli_connect("localhost", $username, $password, $db);
        $this->createTable();
    }

    public function createTable()
    {
        if (!$this->hasTable()) {
            $this->conn->query("CREATE TABLE $this->tableName (
                id INT(10) UNSIGNED PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                date VARCHAR(255) NOT NULL,
                position VARCHAR(100) NOT NULL,
                salary INT(10) NOT NULL
            )");
        }
    }

    /**
     * @param $name
     * @return bool
     */
    private function checkUser($name)
    {
        $item = $this->conn->query("SELECT * from $this->tableName WHERE name = '$name'");
        return $item;
    }

    public function addOrUpdateItem(User $user)
    {
        $id = $user->getId();
        $name = $user->getName();
        $date = $user->getDate();
        $position = $user->getPosition();
        $salary = $user->getSalary();
        if (!$this->checkUser($user->getName())) {
            $this->conn->query("INSERT INTO $this->tableName (id, name, date, position, salary)
                VALUES ('$id', '$name', '$date', '$position', '$salary')");
        } else {
            $this->conn->query("UPDATE $this->tableName SET name = '$name', date = '$date', position = '$position', salary = '$salary' WHERE name = '$name'");
            echo $this->conn->error;
        }
    }

    /**
     * @return bool
     */
    private function hasTable()
    {
        return $this->conn->query("SELECT 1 FROM $this->tableName LIMIT 1") == true;
    }

    public function __destruct()
    {
        $this->conn->close();
    }

}
