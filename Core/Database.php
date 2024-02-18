<?php
class Database
{
    private $__conn;
    use QueryBuilderTrait;
    public function __construct()
    {
        global $db_config;
        $this->__conn = Connection::getInstance($db_config);
    }
    function insert($table, $data)
    {
        if (!empty($data)) {
            $fieldStr = "";
            $valueStr = "";
            foreach ($data as $k => $v) {
                $fieldStr .= $k . ",";
                $valueStr .= "'" . $v . "',";
            }
            $fieldStr = rtrim($fieldStr, ",");
            $valueStr = rtrim($valueStr, ",");

            $sql = "INSERT INTO $table($fieldStr) VALUES ($valueStr)";
            $status = $this->query($sql);
            if ($status) {
                return true;
            }
        }
        return false;
    }
    function update($table, $data, $conditional = "")
    {
        if (!empty($data)) {
            $updateStr = "";
            foreach ($data as $k => $v) {
                $updateStr .= "$k='$v',";
            }
            $updateStr = rtrim($updateStr, ",");
            if (!empty($conditional)) {
                $sql = "UPDATE $table SET $updateStr WHERE $conditional";
            } else {
                $sql = "UPDATE $table SET $updateStr";
            }
            $status = $this->query($sql);
            if ($status) {
                return true;
            }
        }
        return false;
    }
    function query($sql)
    {
        try {
            $stmt = $this->__conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch (Exception $e) {
            $mess = $e->getMessage();
            $data['message'] = $mess;
            App::$app->loadErrors("Database", $data);
            return false;
        }
    }
}
