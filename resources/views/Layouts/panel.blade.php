<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('Icons/css/all.css') }}">
    @yield('head')
    @livewireStyles
</head>

<body class="bg-slate-200">
    <div class="py-2 bg-white">
        <div class="container">
            <nav class="flex justify-end space-x-4">
                <a href="#"
                    class="flex justify-center conetent-center font-medium px-3 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900">
                    <p class="mb-0 self-center">{{ auth('user')->user()->username }}</p>
<img src="{{ url('/images/avatar/' . auth('user')->user()->images) }}" alt="" class="w-9 h-9 rounded-full border border-dark-500 overflow-hidden ms-3">
                </a>
            </nav>
        </div>
    </div>

    <div>
        @yield('pages')
    </div>

    <script src="{{ asset('./dist/js/jquery.js') }}"></script>
    <script src="{{ asset('./dist/js/alert.js') }}"></script>
    <script src="{{ asset('./dist/js/chart.js') }}"></script>
    @livewireScripts
    @yield('script')
</body>

</html>
