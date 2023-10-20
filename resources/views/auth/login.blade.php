<x-login-layout>


    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
    
                  <div class="d-flex justify-content-center py-4">
                    <a href="index.html" class="logo d-flex align-items-center w-auto">
                      <img src="{{asset('admin/assets/img/logo.png')}}" alt="">
                      <span class="d-none d-lg-block">UserAdmin</span>
                    </a>
                  </div><!-- End Logo -->
    
                  <div class="card mb-3">
    
                    <div class="card-body">
    
                      <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Đăng nhập tài khoản của bạn</h5>
                        <p class="text-center small">Nhập tên người dùng và mật khẩu</p>
                      </div>
    
                      <form class="row g-3 needs-validation" method="POST" action="{{route('login')}}" novalidate>
                          @csrf
                        <div class="col-12">
                          <label for="email" class="form-label">email</label>
                          <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend"></span>
                            <input type="text" name="email" class="form-control" id="email" required>
                            <div class="invalid-feedback">vui lòng nhập email</div>
                          </div>
                        </div>
    
                        <div class="col-12">
                          <label for="password" class="form-label">Mật khẩu</label>
                          <input type="password" name="password" class="form-control" id="yourPassword" required>
                          <div class="invalid-feedback">Vui lòng nhập mật khẩu </div>
                        </div>
    
                       
                        <div class="col-12">
                          <button class="btn btn-primary w-100" type="submit">Đăng nhập</button>
                        </div>
                        <div class="col-12">
                          <p class="small mb-0">Bạn chưa Có tài khoản? <a href="{{route('register')}}">Đăng kí tài khoản</a></p>
                        </div>
                      </form>
    
                    </div>
                  </div>
    
                </div>
              </div>
            </div>
    
          </section>
    </x-login-layout>