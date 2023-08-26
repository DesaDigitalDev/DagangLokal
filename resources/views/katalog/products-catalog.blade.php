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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    {{-- mycss --}}
    <link rel="stylesheet" href="/../css/katalog/style.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
   
</style>

    
</head>

<body class="font-sans antialiased">
    <div class="container-fluid">
        @include('layouts.navigation')

            <x-slot name="header">
                <div class="d-sm-flex align-items-center justify-content-left my-3 ms-4">
                    <h1 class="h3 mb-0 text-gray-800">{{ __('Dashboard') }}</h1>
                </div>                 
            </x-slot>

            <div class="p-3 mt-3" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px,
            rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, 
            rgba(0, 0, 0, 0.09) 0px -3px 5px; border-radius: 8px">
                <form class="d-flex" role="search" method="GET" action="{{ url('catalog/search') }}">
                    @csrf
                    <input class="form-control rounded-start-pill border-end-0" type="search" placeholder="Search" aria-label="Search" name="q">
                    <button class="btn pe-4 btn-outline-success rounded-end-pill border-start-0" type="submit"><i class="fa fa-search"></i></button>
                    <div class="m-2"></div>
                    <a href="catalog/" class="btn btn-outline-danger">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                </form>
            </div>
    </div>

    <div class="container-fluid">
        <div class="mt-3">
            <div class="category"  @if ($isNoResults = $products->isEmpty()) style="display: none;" @endif>
                <div class="">
                    <form action="{{ url('catalog/category')}}" method="GET">
                        <button class="all" name="category_name" value="">All</button>
                    </form>
                </div>
                @foreach($categories as $category)
                    <div class="category-btn">
                        <form action="{{ url('catalog/category')}}" method="GET">
                            <button class="cat-btn" name="category_name" value="{{  $category->category_name }}">{{ $category->category_name }}</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @if ($isNoResults = $products->isEmpty())
        <div class="x-notif">
            <h1>Product Not Found</h1>
        </div>
    @endif

    <div class="container-fluid mt-2">
            <div class="row row-cols-1 row-cols-md-3 row-cols-sm-6 ps-2 pe-2">        
                @foreach ($products as $item)
                <div class="col-12 col-sm-12 col-md-6 col-lg-3 g-1">
                    <div div class="card card-clicked" data-card-id="{{ $item->id }}"style="cursor: pointer">
                        <img src="/../assets/img/dish1.jpg"  class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            @php
                                $formattedRating = number_format($item->rating_value);
                            @endphp
                            <div class="stars mb-3">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($formattedRating >= $i)
                                        <i class="fas fa-star rated"></i>
                                    @else
                                        <i class="fas fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <div class="pricing mb-2">
                                <div class="pricing-price">
                                    <h1>Potensi Jual</h1>
                                    <p>Rp. {{ $item->unit_price }}</p>
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
                    </div>
                </div>
                @endforeach 
            </div>
        </div>
    </div>
</body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="/../js/katalog/katalog.js"></script>
    <script>
        
    </script>
</html>