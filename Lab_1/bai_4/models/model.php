<?php
function get_users()
{
    include "config.php";
    $sql = "SELECT * FROM users";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    // lay ket qua
    $result = $stmt->get_result();
    $data = [];
    if ($result->num_rows > 0) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
    }
    return $data;
    $connection->close();
}
