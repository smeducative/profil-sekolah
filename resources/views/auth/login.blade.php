<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>


    <!-- Styles -->
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta3/dist/css/tabler.min.css">
</head>
<body class="antialiased border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
      <div class="container-tight py-4">
        <div class="text-center mb-4">
          <a href="/"><img src="https://www.smkdiponegoropekalongan.sch.id/dist/img/smedip.png" height="36" alt="smedip"></a>
        </div>
        <form class="card card-md" action="{{ route('login') }}" method="post" autocomplete="off">

            @csrf
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Login to your account</h2>
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="mb-2">
              <label class="form-label">
                Password
                <span class="form-label-description">
                  <a href="#">I forgot password</a>
                </span>
              </label>
              <div class="input-group input-group-flat">
                <input type="password" name="password" class="form-control"  placeholder="Password"  autocomplete="off">
                {{-- <span class="input-group-text">
                  <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                  </a>
                </span> --}}
              </div>
            </div>
            <div class="mb-2">
              <label class="form-check">
                <input type="checkbox" name="remember" class="form-check-input"/>
                <span class="form-check-label">Remember me on this device</span>
              </label>
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Sign in</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <script src="https://unpkg.com/@tabler/core@1.0.0-beta3/dist/js/tabler.min.js"></script>
  </body>
</html>
