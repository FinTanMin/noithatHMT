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

<body class="bg-gray-900  antialiased ">
@include('admin.product.line')
<button type="button" id="createProductModalButton"  class="flex items-center justify-center text-white bg-blue-500 hover:bg-prim focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">
    <a href="/">Đăng xuất</a>
</button>
<div class="w-full flex flex-col items-center ">
    <div class="w-full md:w-1/2">
    </div>
    <div class="w-4/5 text-white ">
        <h4 class="text-3xl text-red-400 text-center  ">Danh sách đơn hàng</h4>
        <div class=" pt-3">
            <table class="border border-slate-950  ">
                <thead class=" border border-separate border-slate-950 table-auto">
                <tr>
                    <th class="border border-slate-600 px-3">ID</th>
                    <th class="border border-slate-600 px-20">Khách hàng</th>
                    <th class="border border-slate-600 px-5">Số điện thoại</th>
                    <th class="border border-slate-600 px-12">Địa chỉ</th>
                    <th class="border border-slate-600 px-12">Vai trò</th>
                    <th class="border border-slate-600 px-12"></th>
                </tr>
                </thead>
                <tbody  >

                </a>
                <br>
                @foreach($users as $obj)
                    <tr class="items-center justify-center text-center">
                        <td class="border border-slate-600">{{$obj->id}}</td>
                        <td class="border border-slate-600">{{$obj->name}}</td>
                        <td class="border border-slate-600">{{$obj->phone}}</td>
                        <td class="border border-slate-600">{{$obj->address}}</td>
                        <td class="border border-slate-600 p-2">
                            <form method="post" action="/admin/user/update/{{$obj->id}}">
                                @csrf
                                <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                    @if($obj->role == 1)
                                        <option selected="" value="1">Admin</option>
                                        <option value="0">Khách hàng</option>

                                    @elseif($obj->order_status == 0)
                                        <option selected="" value="0">Khách hàng</option>
                                        <option value="1">Admin</option>
                                    @endif
                                </select>
                        </td>
                        <td class="border border-slate-600 py-5 flex flex-col">
                            <button type="submit" class="mb-2 hover:text-yellow-300"  >
                                Cập nhật
                                <i class="typcn  typcn-delete-outline btn-icon-append"></i>
                            </button>
                            </form>

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


</div>
</body>
</html>
