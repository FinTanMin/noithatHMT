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
        <div class="text-4xl text-center font-bold text-white ">CIRE TRVDON</div>
    </div>
    <div class=" grid grid-cols-3">
        @foreach($products as $obj)
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
</body>

</html>
