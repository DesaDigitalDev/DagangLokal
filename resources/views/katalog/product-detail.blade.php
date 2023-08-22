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

</head>

<body class="font-sans antialiased">
    <div class="container-fluid">
        @include('layouts.navigation')
        <x-slot name="header">
            <div class="d-sm-flex align-items-center justify-content-left my-3 ms-4">
                <h1 class="h3 mb-0 text-gray-800">{{ __('Dashboard') }}</h1>
            </div>                 
        </x-slot>

        {{-- <div class="p-3 mt-3" style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px; border-radius: 8px">
            <form class="d-flex" role="search">
                <input class="form-control rounded-start-pill border-end-0" type="search" placeholder="Search" aria-label="Search">
                <button class="btn pe-4 btn-outline-success rounded-end-pill border-start-0" type="submit"><i class="fa fa-search"></i></button>
                <div class="m-2"></div>
                <a href="#" class="btn btn-outline-danger">
                    <i class="fa fa-shopping-cart"></i>
                </a>
            </form>
        </div> --}}

    </div>

    @if (session('success'))
        <div id="popup-containerX" style="display: block;">
            <div id="ratePopup">
                <i id="closePopupX" class="fas fa-times close-icon"></i>
                <div class="alert-success"><i class="fas fa-check"></i><span>Rating dan ulasan berhasil disimpan</span></div>
            </div>      
        </div>
    @endif

    <div class="container mt-4 pt-4" style="background-color: rgba(231, 229, 229, 0.794)">
        <div class="wrapper mx-auto">
            <a href="/catalog"><button class="button-7" role="button"><i class="fa-solid fa-arrow-left"></i> Kembali</button></a>
        </div>

        <div class="wrapper line mx-auto p-3 mt-3" style="background-color: #e6faff;">
            <h1 style="font-size : 13.5px;"><a href="/catalog" style="color: rgb(0, 114, 191);">Home</a> / <span>{{ $product->category_name }}</span> 
                / <span>{{ $product->name }}</span>
            </h1>   
        </div>
        
        <div class="wrapper edge mx-auto mt-4 mb-5 pt-3" style="background-color: #fafeff;">
            <div class="row g-3 col-sm-12 pe-3 ps-3" >
                <div class="card mb-3">
                    <div class="row g-2">
                        <div class="col-md-5">
                            <img src="/../assets/img/dish1.jpg" class="img-detail" alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 23px; fw-bold">{{ $product->name }}</h5>
                                <h5 class="mb-2 mt-2" style="font-size: 25px; fw-bold">Rp. {{ $product->unit_price }}</h5>
                                <div class="rating mb-1">
                                    <p>
                                        @for($i = 1; $i <= $formattedRating; $i++)
                                            <i class="fas fa-star rated"></i>
                                        @endfor
                                        @for($j = $formattedRating+1; $j <= 5; $j++ )
                                                <i class="fas fa-star"></i>
                                        @endfor
                                        @if($ratingsCount > 0)
                                            {{ $ratingsCount  }} Rating
                                        @else
                                            0 Rating
                                        @endif
                                    </p>
                                </div>
                                    <div class="col-lg-10 col-md-12 col-sm-10 picks mt-3 mb-2">
                                        <button class="pick-button">Saga Merah</button>
                                        <button class="pick-button">Saga Hijau</button>
                                        <button class="pick-button">Saga Hijau</button>
                                        <button class="pick-button">Saga Hijau</button>
                                    </div>
                                <hr>

                                <div class="xhead mt-2">
                                    <p>Detail</p>
                                </div>

                                <div class="half-colored-line">
                                    <div class="colored-half"></div>
                                    <div class="transparent-half"></div>
                                </div>

                                <div class="xtoe mb-1">
                                    <p>Stock : <span>{{ $product->unit_in_stock }} pcs</span></p>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="product-desc">
                                            <p class="less-desc">{{ substr($product->description, 0, 100) }} <span><button class="show-more-btn">show more...</button></span></p>
                                            <p class="more-desc" style="display: none;">
                                                {{ $product->description }}
                                                <span><button class="show-less-btn">show less</button>
                                            </p> 
                                        </div>
                                    </div>
                                </div>
                                <!-- Add buttons here -->
                                {{-- <button class="btn btn-primary mt-3"><i class="fa fa-shopping-cart"></i></button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
        @if($comments->count() > 0 )
            @foreach($comments as $comment)
                <div class="wrapper edge mx-auto mt-3" style="background-color: rgba(255, 255, 255, 0.794);">
                    <div class="comment">
                        <div class="row">
                            <div class="col">
                                <div class="comment-detail mb-2">
                                    <div class="user-detail">
                                        <img src="/../assets/img/dish1.jpg" alt="">
                                    </div>
                                    <div class="user-rate">
                                        <div class="user-name">
                                            <p class="mb-1"> {{ $comment->name }} <span class="mb-1"> - {{ $comment->formatted_created_at }} </span></p>
                                        </div>
                                        <div class="user-ratingvalue">  
                                            @for($i = 1; $i <= $comment->rating_value; $i++)
                                                <i class="fas fa-star rated"></i>
                                            @endfor
                                            @for($j = $comment->rating_value+1; $j <= 5; $j++ )
                                                    <i class="fas fa-star"></i>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-detail col-12">
                                    <div class="user-comment"> 
                                        <p> {{ $comment->comment }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
            <div class="wrapper edge mx-auto mt-3" style="background-color: rgba(255, 255, 255, 0.794);">
                <div class="col-12">
                    <div class="comment mx-auto">
                        <div class="row">
                            <div class="col">
                                <div class="comment-detail justify-content-center">
                                    <div class="user-comment"> 
                                        <p class=""> Belum ada komentar </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    

    {{-- <button class="btn btn-primary" id="rateButton" ><i class="fas fa-comment"></i></button> --}}

        <div id="popup-container"  style="display: none;">
            <div id="ratePopup">
                <i id="closePopup" class="fas fa-times close-icon"></i>
                <div class="popup-body mt-2">
                    <p>Rate {{ $product['name'] }}</p>
                    <form action="{{ $user_rating ? url('/update-rating') : url('/add-rating') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product['product_id'] }}">
                        @if($user_rating)
                            <input type="hidden" name="rating_id" value="{{ $user_rating->id }}">
                        @endif
                        <div class="give-rating mt-3">
                            @for ($i = 1; $i <= 5; $i++)
                                <input type="radio" value="{{ $i }}" name="rating" id="rating{{ $i }}"
                                {{ $user_rating && $user_rating->rating_value >= $i ? 'checked' : '' }}>
                                <label for="rating{{ $i }}"> <i class="star fas fa-star{{ $user_rating && $user_rating->rating_value >= $i ? ' rated' : '' }}"
                                data-rating="{{ $i }}"></i></label>
                            @endfor
                        </div>
                        <textarea id="comment" name="ulasan" class="mt-2" placeholder="{{ $user_rating ? $user_rating->comment : 'Masukkan komentar Anda...' }}"></textarea>
                        <div class="submit-rate">  
                            <button class="button-7" role="button">{{ $user_rating ? 'Update' : 'Submit' }}</button>
                        </div> 
                    </form>
                </div>
                
            </div>        
        </div>

</body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
    <script src="/../js/katalog/katalog.js"></script>
   
</html>
