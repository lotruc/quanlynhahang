<x-login-layout>
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
    
                  <div class="d-flex justify-content-center py-4">
                    <a href="index.html" class="logo d-flex align-items-center w-auto">
                      <img src="assets/img/logo.png" alt="">
                      <span class="d-none d-lg-block">NiceAdmin</span>
                    </a>
                  </div><!-- End Logo -->
    
                  <div class="card mb-3">
    
                    <div class="card-body">
    
                      <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Tạo tài khoản</h5>
                        <p class="text-center small">Nhập các chi tiết cá nhân để tạo tài khoản</p>
                      </div>
    
                      <form class="row g-3 needs-validation" method="POST" action="{{route('register')}}" novalidate>
                        @csrf
                        <div class="col-12">
                          <label for="name" class="form-label">Tên của bạn </label>
                          <input type="text" name="name" class="form-control" id="yourName" required>
                          <div class="invalid-feedback">Vui lòng nhập tên của bạn</div>
                        </div>
    
                        <div class="col-12">
                          <label for="email" class="form-label">Gmail</label>
                          <input type="email" name="email" class="form-control" id="yourEmail" required>
                          <div class="invalid-feedback">Vui lòng nhập địa chỉ gmail</div>
                        </div>
    
                        <div class="col-12">
                          <label for="password" class="form-label">Mật khẩu</label>
                          <input type="password" name="password" class="form-control" id="yourPassword" required>
                          <div class="invalid-feedback">Vui lòng nhập mật khẩu của bạn</div>
                        </div>
                        <div class="col-12">
                          <label for="password_confirmation" class="form-label">Mật khẩu</label>
                          <input type="password" name="password_confirmation" class="form-control" id="yourPassword" required>
                          <div class="redirect()->back()->withErrors">Vui lòng nhập mật khẩu của bạn</div>
                        </div>
                        
                        <div class="col-12">
                          <button class="btn btn-primary w-100" type="submit">Tạo tài khoản</button>
                        </div>
                        <div class="col-12">
                          <p class="small mb-0">Bạn có sẵn sàng để tạo một tài khoản? <a href="{{ route('login') }}">Đăng nhập</a></p>
                        </div>
                    </form>

                </div>
              </div>

            
            </div>
          </div>
        </div>

      </section>
</x-login-layout>