<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="VLRC Creatives">

    <title>Community School</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- Icons Resources -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script> -->
     <!-- Bootstrap CSS link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");:root{--header-height: 3rem;--nav-width: 68px;--first-color: #4723D9;--first-color-light: #AFA5D9;--white-color: #F7F6FB;--body-font: 'Nunito', sans-serif;--normal-font-size: 1rem;--z-fixed: 100}*,::before,::after{box-sizing: border-box}body{position: relative;margin: var(--header-height) 0 0 0;padding: 0 1rem;font-family: var(--body-font);font-size: var(--normal-font-size);transition: .5s}a{text-decoration: none}.header{width: 100%;height: var(--header-height);position: fixed;top: 0;left: 0;display: flex;align-items: center;justify-content: space-between;padding: 0 1rem;background-color: var(--white-color);z-index: var(--z-fixed);transition: .5s}.header_toggle{color: var(--first-color);font-size: 1.5rem;cursor: pointer}.header_img{width: 35px;height: 35px;display: flex;justify-content: center;border-radius: 50%;overflow: hidden}.header_img img{width: 40px}.l-navbar{position: fixed;top: 0;left: -30%;width: var(--nav-width);height: 100vh;background-color: var(--first-color);padding: .5rem 1rem 0 0;transition: .5s;z-index: var(--z-fixed)}.nav{height: 100%;display: flex;flex-direction: column;justify-content: space-between;overflow: hidden}.nav_logo, .nav_link{display: grid;grid-template-columns: max-content max-content;align-items: center;column-gap: 1rem;padding: .5rem 0 .5rem 1.5rem}.nav_logo{margin-bottom: 2rem}.nav_logo-icon{font-size: 1.25rem;color: var(--white-color)}.nav_logo-name{color: var(--white-color);font-weight: 700}.nav_link{position: relative;color: var(--first-color-light);margin-bottom: 1.5rem;transition: .3s}.nav_link:hover{color: var(--white-color)}.nav_icon{font-size: 1.25rem}.show{left: 0}.body-pd{padding-left: calc(var(--nav-width) + 1rem)}.active{color: var(--white-color)}.active::before{content: '';position: absolute;left: 0;width: 2px;height: 32px;background-color: var(--white-color)}.height-100{height:100vh}@media screen and (min-width: 768px){body{margin: calc(var(--header-height) + 1rem) 0 0 0;padding-left: calc(var(--nav-width) + 2rem)}.header{height: calc(var(--header-height) + 1rem);padding: 0 2rem 0 calc(var(--nav-width) + 2rem)}.header_img{width: 40px;height: 40px}.header_img img{width: 45px}.l-navbar{left: 0;padding: 1rem 1rem 0 0}.show{width: calc(var(--nav-width) + 156px)}.body-pd{padding-left: calc(var(--nav-width) + 188px)}}

        #header{
            box-shadow: 0px 5px 15px gray;
        }

        .carousel-control-prev, .carousel-control-next {
            font-size: 3vw;
            padding: 1vw;
        }

        .carousel-caption {
            position: absolute;
            top: 50%;
            transform: translateY(-75%);
            width: 100%;
        }

        @media (min-width: 992px) {
            .carousel-caption h1{
                font-size: 5vw;
                width: 100%;
            }
            .carousel-caption p, .carousel-caption a{
                font-size: 1.5vw;
            }
            .carousel-item img {
                height: 20vw;
                width: 100%;
            }

            .container-fluid p{
                font-size: large;
            }
            .container-fluid h2{
                font-size: x-large;
                font-weight: bold;
            }
        }
        @media (min-width: 768px) {
            .carousel-item img {
                height: 30vw;
                width: 100%;
            }
            .carousel-caption h1{
                font-size: 5vw;
                width: 100%;
            }
            .carousel-caption p, .carousel-caption a{
                font-size: 1.5vw;
            }
            .contents{
                margin-right: 5em;
            }

            .container-fluid p{
                font-size: medium;
            }
            .container-fluid h2{
                font-size: large;
                font-weight: bold;
            }
        }
        @media (min-width: 576px) {
            /* Adjust the button size for smaller screens if needed */
            .carousel-control-prev,
            .carousel-control-next {
                font-size: 5vw;
                padding: 2vw;
            }

            .container-fluid p{
                font-size: small;
            }
            .container-fluid h2{
                font-size: medium;
                font-weight: bold;
            }

            .carousel-caption {
                text-align: left;
                transform: translateY(-75%);
            }
            .carousel-item img {
                height: 30vw;
                width: 100%;
            }
            .carousel-caption h1{
                font-size: 5vw;
                width: 100%;
            }
            .carousel-caption p, .carousel-caption a{
                font-size: 1.5vw;
            }
        }

        @media (max-width: 575px){
            .carousel-item img{
                height: 200px;
            }
            .carousel-caption h1{
                font-size: 6vw;
                width: 100%;
            }
            .carousel-caption p, .carousel-caption a{
                font-size: 3vw;
            }
            .navbar .container-fluid{
                font-size: 6vw;
            }
            footer{
                font-size: x-small;
            }
            .container-fluid p{
                font-size: x-small;
            }
            .container-fluid h2{
                font-size: small;
                font-weight: bold;
            }
        }

        .carousel-caption {
                text-align: left;
                transform: translateY(-75%);
            }

        /* Extra Small (XS): Up to 576 pixels
        Small (SM): 576 pixels to 768 pixels
        Medium (MD): 768 pixels to 992 pixels
        Large (LG): 992 pixels to 1200 pixels
        Extra Large (XL): 1200 pixels and above */

        .container-fluid p{
            text-align: justify;
        }
    </style>
</head>

<body id="body-pd">
    <header class="header bg-dark" id="header">
        <!-- <a href="/admin"> Replace 'admin.login' with your actual route name -->
            <!-- <img src="https://i.imgur.com/hczKIze.jpg" alt="">
            <i class='bx bxs-user-circle mt-2 mx-5' id="header-toggle"></i>
        </a> -->

        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark mt-1">
            <div class="container-fluid">
                <a class="navbar-brand ps-md-4 ps-sm-3 ps-xs-2 ps-xxs-1 ps-5" href="#">Community School</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <!-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li> -->
                    </ul>
                    <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <!--Container Main start-->
    <div class="contents">
            <main class="mt-3">
                <div class="content">
                @yield('content')
                </div>
            </main>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>



     <!-- In your Layouts blade file, update the footer section with the following code -->

      <!-- Footer -->
      <!-- <footer class="footer py-3 bg-dark mb-0 container-fluid">
        <div class="row">
            <div class="col-md-6 ps-xs-2 ps-md-5">
                <p class="text-white" >&copy; 2023 <a href="#" class="green">Community School.</a> All Rights Reserved.</p>
            </div>
            <div class="col-md-6 text-end">
                <p class="text-muted pe-xs-2 pe-md-5">
                    <a href="#" class="footer-link">Web Team</a> |
                    <a href="#" class="footer-link">Policy Statement</a> |
                    <a href="#" class="footer-link">Disclaimer</a> |
                    <a href="#" class="footer-link">Site Map</a>
                </p>
            </div>
        </div>
    </footer> -->
    <footer class="">
        <div class="row bg-dark text-white pt-5" id="search">
            <div class="m-auto col-12 offset-md-1 mb-3" >
                <form>
                <h5>Subscribe to our newsletter</h5>
                <p>Monthly digest of what's new and exciting from us.</p>
                <div class="d-flex flex-column flex-sm-row gap-1">
                    <label for="newsletter1" class="visually-hidden">Email address</label>
                    <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                    <button class="btn btn-primary" type="button">Subscribe</button>
                </div>
                </form>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 border-top me-5 ps-5 text-white">
            <p class="ps-5 ms-5">© 2022 Company, Inc. All rights reserved.</p>
            <ul class="list-unstyled me-5 d-flex">

                <li class="ms-3"><a class="link-light" href="#">
                    <i class='bx bx-fw bxl-twitter bx-sm' ></i>Twitter
                </a></li>
                <li class="ms-3"><a class="link-light" href="#">
                    <i class='bx bx-fw bxl-instagram-alt bx-sm'></i>Instagram
                </a></li>
                <li class="ms-3"><a class="link-light" href="#">
                        <i class='bx bx-fw bxl-facebook bx-sm' ></i>facebook
                </a></li>
            </ul>
        </div>
    </footer>


    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* Add this style block or include it in your CSS file */
        .footer-link {
            color: #888; /* Set initial text color to gray */
            text-decoration: none; /* Remove underline */
            transition: color 0.3s; /* Add smooth transition for color change */
        }

        .footer-link:hover {
            color: #ffffff; /* Change text color to white on hover */
        }
        .green{
            color: green;
            text-decoration: none; /* Remove underline */
        }
        .green:hover{
            color: #ffffff; /* Change text color to white on hover */
        }
        footer{
            margin-left: -100px;
            background-color: black;
            margin-right: -16px;
        }
        #search{
            margin-right: -0px;
        }
    </style>




</body>

</html>
