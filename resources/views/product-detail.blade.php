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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    {{-- mycss --}}
    <link rel="stylesheet" href="../css/mycss.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>      
        .wrapper {
            height: 500px;
            width: 100vh;
            margin: auto; 
            justify-content: center;
        }
        .detail {
            height: 300px;
            line-height: 20px;
        }
        img {
            width: 600px;
            height: 400px;
        }
        .border {
            border: 1px solid black;
        }
        .product-desc p{
            font-size: 15px;
        }
        .product-desc button{
            font-size: 15px;
            color: orange;
        }
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

        <div class="p-3">
            <form class="d-flex" role="search">
                <input class="form-control rounded-start-pill border-end-0" type="search" placeholder="Search" aria-label="Search">
                <button class="btn pe-4 btn-outline-success rounded-end-pill border-start-0" type="submit"><i class="fa fa-search"></i></button>
                <div class="m-2"></div>
                <a href="#" class="btn btn-outline-danger">
                    <i class="fa fa-shopping-cart"></i>
                </a>
            </form>
        </div>

        <div class="wrapper mt-4">
            <div class="mb-3" style="max-width: 700px;">
                <div class="row g-0 col-sm-12">
                    <div class="col-md-6">
                        <img src="{{ $product['link'] }}" class="" alt="...">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body detail">
                            <h5 class="card-title mb-3" style="font-size: 30px; fw-bold">{{ $product['name'] }}</h5>
                            <h5 class="mb-2" style="font-size: 30px; fw-bold">Rp. {{ $product['unit_price'] }}</h5>
                            @php
                                $ratingValue = $product['rating_value'];
                                $formattedRating = number_format($ratingValue, 1);
                            @endphp
                            <div class="rating mb-4">
                                <p>
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($ratingValue >= $i)
                                            <i class="fas fa-star rated"></i>
                                        @else
                                            <i class="fas fa-star"></i>
                                        @endif
                                    @endfor
                                    {{ $formattedRating }} Rating
                                </p>
                            </div>
                            <div class="product-desc">
                                <p class="less-desc">{{ substr($product['description'], 0, 130) }}</p>
                                <p class="more-desc" style="display: none;">
                                    {{ $product['description'] }}
                                </p>
                                <button class="show-more-btn" onclick="toggleDescription()">Selengkapnya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        function toggleDescription() {
          const moreDesc = document.querySelector('.more-desc');
          const lessDesc = document.querySelector('.less-desc');
          const showMoreBtn = document.querySelector('.show-more-btn');
      
          if (moreDesc.style.display === 'none') {
            moreDesc.style.display = 'block';
            lessDesc.style.display = 'none';
            showMoreBtn.innerText = 'Sembunyikan';
          } else {
            moreDesc.style.display = 'none';
            lessDesc.style.display = 'block';
            showMoreBtn.innerText = 'Selengkapnya';
          }
        }
      </script>
</html>
