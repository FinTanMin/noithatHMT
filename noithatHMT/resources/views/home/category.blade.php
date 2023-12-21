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
<div class="w-full flex flex-col items-center ">
    <div class="w-full bg-gray-800  mt-[130px] p-12">
        <div class="text-4xl text-center font-bold text-white ">Sản phẩm</div>
    </div>
    <div class="w-full p-12">
        <div class="w-full flex flex-col m-8">
            <div class="flex flex-row">
                <div class="text-4xl font-bold mr-1 ml-4">
                    TỦ
                </div>
                <div class="h-[1px] bg-gray-400 w-full mt-4"></div>
                <div class="w-1/6 mt-1 ml-1">
                    <a href="/home/category1">Xem tất cả</a>
                </div>
            </div>
            <div class=" grid grid-cols-3">
                @foreach($products1 as $obj)
                    <div class="flex flex-col items-center mx-4 py-3 text-center justify-center hover:bg-gray-100 hover:translate-y-2 " >
                        <a href="{{Route('product_detail', $obj->id)}}"><img class="w-[300px] h-[200px]"  src="/image/{{$obj->image}}" alt=""></a>
                        <div class="text-2xl font-bold mt-2"> {{$obj->Product_name}} </div>
                        <div class="text-xl font-light mb-1"> {{$obj->Product_price}}Đ </div>
                        <div class="flex flex-row mt-2 hover:underline">
                            <a href="{{Route('product_detail', $obj->id)}}" >Xem thêm </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="w-full flex flex-col ml-12 ">
            <div class="flex flex-row">
                <div class="text-4xl font-bold mr-1">
                    Bàn
                </div>
                <div class="h-[1px] bg-gray-400 w-full mt-6"></div>
                <div class="w-1/6 mt-3 ml-1">
                    <a href="/home/category2">Xem tất cả</a>
                </div>
            </div>
            <div class=" grid grid-cols-3">
                @foreach($products2 as $obj)
                    <div class="flex flex-col items-center mx-4 py-3 text-center justify-center hover:bg-gray-100 hover:translate-y-2 " >
                        <a href="{{Route('product_detail', $obj->id)}}"><img class="w-[300px] h-[200px]"  src="/image/{{$obj->image}}" alt=""></a>
                        <div class="text-2xl font-bold mt-2"> {{$obj->Product_name}} </div>
                        <div class="text-xl font-light mb-1"> {{$obj->Product_price}}Đ </div>
                        <div class="flex flex-row mt-2 hover:underline">
                            <a href="{{Route('product_detail', $obj->id)}}" >Xem thêm </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="w-full flex flex-col mt-6">
                <div class="flex flex-row">
                    <div class="text-4xl font-bold mr-1">
                        Ghế
                    </div>
                    <div class="h-[1px] bg-gray-400 w-full mt-6"></div>
                    <div class="w-1/6 mt-3 ml-1">
                        <a href="/home/category3">Xem tất cả</a>
                    </div>
                </div>
                <div class=" grid grid-cols-3">
                    @foreach($products3 as $obj)
                        <div class="flex flex-col items-center mx-4 py-3 text-center justify-center hover:bg-gray-100 hover:translate-y-2 " >
                            <a href="{{Route('product_detail', $obj->id)}}"><img class="w-[300px] h-[200px]"  src="/image/{{$obj->image}}" alt=""></a>
                            <div class="text-2xl font-bold mt-2"> {{$obj->Product_name}} </div>
                            <div class="text-xl font-light mb-1"> {{$obj->Product_price}}Đ </div>
                            <div class="flex flex-row mt-2 hover:underline">
                                <a href="{{Route('product_detail', $obj->id)}}" >Xem thêm </a>
                            </div>
                        </div>
                    @endforeach
                </div>
        </div>
    </div>

</div>
</body>

</html>
