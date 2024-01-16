<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth">
      <div class="row flex-grow">
        <div class="col-lg-4 mx-auto">
          <div class="auth-form-light text-left p-5">
            <div class="brand-logo">
              <img src="<?= $url_assets ?>assets/images/logo.svg">
            </div>
            <h4>ĐĂNG NHẬP</h4>
            <form class="pt-3">
              <div class="form-group">
                <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Tên đăng nhập">
              </div>
              <div class="form-group">
                <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Mật khẩu">
              </div>
              <div class="mt-3">
                <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN IN</a>
              </div>
              <div class="mt-1">
                <a href="#" class="auth-link text-black">Quên mật khẩu?</a>
              </div>
              <div class="text-center mt-4 font-weight-light">
                <p>Bạn không có tài khoản?</p>
                <a href="?page=Accounts&action=register" class="text-primary">Tạo tài khoản</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>