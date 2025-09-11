<?php
class Conect
{
    // جعلنا القيم ثابته لانها لن تتفير في السيستم
    private const host_name = 'localhost';
    private const user_name = "root";
    private const password = "";
    private const db = "school_system";

    private $conn;

    public function __construct()
    {
        //جمله الاتصال بالداتا بيز
        $this->conn = mysqli_connect(self::host_name, self::user_name, self::password, self::db);
    }
    public function insert(array $post, string $tablName): bool
    {
        $colms = [];
        $values = [];
        foreach ($post as $key => $value) {
            $colms[] =  $key;
            $values[] = "'" . $value . "'";   // جعل القيم داخل علامات تنصيص
        }
        $colmsString = implode(',', $colms);
        $valuesString = implode(',', $values);
        if ($this->conn->query("insert into $tablName($colmsString) values($valuesString)")) {
            return true;
        }
        return false;
    }
    public function select(string $tableNmae): array
    {

        $s = "SELECT * FROM $tableNmae  ";

        $rows =  $this->conn->query($s);

        if ($rows->num_rows > 0) {
            $data = $rows->fetch_all(MYSQLI_ASSOC);

            return $data;
        }
        return [];
    }

    public function selectOne($tableNmae, $id): array
    {
        $id=(int) $id;
        $s = "select * from $tableNmae where Id = $id  limit 1";

        $row = $this->conn->query($s);
        if ($row->num_rows > 0) {
            $data = $row->fetch_assoc();
            return $data;
        }
        return [];
    }

    public function update(array $post, string $tableName, $id):bool
    {
        $fieldValue = [];
        foreach ($post as $key => $value) {
            $fieldValue[] = "$key='$value'";
        }
        $fieldValueString = implode(',', $fieldValue);
        // print "<pre>";
        // print($fieldValueString);
        // exit;
        $s = "UPDATE $tableName set $fieldValueString where Id = $id ";
        if($this->conn->query($s))
        {
            return true;
        }
        return false;
    }
     
    public function login(string  $username,string $password){
        // this function check username , password to login  
                $s="SELECT * FROM users where user_name ='$username' and password='$password'";
                $row=$this ->conn->query($s);
                if($row->num_rows>0){
                    $data=$row->fetch_assoc();
                    return $data;
                }
                return [];
    }

    public function delete(string $tableName, $id): bool
    {
        $s = "DELETE FROM $tableName WHERE Id=$id";
        if ($this->conn->query($s)) {
            return true;
        }
        return false;
    }
}
