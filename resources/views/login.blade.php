<!DOCTYPE html>
<html>
  <head>
    <title>Facebook Login Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="w3hubs.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    
    <!-- css -->
    <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">

  </head>
  <body>
    <div class="container">
      <div class="row align-items-center justify-content-center vh-100">
        <div class="col-md-7">
          <img src="https://static.xx.fbcdn.net/rsrc.php/y8/r/dF5SId3UHWd.svg" class="w-50">
          <h3>Facebook helps you connect and share with the people in your life.</h3>
        </div>
        <div class="col-md-5">
          <form class="login-form" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Email" name="email" required>
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
            <button type="submit" class="btn btn-custom btn-lg btn-block mt-3">Login</button>
            <div class="text-center pt-3 pb-3">
              <a href="#" class="">Forgotten password?</a>
              <hr>
              <p class="register">Don't have an account? <a href="{{ route('registerView') }}" class="link-info">Create New Account Here</a></p>
            </div>
          </form>
          <p class="pt-3 text-center"><b>Create a Page</b> for a celebrity, band or business.</p>
        </div>
      </div>
    </div>
  </body>
</html>