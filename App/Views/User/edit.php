<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Sửa thông tin người dùng</h4>
            <p><?= $msg ?? ""; ?></p>
            <form class="forms-sample container-custom" form method="post" action="<?= _WEB_ROOT ?>/User/edit" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputName1">Tên người dùng</label>
                    <input type="text" name="name" class="form-control" value="<?= $data["old"][0]['name'] ?? "" ?>">
                    <span style="color: red;"><?= $errors['name'] ?? "" ?></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Địa chỉ email</label>
                    <input type="email" name="email" class="form-control" value="<?= $data["old"][0]['email'] ?? "" ?>">
                    <span style="color: red;"><?= $errors['email'] ?? "" ?></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Mật khẩu</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                    <span style="color: red;"><?= $errors['password'] ?? "" ?></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Xác nhận lại mật khẩu</label>
                    <input type="text" name="confirm-pass" class="form-control" id="exampleInputPassword4" placeholder="confirm Password">
                    <span style="color: red;"><?= $errors['confirm-pass'] ?? "" ?></span>
                </div>
                <div class="form-group">
                    <label>File upload</label> </br>
                    <input type="file" name="file" id="file">
                </div>
                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>