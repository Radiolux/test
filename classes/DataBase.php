<?php
require_once($_SERVER['DOCUMENT_ROOT']."/scripts/constants.php");
class DataBase
{
    private $db;

    // підключення
    public function __construct()
    {
        $this->db = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    }

    // запит
    public function query($sql)
    {
        return mysqli_query($this->db ,$sql);
    }

    // один запис
    public function fetchOne($sql,$type=MYSQLI_ASSOC)
    {
        $result = $this->query($sql);
        return mysqli_fetch_array($result,$type);
    }

    // Всі записи
    public function fetchAll($sql,$type=MYSQLI_ASSOC)
    {
        $result=$this->query($sql);
        while(@$row=mysqli_fetch_array($result,$type)){
            $rows[]=$row;
        }
        return $rows;
    }

    // новий
    public function add ($table ,$arr)
    {
        if ( is_array($arr) )
        {
            $columns = '';
            $values = '';
            foreach ( $arr as $k => $v )
            {
                $columns .= $k.',';
                $values .= "'".$v."'".',';
            }
            $columns = trim($columns ,',');
            $values = trim($values ,',');

            $sql= "INSERT INTO $table ($columns) VALUES ($values)";
            $this->query($sql);
            return mysqli_insert_id($this->db);
        }
    }

    // змінити
    public function edit ($table ,$arr ,$where)
    {
        if ( is_array($arr) )
        {
            $modify = '';
            foreach ($arr as $key => $val) {
                $modify .= "`".$key."`='".$val."',";
            }
            $modify = trim($modify ,',');
            $sql = "UPDATE $table SET $modify WHERE $where";

            if ( $this->query($sql) )
            {
                return mysqli_affected_rows($this->db);
            }
            return false;
        }
    }

    // Видалити запис
    public function del($table ,$where='')
    {
        $sql = "delete from {$table}";
        $sql .= $where===''? '': ' where '.$where;
        $this->query($sql);
        return mysqli_affected_rows($this->db);
    }

    function __destruct()
    {
        mysqli_close($this->db);
    }
}
