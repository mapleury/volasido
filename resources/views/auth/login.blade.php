<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Font: Playfair Display -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #6A100C;
      font-family: 'Playfair Display', serif;
      color: #EDE4D5;
    }

    .card {
      background-color: #EDE4D5;
      border: none;
      border-radius: 0; /* No round corners */
    }

    .card-body {
      color: #6A100C;
    }

    .form-label,
    .form-control {
      color: #6A100C;
    }

    .form-control::placeholder {
      color: #9a8f89;
    }

    .btn-dark {
      background-color: #6A100C;
      border: none;
    }

    a {
      color: #6A100C;
    }

    a:hover {
      text-decoration: underline;
    }

    .login-title {
      color: #6A100C;
    }
  </style>
</head>
<body>
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card shadow-lg">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="{{ asset('images/login.png') }}" style="width: 100%; max-width: 1000px;" alt="login form" class="img-fluid"/>

              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <span class="h1 fw-bold mb-0 login-title">Login</span>
                    </div>

                    <div class="form-outline mb-2">
                      <label class="form-label" for="email">Email address</label>
                      <input type="email" id="email" name="email"
                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" required autocomplete="email" autofocus />
                      @error('email')
                        <span class="text-danger small">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="password">Password</label>
                      <input type="password" id="password" name="password"
                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                        required autocomplete="current-password" />
                      @error('password')
                        <span class="text-danger small">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                    </div>

                    @if (Route::has('register'))
                      <p class="mb-2">
                        Don't have an account?
                        <a href="{{ route('register') }}">Register here</a>
                      </p>
                    @endif

                    <p class="mb-5">
                      <a href="{{ url('/') }}">← Back to Home</a>
                    </p>

                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
