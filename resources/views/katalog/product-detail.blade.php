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
    <link rel="stylesheet" href="/../css/katalog/style1.css">
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

        <div class="p-3 mt-3" style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px; border-radius: 8px">
            <form class="d-flex" role="search">
                <input class="form-control rounded-start-pill border-end-0" type="search" placeholder="Search" aria-label="Search">
                <button class="btn pe-4 btn-outline-success rounded-end-pill border-start-0" type="submit"><i class="fa fa-search"></i></button>
                <div class="m-2"></div>
                <a href="#" class="btn btn-outline-danger">
                    <i class="fa fa-shopping-cart"></i>
                </a>
            </form>
        </div>
    </div>
    <div class="container-fluid pt-3 mt-2">
        <div class="wrapper p-2">
                    <div class="row g-3 col-sm-12 p-5" >
                        <div class="col-md-6 pb-2">
                            <img src="/../assets/img/dish1.jpg" class="img-detail" style="border-radius : 10px" alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title mb-3" style="font-size: 30px; fw-bold">{{ $product['name'] }}</h5>
                                        <h5 class="mb-2" style="font-size: 30px; fw-bold">Rp. {{ $product['unit_price'] }}</h5>
                                        @php
                                            $ratings = $ratings->count();
                                            $ratingValue = $rating_value;
                                            $formattedRating = number_format($ratingValue);
                                        @endphp
                                        <div class="rating mb-4">
                                            <p>
                                                @for($i = 1; $i <= $formattedRating; $i++)
                                                        <i class="fas fa-star rated"></i>
                                                @endfor
                                                @for($j = $formattedRating+1; $j <= 5; $j++ )
                                                        <i class="fas fa-star"></i>
                                                @endfor
                                                @if($ratings > 0)
                                                    {{ $ratings  }} Rating
                                                @else
                                                    0 Rating
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="product-desc">
                                            <p class="less-desc">{{ substr($product['description'], 0, 130) }}</p>
                                            <p class="more-desc" style="display: none;">
                                                {{ $product['description'] }}
                                            </p>
                                            <button class="show-more-btn">Selengkapnya</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div>min pemesanan</div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col">
                                        <button class="btn btn-primary" >Tambah Keranjang</button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                
        </div>
    </div>
        @if($comments->count() > 0 )
            @foreach($comments as $comment)
                <div class="container-fluid mt-3">
                    <div class="comment wrapper mx-auto">
                        <div class="comment-detail">
                            <p> {{ $comment['name'] }} </p>
                            <p> {{ $comment['rating_value'] }} </p>
                            <p> {{ $comment['comment'] }} </p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
        <div class="container-fluid mt-3">
            <div class="comment wrapper mx-auto">
                <div class="comment-detail">
                    <p> Belum ada komentar</p>
                </div>
            </div>
        </div>
    @endif
    
    <button class="btn btn-primary" id="rateButton" ><i class="fas fa-comment"></i></button>

        <div id="popup-container"  style="display: none;">
            <div id="ratePopup">
                <i id="closePopup" class="fas fa-times close-icon"></i>
                <div class="popup-body mt-2">
                    <p>Rate {{ $product['name'] }}</p>
                    <form action="{{ url('/add-rating') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product['product_id'] }}">
                        <div class="give-rating mt-3">
                            @if($user_rating)
                                @for ($i = 1; $i <= $user_rating->rating_value ; $i++)
                                    <input type="radio" value="{{ $i }}" name="rating" id="rating{{ $i }}">
                                    <label for="rating{{ $i }}"> <i class="star fas fa-star rated" data-rating="{{ $i }}"></i></label>
                                @endfor
                                @for($j = $user_rating->rating_value+1; $j <= 5; $j++ )
                                    <input type="radio" value="{{ $j }}" name="rating" id="rating{{ $j }}">
                                    <label for="rating{{ $j }}"> <i class="star fas fa-star" data-rating="{{ $j }}"></i></label>
                                @endfor                              
                            @else 
                                @for ($i = 1; $i <= 5; $i++)
                                    <input type="radio" value="{{ $i }}" name="rating" id="rating{{ $i }}">
                                    <label for="rating{{ $i }}"> <i class="star fas fa-star" data-rating="{{ $i }}"></i></label>
                                @endfor
                            @endif
                        </div>
                        <textarea id="comment" name="ulasan" class="mt-2" placeholder="Masukkan ulasan anda"></textarea>
                        <div class="submit-rate">  
                            <button id="submitRating"  class="btn">Submit</button>
                        </div> 
                    </form>
                </div> 
            </div>        
        </div>
        @if (session('success'))
        <div id="popup-containerX" style="display: block;">
            <div id="ratePopup">
                <i id="closePopupX" class="fas fa-times close-icon"></i>
                <div>success</div>
            </div>      
        </div>
        @endif
    
</body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
    <script src="/../js/katalog/katalog.js"></script>
   
</html>
