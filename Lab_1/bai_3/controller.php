<?php
include "models/model.php";
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $user = get_users($email);
}
include "view.php";
