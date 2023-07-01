<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TestCode - Wellcome in Register Form</title>
    @vite('resources/css/app.css')
    <style>
        .box-auth{
            height: 100vh;
            overflow-y: auto;
            background-color: white;
            padding-top: 3rem;
        }
        @media(min-width: 640px){
            .box-auth{
                top: 50%;
                left: 50%;
                width: 420px;
                height: auto;
                display: block;
                padding: 1.5rem;
                position: fixed;
                overflow: hidden;
                border-radius: 12px!important;
                transform: translate(-50%, -50%);
            }
            .head-auth{
                margin-bottom: 0px;
            }
        }
    </style>
</head>

<body class="bg-slate-200">
    
    <div class="box-auth container sm:container-none">
        <div class="head-auth mb-5">
            <div class="py-4">
                <h2 class="font-bold text-lg">Registration</h2>
                <p>Wellcime in from registeration</p>
            </div>
        </div>
        <div class="body-auth">
            <form action="{{ route('login.post') }}" method="post">
                @csrf
                <div class="mb-2">
                    <label for="email" class="block w-full mb-1">Email</label>
                    <input type="text"  id="email" name="email"
                    class="block box-border w-full px-3 py-1 rounded-md border border-gray-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none @error('email') border-rose-500 @else border-gray-400 @enderror" placeholder="Email">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="password" class="block w-full mb-1">Password</label>
                    <input type="password" id="password" name="password"
                    class="block box-border w-full px-3 py-1 rounded-md border border-gray-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none @error('password') border-rose-500 @else border-gray-400 @enderror" placeholder="Password">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="flex mb-5" style="justify-content: space-between">
                    <div class="">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember Me</label>
                    </div>
                    <div class="">
                        <a href="" class="text-blue-600 hover:text-blue-400">Forgot Password?</a>
                    </div>
                </div>
                <button type="submit" class="justify-center bg-blue-600 hover:bg-blue-500 rounded-lg text-white w-full py-2">Sign In</button>
            </form>
        </div>
        <div class="footer-auth">
            <div class="flex justify-center py-3">
                <p>Dont have an account?</p> <a href="{{ route('register') }}" class="ms-1 text-blue-600 hover:text-blue-400">Sign Up</a>
            </div>
        </div>
    </div> 
    
    <script src="{{ asset("./dist/js/jquery.js") }}"></script>
    <script src="{{ asset('./dist/js/alert.js') }}"></script>
    @if (session()->has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Good Jobs!',
            text: '{{ session()->get('success') }}',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
@elseif(session()->has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Opps...!',
            text: '{{ session()->get('error') }}',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
@endif
</body>

</html>
