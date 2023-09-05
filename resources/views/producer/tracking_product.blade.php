<x-app-layout>
    <!-- UniIcon CDN Link  -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <style>
        .main-progress {
            width: 100%;
            padding-top: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: pop;
            flex-direction: column;
        }

        .first-col {
            margin-top: -100px;
            border: 2px solid gray;
            border-radius: 20px;
        }

        .second-col {
            width: 52%;
            padding: 0px 15px;
            margin-top: 20px;
            margin-bottom: 40px;
            border: 2px solid gray;
            border-radius: 20px;
        }

        .head-prog {
            margin-top: 20px;
            text-align: center;
        }

        .head_1 {
            font-size: 30px;
            font-weight: 600;
            color: #333;
        }

        ul-progress {
            display: flex;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        ul-progress li-progress {
            list-style: none;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        ul-progress li-progress .icon {
            font-size: 35px;
            color: #ff4732;
            margin: 0 60px;
        }

        ul-progress li-progress .text {
            font-size: 14px;
            font-weight: 600;
            color: #ff4732;
        }

        /* Progress Div Css  */

        ul-progress li-progress .progress {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: rgba(255, 164, 164, 0.781);
            margin: 14px 0;
            display: grid;
            place-items: center;
            color: #fff;
            position: relative;
            cursor: pointer;
        }

        .progress::after {
            content: " ";
            position: absolute;
            width: 100px;
            height: 5px;
            background-color: rgba(255, 164, 164, 0.781);
            right: 30px;
        }

        .one::after {
            width: 0;
            height: 0;
        }

        ul-progress li-progress .progress .uil {
            display: none;
        }

        ul-progress li-progress .progress p {
            font-size: 13px;
        }

        /* Active Css  */

        ul-progress li-progress .active {
            background-color: #ff4732;
            display: grid;
            place-items: center;
        }

        li-progress .active::after {
            background-color: #ff4732;
        }

        ul-progress li-progress .active p {
            display: none;
        }

        ul-progress li-progress .active .uil {
            font-size: 20px;
            display: flex;
        }

        .secol-item {
            margin: 15px 10px;
        }

        .head-progress-name {
            font-size: 25px;
            font-weight: 600;
            color: #333;
            border-bottom: 1.5px dotted black;
            margin-bottom: 10px
        }

        .dt-progress {
            font-style: italic
        }

        .head-progress-des {
            font-size: 18px;
        }

        .gjobb {
            font-size: 18px
        }

        /* Responsive Css  */

        @media (max-width: 980px) {
            .first-col {
                margin-top: 20px;
            }

            ul-progress {
                flex-direction: column;
                margin: 0 40px;
            }

            ul-progress li-progress {
                flex-direction: row;
            }

            ul-progress li-progress .progress {
                margin: 0 30px;
            }

            .progress::after {
                width: 5px;
                height: 55px;
                bottom: 30px;
                left: 50%;
                transform: translateX(-50%);
                z-index: -1;
            }

            .one::after {
                height: 0;
            }

            ul-progress li-progress .icon {
                margin: 15px 0;
            }
        }

        @media (max-width:600px) {
            .head .head_1 {
                font-size: 24px;
            }

            .head .head_2 {
                font-size: 16px;
            }
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tracking Product') }}
        </h2>
    </x-slot>
    <div class="main-progress">
        <div class="first-col">
            <div class="head-prog">
                <p class="head_1">{{ $product->name }}</p>
            </div>
            @php
                $icons = ['uil-folder-upload', 'uil-process', 'uil-feedback', 'uil-check'];
            @endphp
            <ul-progress>
                @foreach ($progresses as $index => $progress)
                    <li-progress>
                        @if ($progress->id == 1)
                            <i class="icon uil {{ $icons[0] }}"></i>
                            @if ($product->progress_id == 5)
                                <div style="background-color: #833000;"
                                    class="{{ $product->progress_id >= $progress->id ? 'active' : '' }} progress one">
                                    <p style="padding-top: 5px">{{ $index + 1 }}</p>
                                    <i class="uil uil-times"></i>
                                </div>
                                <p class="text">{{ $currentProgress->name }}</p>
                            @else
                                <div class="{{ $product->progress_id >= $progress->id ? 'active' : '' }} progress one">
                                    <p style="padding-top: 5px">{{ $index + 1 }}</p>
                                    <i class="uil uil-check"></i>
                                </div>
                                <p class="text">{{ $progress->name }}</p>
                            @endif
                        @elseif ($progress->id == 2)
                            <i class="icon uil {{ $icons[1] }}"></i>
                            @if ($product->progress_id == 5)
                                <div class="{{ $product->progress_id == $progress->id ? 'active' : '' }} progress one">
                                    <p style="padding-top: 5px">{{ $index + 1 }}</p>
                                    <i class="uil uil-check"></i>
                                </div>
                                <p class="text">{{ $progress->name }}</p>
                            @else
                                <div class="{{ $product->progress_id >= $progress->id ? 'active' : '' }} progress one">
                                    <p style="padding-top: 5px">{{ $index + 1 }}</p>
                                    <i class="uil uil-check"></i>
                                </div>
                                <p class="text">{{ $progress->name }}</p>
                            @endif
                        @elseif ($progress->id == 3)
                            <i class="icon uil {{ $icons[2] }}"></i>
                            @if ($product->progress_id == 6)
                                <div style="background-color: #833000;"
                                    class="{{ $product->progress_id >= $progress->id ? 'active' : '' }} progress one">
                                    <p style="padding-top: 5px">{{ $index + 1 }}</p>
                                    <i class="uil uil-times"></i>
                                </div>
                                <p class="text">{{ $currentProgress->name }}</p>
                            @else
                                @if ($product->progress_id == 5 or $product->progress_id == 6)
                                    <div
                                        class="{{ $product->progress_id == $progress->id ? 'active' : '' }} progress one">
                                        <p style="padding-top: 5px">{{ $index + 1 }}</p>
                                        <i class="uil uil-check"></i>
                                    </div>
                                    <p class="text">{{ $progress->name }}</p>
                                @else
                                    <div
                                        class="{{ $product->progress_id >= $progress->id ? 'active' : '' }} progress one">
                                        <p style="padding-top: 5px">{{ $index + 1 }}</p>
                                        <i class="uil uil-check"></i>
                                    </div>
                                    <p class="text">{{ $progress->name }}</p>
                                @endif
                            @endif
                        @elseif ($progress->id == 4)
                            <i class="icon uil {{ $icons[3] }}"></i>
                            @if ($product->progress_id == 5 or $product->progress_id == 6)
                                <div class="{{ $product->progress_id == $progress->id ? 'active' : '' }} progress one">
                                    <p style="padding-top: 5px">{{ $index + 1 }}</p>
                                    <i class="uil uil-check"></i>
                                </div>
                                <p class="text">{{ $progress->name }}</p>
                            @else
                                <div class="{{ $product->progress_id >= $progress->id ? 'active' : '' }} progress one">
                                    <p style="padding-top: 5px">{{ $index + 1 }}</p>
                                    <i class="uil uil-check"></i>
                                </div>
                                <p class="text">{{ $progress->name }}</p>
                            @endif
                        @endif
                        {{-- <i class="icon uil {{ $icons[$index] }}"></i>
                        <div class="{{ $product->progress_id >= $progress->id ? 'active' : '' }} progress one">
                            <p style="padding-top: 5px">{{ $index + 1 }}</p>
                            <i class="uil uil-check"></i>
                        </div>
                        <p class="text">{{ $progress->name }}</p> --}}
                    </li-progress>
                @endforeach
            </ul-progress>
        </div>


        <div class="container second-col">
            <p class="head-progress-name">{{ $currentProgress->name }}</p>
            <p class="dt-progress">{{ $currentProgress->updated_at }}</p>
            <p class="head-progress-des">{{ $currentProgress->description }}</p>
        </div>

        @if ($product->progress_id == '3' || $product->progress_id == '5' || $product->progress_id == '6')
            <div class="container second-col" style="margin-top: -15px">
                <p class="head-progress-name">Notes</p>
                <p class="head-progress-des">{{ $product->notes }}</p>
                <p>Untuk memperbaiki informasi produk silahkan <a class="btn btn-info"
                        href="{{ route('barang.edit', $product->id) }}">klik sini</a>
                </p>
                <p class="gjobb"><strong>Terima kasih!</strong></p>
            </div>
        @endif

    </div>
</x-app-layout>
