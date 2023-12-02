<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="VLRC Creatives">
    <head>
        <title>Health and Service Offices</title>
        <link rel="icon" type="image/x-icon" href="https://www.carsu.edu.ph/sites/default/files/styles/200x283/public/Caraga_State_University_1.png?itok=mA2bAvdA">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
        <style>
            .sidebar .nav-link {
                font-weight: 500;
                color: var(--bs-dark);
            }
            .sidebar .nav-link:hover {
                background: var(--bs-light);
                color: var(--bs-primary);
            }
        </style>
        <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/all.min.css">

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <!-- <script>
            const user = usePage().props.auth.user;

            const form = useForm({
                name: user.name,
                email: user.email,
            });
            $("#auth").innerHTML().value = name;
        </script> -->

        <!-- 'resources/css/app.css', 'resources/js/app.js' -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="{{ mix('js/app.js') }}" defer></script>

    </head>

  @include('layouts.style')
  @include('layouts.scripts')
</head>
<body class="text-primary">

    @include('layouts.header')
    <!-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100" id="app"> -->

    <div class="container-fluid backback">
        <div class="container row flex-nowrap">
            <nav class="sidebar col-2 border flex-shrink-0 overflow-y-hidden mt-3 position-relative rounded" style="height: 550px;">
                <ul class="nav flex-column">

                    <li class="nav-item border-bottom hover-effect-light" >
                        <a class="nav-link text-dark" href="/">
                        <ion-icon name="list-sharp"></ion-icon> Clinic Logs
                        </a>
                    </li>
                    <li class="nav-item border-bottom hover-effect-light">
                        <a class="nav-link text-dark" href="/medicines">
                        <ion-icon name="medkit-sharp"></ion-icon> Medicines
                        </a>
                    </li>
                    <li class="nav-item border-bottom hover-effect-light">
                        <a class="nav-link text-dark" href="/complaints">
                        <ion-icon name="alert-sharp"></ion-icon> Complaints
                        </a>
                    </li>
                    <li class="nav-item border-bottom hover-effect-light">
                        <a class="nav-link text-dark" href="/patients">
                        <ion-icon name="body-sharp"></ion-icon> Patients
                        </a>
                    </li>
                    <li class="nav-item dropdown mx-4 my-3 position-absolute start-0 bottom-0">
                        <a class="nav-link text-light" href="/profile" style="width: 175px;">
                            <ion-icon name="person-sharp"></ion-icon> Username
                            Auth::user()->name
                        </a>
                    </li>
                </ul>
            </nav>

        <main class="mt-3 mx-0">
            <div class="content">
                @yield('content')
            </div>


        </main>

        </div>
    </div>

</body>

</script>
</html>
