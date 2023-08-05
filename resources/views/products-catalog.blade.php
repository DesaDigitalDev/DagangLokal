<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="../assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="../assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    {{-- mycss --}}
    <link rel="stylesheet" href="../css/mycss.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="container-fluid">
    @include('layouts.navigation')

            <x-slot name="header">
                <div class="d-sm-flex align-items-center justify-content-left my-3 ms-4">
                    <h1 class="h3 mb-0 text-gray-800">{{ __('Dashboard') }}</h1>
                </div>                 
            </x-slot>


        <div class="container">    
            <div class="search-wrapper">
                <form action="" class="search" id="search-bar">
                    <input type="search" placeholder="Cari...." class="search-input">

                    <div class="search-button">
                        <i class="fa fa-search search-icon"></i>
                    </div>
                </form>    
            </div> 
        
            <div class="row row-cols-1 row-cols-md-3 row-cols-sm-6 g-1">        
                @foreach ($products as $item)
                <div class="col-12 col-sm-12 col-md-4 col-lg-2">
                    <div div class="card">
                        <img src="assets/img/dish1.jpg" class="card-img-top" width="75" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item['name'] }}</h5>
                            <div class="stars mb-2">
                                <i class="fa fa-solid fa-star rated"></i>      
                                <i class="fa fa-solid fa-star rated"></i>    
                                <i class="fa fa-solid fa-star"></i>   
                                <i class="fa fa-solid fa-star"></i>  
                                <i class="fa fa-solid fa-star"></i>                   
                            </div>
                            <div class="pricing mb-2">
                                <div class="pricing-price">
                                    <h1>Potensi Jual</h1>
                                    <p>Rp. {{ $item['unit_price'] }}</p>
                                </div>
                                <div class="pricing-margin">
                                    <h1>Margin</h1>
                                    <p>50%</p>
                                </div>
                            </div>
                            <div class="pricing-detail">
                                <ul class="title">
                                    <li><i class="fa fa-coins mr-2"></i></i>Margin</li>
                                    <li><i class="fa fa-coins mr-2"></i>Minimum Jual</li>
                                    <li><i class="fa fa-coins mr-2"></i>HPP Jual</li>
                                </ul>
                                <ul class="value">
                                    <li>80.000</li>
                                    <li>69.000</li>
                                    <li>14.500</li>
                                </ul>
                            </div>
                        </div>
                        <div class="mb-3 d-flex justify-content-around mt-3">
                            <a href="{{ url('/catalog/detail/' . $item->product_id) }}" class="btn btn-product">
                                <span>Lihat</span>    
                            </a>
                                
                        </div>
                    </div>
                </div>
                @endforeach 
            </div>
        </div>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
    
</html>