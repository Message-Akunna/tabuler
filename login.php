<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Timetable scheduling system for schools using genetic algorithm">
        <meta name="keywords" content="login, signin">

        <title>Login &mdash; Tabuler</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet">

        <!-- Styles -->
        <link href="assets/css/core.min.css" rel="stylesheet">
        <link href="assets/css/app.min.css" rel="stylesheet">
        <link href="assets/css/style.min.css" rel="stylesheet">

        <!-- Favicons -->
        <link rel="apple-touch-icon" href="assets/img/tabuler-favicon-brown.png">
        <link rel="icon" href="assets/img/tabuler-favicon-brown.png">
    </head>
    <body>
        <div class="row no-gutters min-h-fullscreen bg-white">
            <div class="col-md-6 col-lg-7 col-xl-8 d-none d-md-block bg-img" style="background-image: url(assets/img/login/bg-tabuler-clock.jpg)" data-overlay="5">

                <div class="row h-100 pl-50">
                    <div class="col-md-10 col-lg-8 align-self-end">
                        <h1 class="fw-800 text-white mb-5">Tabuler</h1>
                        <h4 class="text-white">The best time scheduling software available.</h4>
                        <p class="text-white mb-5">Timetable scheduling system for schools using genetic algorithm to optimise time sharing/allocation for maximum resourcefulness.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-5 col-xl-4 align-self-center">
                <div class="px-80 py-30">
                    <div class="text-center">
                        <img src="assets/img/tabuler-favicon-brown.png" class="h-50px w-50px">
                        <h3 class="mt-2"> Tabuler</h3>
                        <p class="mb-2">&mDDot; Welcome back friend &mDDot;</p>
                    </div>
                    <div class="alert alert-danger d-none" id="loginFormAlertError">
                        <span id="errorMessage">
                        </span> <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <form class="form-type-material" id="loginForm">
                        <div class="form-group">
                            <input type="email" class="form-control bb-3 border-brown border-0" id="email">
                            <label for="email">Email</label>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control bb-3 border-brown border-0" id="password">
                            <label for="password">Password</label>
                        </div>
                        <div class="form-group flexbox">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" checked>
                                <label class="custom-control-label">Remember me</label>
                            </div>
                            <a class="text-muted hover-primary fs-13" href="#">Forgot password?</a>
                        </div>
                        <button class="btn btn-bold btn-block btn-brown" type="submit"><i class="fa fa-sign-in"></i> Login</button>
                    </form>
                    <div class="divider">Sign in to continue</div>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="assets/js/core.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        <script src="assets/js/script.min.js"></script>
        <script src="assets/js/main.js"></script>

    </body>
</html>

