<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
@include('home.nav')
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #summary {
            background-color: #f6f6f6;
        }
    </style>
</head>

<body class="bg-gray-100 mt-[200px]" >
<div class="container mx-auto mt-10">
    <div class="flex shadow-md my-10">
        <div class="w-3/4 bg-white px-10 py-10">
            <div class="flex justify-between border-b pb-8">
                <h1 class="font-semibold text-2xl ">Đơn hàng </h1>
            </div>
            <div class="flex mt-10 mb-5">
                <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Sản phẩm</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Số lượng</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Giá</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Tổng tiền</h3>
            </div>
            <?php $totalprice = 0; ?>
            @foreach($order_detail as $obj)
                    <?php
                    $totalprice += ($obj->price)*($obj->quantity); ?>
                <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                    <div class="flex w-2/5"> <!-- product -->
                        <div class="w-20">
                            <img class="h-24" src="/image/{{$obj->image}}" alt="">
                        </div>
                        <div class="flex flex-col justify-between ml-4">
                            <span class="font-bold text-sm">{{$obj->Product_name}}</span>
                        </div>
                    </div>
                    <div class="flex justify-center w-1/5">
                        <span class="text-center w-1/5 font-semibold text-sm">{{$obj->quantity}}</span>
                    </div>
                    <span class="text-center w-1/5 font-semibold text-sm">{{number_format($obj->price)}} Đ</span>

                    <span class="text-center w-1/5 font-semibold text-sm">{{number_format(($obj->price)*($obj->quantity))}} Đ</span>

                </div>




            @endforeach

        </div>

        <div id="summary" class=" px-8 py-10">
            <div>
                <h3 class="font-semibold text-center  text-x  border-b pb-2">Tình trạng</h3>
                <div class=" text-center  ">
                    @if($obj->order_status == 1)
                        <span class="text-center w-1/5 font-semibold text-sm">Đang xác thực </span>
                    @elseif($obj->order_status == 2)
                        <span class="text-center w-1/5 font-semibold text-sm">Thành công </span>
                    @elseif($obj->order_status == 3)
                        <span class="text-center w-1/5 font-semibold text-sm">Hủy </span>
                    @endif
                </div>
                <h1 class="font-semibold text-2xl mt-12 border-b pb-8">Tổng tiền sản phẩm</h1>
                <span class="ml-12 font-bold text-xl">{{number_format($totalprice)}} Đ</span>
            </div>

        </div>
    </div>
</div>
</body>
</html>
</html>
