@include('common.header')
    <header>
      <nav class="navbar navbar-expand-md navbar-light">
        <a class="navbar-brand" href="{{ url('/')}}"><img src="{{ asset('wa/assets/img/logo.png') }}" /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarTogglerDemo03"
          aria-controls="navbarTogglerDemo03"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <a
            href="javascript:void(0)"
            data-toggle="collapse"
            data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03"
            class="closebtn outer_close_btn"
            >×</a
          >
          <ul class="navbar-nav text-capitalize mx-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#"
                >Live Classes <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Packages</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">11+Exam</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"> Study Material </a>
            </li>
          </ul>
          <div class="my-2 my-lg-0 login_block">
            <button
              class="btn btn_block text-capitalize my-2 my-sm-0"
              type="button"
              id="login"
            >
              <a href="{{ url('student-login') }}">Login</a>
            </button>
            <button
              class="btn btn_block text-capitalize my-2 my-sm-0"
              type="button"
              id="register"
            >
              <a href="{{ url('#') }}">Register</a>
            </button>
          </div>
        </div>
      </nav>
    </header>
    <section class="d-flex justify-content-center">
      <section class="image_section">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="image_block">
                <img class="register-img" src="{{ asset('wa/assets/img/register.png') }}" alt="login" title="login" />
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="login_block_block">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="register_title mt-5 mb-5">Register here</div>
              <div class="pos-rel">
                <div id="organizer-details" class="tab-pane active">
                  @include('_form.success')

                  <form class="seminor-login-form" method="POST" action="{{ route('student-register') }}">
                    @csrf
                    <div class="form-group">
                      <input
                        type="text"
                        name="name"
                        class="form-control"
                        required
                        autocomplete="off"
                      />
                      <label
                        class="form-control-placeholder"
                        for="alternative-email"
                        >First Name</label
                      >
                    </div>
                    <div class="form-group">
                      <input
                        type="text"
                        name="last_name"
                        class="form-control"
                        required
                        autocomplete="off"
                      />
                      <label
                        class="form-control-placeholder"
                        for="contact-number"
                        >Last Name</label
                      >
                    </div>
                    <div class="form-group">
                      <input
                        type="email"
                        name="email"
                        class="form-control"
                        required
                        autocomplete="off"
                      />
                      <label
                        class="form-control-placeholder"
                        for="contact-person"
                        >Email Address</label
                      >
                    </div>
                    <div class="form-group">
                      <input
                        type="number"
                        name="mobile_number"
                        class="form-control"
                        required
                        autocomplete="off"
                      />
                      <label
                        class="form-control-placeholder"
                        for="alternative-number"
                        >Mobile No.</label
                      >
                    </div>
                    <div class="form-group">
                      <input
                        type="password"
                        name="password"
                        class="form-control"
                        required
                        autocomplete="off"
                      />
                      <label
                        class="form-control-placeholder"
                        for="contact-email"
                        >Password</label
                      >
                    </div>
                      <div class="form-group">
                        <input
                          type="password"
                          name="password_confirmation"
                          class="form-control"
                          required
                          autocomplete="off"
                        />
                        <label
                          class="form-control-placeholder"
                          for="contact-email"
                          > confirmation Password</label
                        >
                    </div>
                     <div class="btn-check-log">
                      <button type="submit" class="btn-check-login">
                        Register
                      </button>
                    </div>
                    <div class="form-group mt-3">
                      <label class="container-checkbox">
                        Remember Me
                        <input type="checkbox" checked="checked" required />
                        <span class="checkmark-box"></span>
                      </label>
                    </div>

                  </form>
                </div>
                <!-- Tab panes -->
              </div>
              <div class="sepration ml-5">
                <p class="subtitle fancy"><span>OR</span></p>
              </div>
              <div class="social_icon ml-1">
                <a href="#"> <img src="{{ asset('wa/assets/img/fb.svg') }}" /></a>
                <a href="#"> <img src="{{ asset('wa/assets/img/Google.svg') }}" /></a>
              </div>
              <p class="ml-1 mt-3 class="loginpera">
                <span class="account">Already have an account? </span
                ><span class="register"><a href="{{ url('student-login') }}">Login here</a></span>
              </p>
            </div>
          </div>
        </div>
      </section>
    </section>

    <!-- card-tab section  -->
    <!-- footer from section -->

    @include('common.main_footer')
     <script>
      document.FIX_HEADER_TOP = 35;
    </script>
    <!-- Swiper JS -->
    <script src="{{ asset('wa/coustom.js') }}"></script>
  </body>
</html>
