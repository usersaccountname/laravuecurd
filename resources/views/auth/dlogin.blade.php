<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Include Bootstrap CSS from CDN or local installation -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: black;
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .login-form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px; /* Set a max-width to prevent the form from becoming too wide on larger screens */
            width: 100%;
        }
        .login-logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-logo img {
            max-width: 100px;
        }
        .form-control {
            margin-bottom: 15px;
            font-size: 15px; /* Adjust the font size as needed */
        }
        .btn-primary {
            background-color: #1877f2;
            border-color: #1877f2;
            font-size: 20px; /* Adjust the font size as needed */
        }
        .btn-primary:hover {
            background-color: #166fe5;
            border-color: #166fe5;
        }
        .button-container {
            text-align: center;
        }

        @media (max-width: 576px) {
            /* Adjust styles for small screens (e.g., smartphones) */
            .container {
                padding: 10px;
            }
            .login-form {
                padding: 15px;
            }
        }
    </style>
</head>
<body class="bg-secondary">

<div class="container">
    <div class="col-md-6">
        <div class="login-form">
            <div class="login-logo">
                <!-- You can replace this image with your own logo -->
                <img src="https://png.pngtree.com/png-clipart/20230407/original/pngtree-education-and-school-logo-design-template-png-image_9035365.png" alt="Logo">
            </div>
            <form method="post" action="/dlogin" class="px-5">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username or Email" value="" required>
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                </div>

                <div class="mb-3 button-container">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS from CDN or local installation -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
