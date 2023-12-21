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
    @include('/home/nav')
    <body class="bg-gray-50  antialiased mt-[200px]">

    <div class="w-full flex flex-col items-center ">
        <div class="w-full md:w-1/2">
        </div>
        <div class="w-4/5 text-bg-900 ">
            <h4 class="text-3xl text-red-400 text-center  ">Đơn hàng</h4>
            <div class=" pt-3">
                <table class="   border border-slate-950 ">
                    <thead class=" border border-separate border-slate-950 table-auto">
                    <tr>
                        <th class="border border-slate-600 px-3">ID</th>
                        <th class="border border-slate-600 px-5">Khách hàng</th>
                        <th class="border border-slate-600 px-5">Số điện thoại</th>
                        <th class="border border-slate-600 px-12">Ngày đặt</th>
                        <th class="border border-slate-600 px-12">Tình trạng</th>
                        <th class="border border-slate-600 px-12"></th>
                    </tr>
                    </thead>
                    <tbody>
                    </a>
                    <br>
                    @foreach($order as $obj)
                        <tr class="items-center justify-center text-center">
                            <td class="border border-slate-600">{{$obj->id}}</td>
                            <td class="border border-slate-600">{{$obj->name}}</td>
                            <td class="border border-slate-600">{{$obj->phone}}</td>
                            <td class="border border-slate-600">{{$obj->order_date}}</td>
                            @if( $obj->order_status== 1)
                            <td class="border border-slate-600" value="1">Đang xác thực</td>
                            @elseif($obj->order_status== 2)
                            <td class="border border-slate-600" value="2">Thành công</td>
                            @elseif($obj->order_status== 3)
                            <td class="border border-slate-600" value="3">Hủy</td>
                            @endif
                            <td class="border border-slate-600 py-5 flex flex-col ">
                                <a href="/home/order/{{$obj->id}}/detail"><button type="button" class="mb-2 hover:text-blue-300"  id="detail">
                                        Chi tiết
                                    </button></a>
                                @if($obj->order_status == 1)
                                <a href="/home/order/remove/{{$obj->id}}"><button type="button" class="mb-2 hover:text-red-300"  id="detail">
                                        Hủy
                                    </button></a>
                                @endif

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
