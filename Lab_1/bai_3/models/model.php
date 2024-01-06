<?php
function get_users($email)
{
    include "config.php";
    $sql = "SELECT * FROM users where email = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    // lay ket qua
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        return $row;
    }
    $connection->close();
}
