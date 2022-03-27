<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('titulo') - Marvel Charecters</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="bg-gray-400 font-sans leading-normal tracking-normal">

        <nav class="flex items-center justify-between flex-wrap bg-black p-6 fixed w-full z-10 top-0">
            <div class="flex items-center flex-shrink-0 text-white mr-6">
                <a class="text-white no-underline hover:text-white hover:no-underline inline-flex" href="#">
                    <img src="img/logo.jpg" class="max-h-11" alt="">
                    <span class="text-4xl pl-2"> | Personajes</span>
                </a>
            </div>

            <div class="block lg:hidden">
                <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-white hover:border-white">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                </button>
            </div>
            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block pt-6 lg:pt-0" id="nav-content">
                <ul class="list-reset lg:flex justify-end flex-1 items-center">
                    @auth
                    <li class="mr-3">
                        <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="#">link</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="#">link</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="#">link</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block py-2 px-4 text-white no-underline" href="#">Bienvenid@: {{ Auth::user()->name }}</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block py-2 px-4 text-white no-underline" href="{{ route('signout') }}">Salir</a>
                    </li>
                    @else
                    <li class="mr-3">
                        <a class="inline-block py-2 px-4 text-white no-underline" href="{{ route('login') }}">Iniciar sesión</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </nav>

        <!--Container-->
        <div class="container mx-auto  mt-24 md:mt-18">
            @yield('contenido')
        </div>

        <script>
            //Javascript to toggle the menu
            document.getElementById('nav-toggle').onclick = function(){
                document.getElementById("nav-content").classList.toggle("hidden");
            }
        </script>
    </body>
</html>
