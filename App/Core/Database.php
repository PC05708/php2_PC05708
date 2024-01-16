<?php

class Database
{
    private $db_url = "mysql:host=localhost;dbname=php2;charset=utf8";
    private $username = 'root';
    private $password = 'mysql';

    public function pdo_get_connection()
    {
        try {
            $conn = new PDO($this->db_url, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function pdo_execute($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $conn = $this->pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($conn);
        }
    }

    public function pdo_query($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $conn = $this->pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
            $rows =  $stmt->fetchAll();
            return $rows;
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($conn);
        }
    }
    public function pdo_query_one($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $conn = $this->pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($conn);
        }
    }
}
