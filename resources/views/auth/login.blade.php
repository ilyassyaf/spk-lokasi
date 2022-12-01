<!doctype html>
<html lang="en" class="minimal-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
  <!-- Bootstrap CSS -->
  <link href="{{asset("assets/css/bootstrap.min.css")}}" rel="stylesheet" />
  <link href="{{asset("assets/css/bootstrap-extended.css")}}" rel="stylesheet" />
  <link href="{{asset("assets/css/style.css")}}" rel="stylesheet" />
  <link href="{{asset("assets/css/icons.css")}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- loader-->
	<link href="{{asset("assets/css/pace.min.css")}}" rel="stylesheet" />

  <title>{{ config('app.name', 'Laravel') }} - Sign In</title>
</head>

<body>

  <!--start wrapper-->
  <div class="wrapper">
    
       <!--start content-->
       <main class="authentication-content">
        <div class="container-fluid">
          <div class="authentication-card">
            <div class="card shadow rounded-0 overflow-hidden">
              <div class="row g-0">
                <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                  <img src="assets/images/error/login-img.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6">
                  <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title">Sign In</h5>
                    <form method="POST" action="{{ route('login') }}" class="form-body">
                      @csrf
                        <div class="row g-3">
                          <div class="col-12">
                            <label for="inputEmailAddress" class="form-label">Email Address</label>
                            <div class="ms-auto position-relative">
                              <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-envelope-fill"></i></div>
                              <input type="email" class="form-control radius-30 ps-5 @error('email') is-invalid @enderror" id="email" placeholder="Email Address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                              @error('email')
                                <div id="emailValidation" class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-12">
                            <label for="inputChoosePassword" class="form-label">Password</label>
                            <div class="ms-auto position-relative">
                              <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                              <input type="password" class="form-control radius-30 ps-5 @error('password') is-invalid @enderror" id="password" placeholder="Enter Password" name="password" required autocomplete="current-password">
                              @error('password')
                                <div id="passwordValidation" class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                              <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="d-grid">
                              <button type="submit" class="btn btn-primary radius-30">Sign In</button>
                            </div>
                          </div>
                        </div>
                    </form>
                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </main>
       <!--end page main-->

  </div>
  <!--end wrapper-->


  <!--plugins-->
  <script src="{{asset("assets/js/jquery.min.js")}}"></script>
  <script src="{{asset("assets/js/pace.min.js")}}"></script>


</body>

</html>