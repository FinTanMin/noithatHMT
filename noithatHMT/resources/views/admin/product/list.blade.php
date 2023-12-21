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
<body class="bg-gray-900 p-3 sm:p-5 antialiased">

<div class="w-full flex flex-col items-center ">
    <div class="w-full md:w-1/2">
        <form class="flex items-center" action="/admin/product/search" method="GET" >
            @csrf
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input  type="text" id="simple-search" name="search" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2" placeholder="Search" required="">
            </div>
        </form>
    </div>
    <div class="w-4/5 text-white ">
       @include('admin.product.line')
        <button type="button" id="createProductModalButton"  class="flex items-center justify-center text-white bg-blue-500 hover:bg-prim focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">
        <a href="/">Đăng xuất</a>
        </button>
        <h4 class="text-3xl text-red-400 text-center justify-center ">Danh sách sản phẩm </h4>
        <div class=" pt-3">
            <table class="   border border-slate-950     ">
                <thead class=" border border-separate border-slate-950 table-auto">
                <tr>
                    <th class="border border-slate-600 px-3">ID</th>
                    <th class="border border-slate-600 px-7">Tên sản phẩm</th>
                    <th class="border border-slate-600 px-5">Loại</th>
                    <th class="border border-slate-600 px-7">Thương hiệu</th>
                    <th class="border border-slate-600 px-5">Số lượng</th>
                    <th class="border border-slate-600 px-12">Hình ảnh</th>
                    <th class="border border-slate-600 px-5">Giá</th>
                    <th class="border border-slate-600 px-12">Chi tiết </th>
                    <th class="border border-slate-600 px-5">Hành động</th>
                </tr>
                </thead>
                <tbody>

                <button type="button" id="createProductModalButton"  class="flex items-center justify-center text-white bg-blue-500 hover:bg-prim focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">

                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                    </svg>
                    <a href="/admin/product/add"/>
                    Thêm sản phẩm
                </button>
                </a>
                <br>
                @foreach($products as $obj)
                    <tr class="items-center justify-center text-center">
                        <td class="border border-slate-600">{{$obj->id}}</td>
                        <td class="border border-slate-600">{{$obj->Product_name}}</td>
                        <td class="border border-slate-600">{{$obj->Category_name}}</td>
                        <td class="border border-slate-600">{{$obj->brand_name}}</td>
                        <td class="border border-slate-600">{{$obj->Product_quantity}}</td>
                        <td class="border border-slate-600 p-5"><img src="/image/{{$obj->image}}" width="200px"></td>
                        <td class="border border-slate-600">{{number_format($obj->Product_price)}}Đ</td>
                        <td class="border border-slate-600">{{$obj->Product_description}}</td>
                        <td class="border border-slate-600">
                            <a href="/admin/product/{{$obj->id}}/edit">
                                <button type="button" class="mb-2 hover:text-yellow-400">
                                    Sửa
                                    <i class="typcn typcn-edit btn-icon-append"></i>
                                </button></a>

                            <br>
                            <a href="/admin/product/delete/{{$obj->id}}"><button type="button" class="mb-2 hover:text-red-400"  id="delete">
                                    Xóa
                                    <i class="typcn  typcn-delete-outline btn-icon-append"></i>
                                </button></a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
