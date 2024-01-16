<div class="container-fluid page-body-wrapper">
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="<?= $url_assets ?>assets/images/faces/face1.jpg" alt="profile">
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2">Lê Thanh Mẩn</span>
            <span class="text-secondary text-small">Admin page</span>
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      <!-- my sidebar -->
      <!-- Users -->
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#users" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Quản lí người dùng</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-contacts menu-icon"></i>
        </a>
        <div class="collapse" id="users">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="?page=users&action=add">Thêm người dùng</a></li>
            <li class="nav-item"> <a class="nav-link" href="?page=users&action=list">Danh sách người dùng</a></li>
          </ul>
        </div>
      </li>
      <!-- Products -->
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#products" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Quản lí sản phẩm</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-package-variant menu-icon"></i>
        </a>
        <div class="collapse" id="products">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="?page=products&action=add">Thêm sản phẩm</a></li>
            <li class="nav-item"> <a class="nav-link" href="?page=products&action=list">Danh sách sản phẩm</a></li>
          </ul>
        </div>
      </li>
      <!-- categories -->
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#categories" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Danh mục sản phẩm</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-book-plus menu-icon"></i>
        </a>
        <div class="collapse" id="categories">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="?page=categories&action=add">Thêm Danh mục</a></li>
            <li class="nav-item"> <a class="nav-link" href="?page=categories&action=list">Danh sách Danh mục</a></li>
          </ul>
        </div>
      </li>
      <!-- ======================================= -->
    </ul>
  </nav>
  <div class="main-panel">