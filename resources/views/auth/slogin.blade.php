<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Include Bootstrap CSS from CDN or local installation -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       .login {
        min-height: 100vh;
        }

        .bg-image {
        background-image: url('https://source.unsplash.com/WEQbe2jBg40/600x1200');
        background-size: cover;
        background-position: center;
        }

        .login-heading {
        font-weight: 300;
        }

        .btn-login {
        font-size: 0.9rem;
        letter-spacing: 0.05rem;
        padding: 0.75rem 1rem;
        }


        .login-form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
        }
        .login-logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-logo img {
            max-width: 50px;
        }
        .form-control {
            margin-bottom: 15px;
            font-size: 15px; /* Adjust the font size as needed */
        }
        .btn-primary {
            background-color: #1877f2;
            border-color: #1877f2;
            font-size: 15px; /* Adjust the font size as needed */
        }
        .btn-primary:hover {
            background-color: #166fe5;
            border-color: #166fe5;
        }
        .button-container {
            text-align: center;
        }

        /* .cont{
            box-shadow: -15px 0px 3px green;
        } */

        .commu{
            color: whitesmoke;
            text-shadow: 0px 5px 15px darkgreen;
        }

        .roro .col-lg-6 .cont{
            /* box-shadow: -15px 0px 3px green; */
            box-shadow: inset .5em .5em 15px darkgreen;
        }
        .roro .col-md-6 .cont{
            box-shadow: 0px 50px 3px green;
        }
    </style>
</head>
<body class="">

    <div class="container">
        <div class="row g-0 roro">

            <div class="col-md-0 col-lg-6 py-5"  style="background-image: url('https://images.unsplash.com/photo-1449824913935-59a10b8d2000?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8NHx8fGVufDB8fHx8fA%3D%3D'); background-size: cover;">
                <div class="d-flex align-items-end py-5">
                    <div class="container">
                        <!-- <div class="login-logo mt-5">

                            <img src="https://www.freepnglogos.com/uploads/swirl-png/purple-swirl-transparent-png-art-2.png" alt="Logo" class="logo">
                        </div> -->
                        <!-- <h1 class="text-center mb-4 commu" style="font-family: 'Matura MT Script Capitals', sans-serif;">Community School</h1> -->
                    </div>
                </div>

            </div>

            <div class="col-md-12 col-lg-6 bg-success">
                <div class="login d-flex align-items-center py-5  cont" >
                    <div class="container">
                        <div class="row">
                            <!-- <div class="col-md-3 col-lg-4 mx-auto">

                            </div> -->
                            <div class="col-md-9 col-lg-8 mx-auto">

                                <!-- Student Sign In Form -->
                                <form method="post" action="{{ route('slogin') }}" class="login-form pt-5">
                                    @csrf
                                    <div class="login-logo">
                                        <img src="https://www.freepnglogos.com/uploads/swirl-png/purple-swirl-transparent-png-art-2.png" alt="Logo" class="logo">
                                    </div>
                                    <h3 class="text-center" style="font-family: 'Source Serif Pro', sans-serif;">Student Login</h3>
                                    <div class="mb-3 mt-5">
                                        <input type="text" class="form-control" name="username" placeholder="Username or Email" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    </div>

                                    <!-- <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                                        <label class="form-check-label" for="rememberPasswordCheck">
                                        Remember password
                                        </label>
                                    </div> -->

                                    <div class="d-grid mt-4">
                                        <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2 mx-auto" type="submit">Sign in</button>
                                        <!-- <div class="text-center">
                                        <a class="small" href="#">Forgot password?</a>
                                        </div> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Include Bootstrap JS from CDN or local installation -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
