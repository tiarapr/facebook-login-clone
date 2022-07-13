<!DOCTYPE html>
<html>

<head>
    <title>Facebook Register Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="w3hubs.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">

    <!-- css -->
    <link href="{{ asset('assets/css/register.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="row align-items-center justify-content-center vh-100">
            <div class="col-md-7">
                <img src="https://static.xx.fbcdn.net/rsrc.php/y8/r/dF5SId3UHWd.svg" class="w-50">
                <h3>Facebook helps you connect and share with the people in your life.</h3>
            </div>
            <div class="col-md-5">
                <form class="register-form" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div>
                        <h4>Register</h4>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="First Name" name="first_name" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label>Date of birth</label>
                        <input type="date" class="form-control" name="birthday" required>
                    </div>
                    <div class="row">
                        <label>Gender</label>
                        <div class="col">
                            <input class="form-check-input" type="radio" name="gender" value="Female" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Female
                            </label>
                        </div>
                        <div class="col">
                        <input class="form-check-input" type="radio" name="gender" value="Male" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Male
                            </label>
                        </div>
                    </div>
                    <div>
                        <p>By clicking Register, you agree to our Terms, Data Policy and Cookie Policy. You will receive an SMS Notification from Facebook and can decline it at any time.</p>
                    </div>
                    <div class="text-center pt-3 pb-3">
                        <button type="submit" class="btn btn-success btn-lg btn-regis">Register</button>
                        <hr>
                        <p class="register text-center">You have an account? <a href="{{ route('loginView') }}" class="link-info">Login here</a></p>
                    </div>
                </form>
                <p class="pt-3 text-center"><b>Create a Page</b> for a celebrity, band or business.</p>
            </div>
        </div>
    </div>
</body>

</html>