
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
              <h3 class="mb-4 text-center">Have an account?</h3>
              <form action="#" class="signin-form" method="post">
                @csrf
                  <div class="form-group">
                      <input  type="email"
                      class="form-control{{ $errors->has('email') ? ' is-invalid':'' }}"
                      name="email"
                      placeholder="Email" required />
                      @error('email')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
            <div class="form-group">
              <input id="password-field" type="password"
              class="form-control{{ $errors->has('password') ? ' is-invalid':'' }}"
              name="password"
              placeholder="Password" required />
              @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
            </div>
            <div class="form-group d-md-flex">
                <div class="w-50">
                    <label class="checkbox-wrap checkbox-primary">Remember Me
                                  <input type="checkbox" checked>
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="w-50 text-md-right">
                                <a href="#" style="color: #fff">Forgot Password</a>
                            </div>
            </div>
          </form>
          <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
          <div class="social d-flex text-center">

          </div>
          </div>
            </div>
        </div>
    </div>
    <div class="container">
        @yield('content')
        </div>
</section>


