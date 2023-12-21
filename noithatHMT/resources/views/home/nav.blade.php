@php use Illuminate\Support\Facades\Auth; @endphp
<nav class="top-0  z-100 fixed w-full bg-gray-900  py-5 px-10  border-gray-200 ">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a class="flex items-center" href="/">
            <span
                class="self-center text-6xl text-white font-semibold whitespace-nowrap hover:text-blue-900 ">HMT</span>
        </a>
        <ul class="flex flex-col p-4 md:p-0  font-medium border border-gray-100 rounded-lg bg-gray-900 md:flex-row md:space-x-8 md:mt-0 md:border-0 bg-gray-900 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
                <a href="/"
                   class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Trang
                    chủ</a>
            </li>
            <li>
                <a href="/home/category"
                   class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Sản
                    phẩm</a>
            </li>
            <li>
                <a href="/home/brand"
                   class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Thương
                    hiệu</a>
            </li>

{{--            <li>--}}
{{--                <div class="flex ml-12 ">--}}
{{--                    <div class="relative">--}}
{{--                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">--}}
{{--                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 " aria-hidden="true"--}}
{{--                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">--}}
{{--                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                      stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>--}}
{{--                            </svg>--}}
{{--                            <span class="sr-only">Search icon</span>--}}
{{--                        </div>--}}
{{--                        <form class="flex items-center" action="/home/search" method="GET" >--}}
{{--                            @csrf--}}
{{--                        <input type="text"  id="search-navbar" class="block w-full p-2 pl-10 text-sm text-gray-700 border border-gray-300 rounded-lg "--}}
{{--                               placeholder="Tìm kiếm...">--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
            <li>
                <a href="/home/cart"
                   class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/>
                    </svg>
                </a>

            </li>
            @auth
                <li class="text-white mt-2 hover:text-blue-500">
                    <a href="/home/order/list">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                    </svg>
                </a>
                </li>
                <li class="text-white ">{{Auth::user()->name}}</li>
                <form method="post" action="/home/logout">
                    @csrf
                    <button class="text-white hover:text-blue-500">Đăng xuất</button></form>
            @else

                <li>
                    <a href="/home/login"
                       class="block  py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Đăng
                        nhập</a>
                </li>
                <li>
                    <a href="/home/register"
                       class="block  py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Đăng
                        ký</a>
                </li>
            @endauth
        </ul>
    </div>
    </div>
</nav>
