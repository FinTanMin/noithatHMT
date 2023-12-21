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
<body>
<div class="w-full flex flex-col items-center ">
    <div class="w-4/5 mt-[200px] flex flex-row">
        <img class="w-[600px] h-[600px]" src="/image/{{$products->image}}">
        <div class="flex flex-col">
            <div class="ml-12 font-bold text-5xl">
                {{ $products ->Product_name }}
            </div>
            <div class="ml-12 mt-5 text-2xl">
                Loại sản phẩm: {{ $products ->Category_name }}
            </div>
            <div class="ml-12 mt-5 text-2xl">
                Thương hiệu: {{ $products ->brand_name }}
            </div>
            <div class="ml-12 mt-5 font-light text-2xl text-gray-700">
                Giá tiền: {{ number_format($products ->Product_price) }}Đ
            </div>
            <div class="ml-12 mt-3 font-light text-xl text-gray-700">
                Mổ tả chi tiết: {{ $products ->Product_description }}
            </div>

            <div class="ml-12 mt-5 h-[1px] w-[430px]  bg-gray-800"></div>
            <div class="ml-12 mt-3 font-light text-2xl text-gray-700">
                Số lượng còn lại: {{ $products ->Product_quantity }}
            </div>
            <form enctype="multipart/form-data" method="POST" action="{{Route('add_cart',$products -> id)}} ">
                @csrf
                <input class="ml-12" type="number" name="quantity" value="1"  min="1">
                <input class="ml-12 mt-5 bg-orange-400 p-4 border-2 hover:bg-orange-600 font-bold border-black text-center" type="submit"  value="Thêm sản phẩm " >
            </form>
        </div>

    </div>
</div>
</div>
</div>
</body>
</html>
