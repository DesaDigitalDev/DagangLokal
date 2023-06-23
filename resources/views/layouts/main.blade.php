
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dagang Lokal | Dashboard</title>

    <link href="assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body id="page-top">
    <div id="wrapper">

        @include('dashboard.layouts.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                @include('dashboard.layouts.navbar')

                @yield('main-content')

            </div>
            
            @include('dashboard.layouts.footer')

        </div>

    </div>

</body>

</html>