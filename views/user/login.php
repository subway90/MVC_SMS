<style>
    body {
        background-image: url('https://t3.ftcdn.net/jpg/03/41/31/80/240_F_341318068_0SzEc9byllL4XCZHnrsl4dAnIRagjDta.jpg');
        background-size: auto;
        background-position: center;
        background-repeat: repeat;
    }
    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ffffff80;
    }
</style>

<div class="container d-flex justify-content-center align-items-center mt-5 pt-5">
    <div class="col-12 col-md-12 col-lg-4 bg-light p-4 p-lg-5 shadow">
            <div class="col-12">
                <h4 class="text-primary fw-bold text-center mb-5">Đăng nhập</h4>
            </div>
            <form action="/dang-nhap<?= $return_checkout_page ? '/thanh-toan' : '' ?>" method="post">
                <div class="col-12 text-center d-flex justify-content-center">
                    <div class="form-floating floating-sm mb-3 w-100">
                        <input type="text" name="username" value="<?=$username?>" class="form-control" id="floatingInput" placeholder="Nhập TK" autocomplete="new-password">
                        <label for="floatingInput">Số điện thoại</label>
                    </div>
                </div>
                <div class="col-12 text-center d-flex justify-content-center">
                    <div class="form-floating floating-sm mb-3 w-100">
                        <input type="password" name="password" class="form-control" id="floatingInput" placeholder="MK">
                        <label for="floatingInput">Mật khẩu</label>
                    </div>
                </div>
                <div class="col-12 text-center my-2">
                    <button name="login" type="submit" class="btn btn-outline-primary w-100 py-2">
                        Đăng nhập
                    </button>
                </div>
                <div class="col-12 d-flex justify-content-between">
                    <a class="nav-link text-primary" href="#">
                        <i class="fas fa-user-plus small"></i>
                        <span class="small ms-1">Đăng ký tài khoản</span>
                    </a>
                    <a class="nav-link text-danger" href="#">
                        <i class="fas fa-question-circle small"></i>
                        <span class="small ms-1">Quên mật khẩu</span>
                    </a>
                </div>
            </form>
    </div>
</div>