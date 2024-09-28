<!-- LOGIN FORM START -->
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="{{url('/')}}" class="h1"><b>Renta</b>CAR</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form id="loginForm" onsubmit="adminLogin();return false;">
                <div class="input-group mb-3">
                    <input type="email" value="admin@gmail.com" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" password="Pa$$w0rd!" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <div class="text-center errorMsg p-3"></div>
            <p class="mb-1">
                <a href="/forgot/password">I forgot my password</a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- LOGIN FORM END -->