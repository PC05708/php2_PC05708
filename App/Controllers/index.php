<?php
require "../Core/Database.php";
$url_assets = "../../public/";
$url_pages = "../Views/";

include $url_pages . "partials/header.php";
include $url_pages . "partials/sidebar.php";

if (isset($_SESSION['user'])) {
  if (isset($_GET['page'])) {
    $DB = new Database;
    $data = [];
    if (isset($_GET['page'])) {
      $sql = "SELECT * FROM " . $_GET['page'];
      $data = $DB->pdo_query($sql);
    }
    switch ($_GET['page']) {
      case "categories":
        switch ($_GET['action']) {
          case "add":
            include $url_pages . "pages/Categories/addCategory.php";
            break;
          case "list":
            include $url_pages . "pages/Categories/listCategory.php";
            break;
        }
        break;
      case "users":
        switch ($_GET['action']) {
          case "add":
            include $url_pages . "pages/Users/addUser.php";
            break;
          case "list":
            include $url_pages . "pages/Users/listUser.php";
            break;
        }
        break;
      case "products":
        switch ($_GET['action']) {
          case "add":
            include $url_pages . "pages/Products/addProduct.php";
            break;
          case "list":
            include $url_pages . "pages/Products/listProduct.php";
            break;
        }
        break;
      default:
        include $url_pages . "partials/home.php";
    }
  } else {
    include $url_pages . "partials/home.php";
  }
} else {
  if (isset($_GET['action'])) {
    switch ($_GET['action']) {
      case "login":
        include $url_pages . "pages/Accounts/login.php";
        break;
      case "register":
        include $url_pages . "pages/Accounts/register.php";
        break;
    }
  } else {
    include $url_pages . "pages/Accounts/login.php";
  }
}

include $url_pages . "partials/footer.php";
