<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tracking Product') }}
        </h2>
    </x-slot>
    <!-- UniIcon CDN Link  -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <style>
        .main-progress{
            width: 100%;
            height: 650px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: pop;
            flex-direction: column;
        }
        .first-col{
            margin-top: -100px;
            border: 2px solid gray;
            border-radius: 20px;
        }
        .second-col{
            width: 52%;
            padding: 0px 15px;
            margin-top: 20px;
            margin-bottom: 40px;
            border: 2px solid gray;
            border-radius: 20px;
        }
        .head{
            margin-top: 20px;
            text-align: center;
        }
        .head_1{
            font-size: 30px;
            font-weight: 600;
            color: #333;
        }
        ul-progress{
            display: flex;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        ul-progress li-progress{
            list-style: none;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        ul-progress li-progress .icon{
            font-size: 35px;
            color: #ff4732;
            margin: 0 60px;
        }
        ul-progress li-progress .text{
            font-size: 14px;
            font-weight: 600;
            color: #ff4732;
        }

        /* Progress Div Css  */

        ul-progress li-progress .progress{
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
        .progress::after{
            content: " ";
            position: absolute;
            width: 100px;
            height: 5px;
            background-color: rgba(255, 164, 164, 0.781);
            right: 30px;
        }
        .one::after{
            width: 0;
            height: 0;
        }
        ul-progress li-progress .progress .uil{
            display: none;
        }
        ul-progress li-progress .progress p{
            font-size: 13px;
        }

        /* Active Css  */

        ul-progress li-progress .active{
            background-color: #ff4732;
            display: grid;
            place-items: center;
        }
        li-progress .active::after{
            background-color: #ff4732;
        }
        ul-progress li-progress .active p{
            display: none;
        }
        ul-progress li-progress .active .uil{
            font-size: 20px;
            display: flex;
        }
        .secol-item{
            margin: 15px 10px;
        }
        .head-progress-name{
            font-size: 25px;
            font-weight: 600;
            color: #333;
            border-bottom: 1.5px dotted black;
            margin-bottom: 10px
        }
        .dt-progress{
            font-style: italic
        }
        .head-progress-des{
            font-size: 18px;
        }
        .gjobb{
            font-size: 18px
        }
        /* Responsive Css  */

        @media (max-width: 980px) {
            .first-col{
                margin-top: 20px;
            }
            ul-progress{
                flex-direction: column;
                margin: 0 40px;
            }
            ul-progress li-progress{
                flex-direction: row;
            }
            ul-progress li-progress .progress{
                margin: 0 30px;
            }
            .progress::after{
                width: 5px;
                height: 55px;
                bottom: 30px;
                left: 50%;
                transform: translateX(-50%);
                z-index: -1;
            }
            .one::after{
                height: 0;
            }
            ul-progress li-progress .icon{
                margin: 15px 0;
            }
        }

        @media (max-width:600px) {
            .head .head_1{
                font-size: 24px;
            }
            .head .head_2{
                font-size: 16px;
            }
        }
    </style>
    <div class="main-progress">
        <div class="first-col">
            <div class="head">
                <p class="head_1">{{  $product->name}}</p>
            </div>
            @php
                $icons = [
                    "uil-folder-upload", "uil-process", "uil-feedback", "uil-check"
                ];
            @endphp
            <ul-progress>
                @foreach ($progresses as $index => $progress)
                    <li-progress>
                        <i class="icon uil {{ $icons[$index] }}"></i>
                        <div class="{{ $product->progress_id >= $progress->id ? "active" : "" }} progress one"> 
                            <p>{{ $index + 1 }}</p>
                            <i class="uil uil-check"></i>
                        </div>
                        <p class="text">{{ $progress->name }}</p>
                    </li-progress>
                @endforeach
            </ul-progress>
        </div>
        <div class="container second-col">
            <div class="secol-item">
                <p class="head-progress-name">{{  $progress->name}}</p>
                <p class="dt-progress">{{  $progress->updated_at}}</p>
                <p class="head-progress-des">{{  $progress->description}}</p>
                <p class="gjobb"><strong>Good Job!</strong></p>
            </div>
            
        </div>
    </div>
</x-app-layout>