<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth">
      <div class="row flex-grow">
        <div class="col-lg-4 mx-auto">
          <div class="auth-form-light text-left p-5">
            <div class="brand-logo">
              <img src="<?= $url_assets ?>assets/images/logo.svg">
            </div>
            <h4>ĐĂNG KÝ</h4>
            <form class="pt-3">
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Tên đăng nhập">
              </div>
              <div class="form-group">
                <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
              </div>
              <div class="form-group">
                <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Mật khẩu">
              </div>
              <div class="form-group">
                <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Xác nhận mật khẩu">
              </div>
              <div class="mb-4">
                <div class="form-check">
                  <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input"> Tôi đồng ý với các điều khoản! </label>
                </div>
              </div>
              <div class="mt-3">
                <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">ĐĂNG KÝ</a>
              </div>
              <div class="text-center mt-4 font-weight-light">
                <p>Bạn đã có tài khoản?</p>
                <a href="?page=Accounts&action=login" class="text-primary">Đăng nhập</a>
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