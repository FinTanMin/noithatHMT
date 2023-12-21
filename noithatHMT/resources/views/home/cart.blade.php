<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
    @include('home.nav')
</head>
<body>
head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<style>
    #summary {
        background-color: #f6f6f6;
    }
</style>
</head>
<?php $totalprice = 0; ?>
<body class="bg-gray-100">
<div class="container mx-auto mt-10 mt-[200px]">
    <div class="flex shadow-md my-10">
        <div class="w-3/4 bg-white px-10 py-10">
            <div class="flex justify-between border-y py-8">
                <h1 class="font-semibold text-2xl">Giỏ hàng</h1>

            </div>
                    <div class="flex mt-10 mb-5 border-y py-8">
                        <h3 class="font-semibold text-gray-900 text-xl uppercase w-2/5 ml-2 ">Sản phẩm</h3>
                        <h3 class="font-semibold text-center text-gray-900 text-xl uppercase w-1/5 text-center">Số
                            lượng</h3>
                        <h3 class="font-semibold text-center text-gray-900 text-xl uppercase w-1/5 text-center">
                            Giá </h3>
                        <h3 class="font-semibold text-center text-gray-900 text-xl uppercase w-1/5 text-center">Tổng
                            tiền sản phẩm </h3>
                    </div>
            @if(session('cart'))
                    <?php $totalprice = 0; ?>
                @foreach($cart as $id => $obj)
                        <?php
                        $totalprice = $totalprice + $obj['price'] * $obj['quantity']; ?>
                    <div class="flex  items-center hover:bg-gray-100 -mx-8 px-6 py-5 ">
                        <div class="flex w-2/5 mr-16"> <!-- product -->
                            <div class="w-20">
                                <img class="h-24" src="/image/{{$obj['image']}}" alt="">
                            </div>
                            <div class="flex flex-col justify-between ml-4 flex-grow">
                                <span class="font-bold text-xl "> {{$obj['name']}} </span>

                                <a href="/cart/delete/{{$id}}"
                                   class="font-semibold hover:text-red-500 text-gray-500 text-xs">Xóa</a>
                            </div>
                        </div>
                        <form action="/home/update_cart/{{$id}}">
                            @csrf
                                <div class="flex justify-center w-1/5 pl-20 ">
                                    <button name="button" type="submit" class="hover:text-red-900" value="0">
                                    <svg class="fill-current text-gray-600 w-3  hover:text-red-900" viewBox="0 0 448 512"><path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                                    </svg>
                                    </button>

                                    <input  class="mx-2 border text-center w-24" min="1" type="text" disabled value="{{$obj['quantity']}}">

                                    <button name="button" type="submit" value="1" class="hover:text-blue-900">
                                    <svg class="fill-current text-gray-600 w-3 hover:text-blue-900" viewBox="0 0 448 512">
                                        <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                                    </svg>
                                    </button>
                            </div>
                        </form>
                        <span class="text-center w-1/5 font-semibold text-xl pr-10"> {{number_format($obj['price'])}} đ </span>
                        <div class="flex justify-center w-1/5">
                            <span class="font-bold text-xl "> {{number_format($obj['price']*$obj['quantity'])}} đ </span>
                        </div>
                    </div>
                @endforeach
            <a href="/" class="flex font-semibold text-indigo-600 text-sm mt-10">

                <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
                    <path
                        d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/>
                </svg>
                Continue Shopping
            </a>
        </div>

        <div id="summary" class="w-1/4 px-8 py-10">
            <h1 class="font-semibold text-2xl border-b pb-8">Thanh toán</h1>
            <div class="border-t mt-8">
                <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                    <span>Tổng tiền</span>
                    <span>{{number_format($totalprice)}} Đ</span>
                </div>
                <a href="/home/checkout/" class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full"
                <button>Thanh toán</button>
                </a>
            </div>
        </div>
        @endif
    </div>
</div>
</body>
</body>
</html>
