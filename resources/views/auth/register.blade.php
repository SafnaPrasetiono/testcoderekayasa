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
            padding-top: 1rem;
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
        <div class="head-auth">
            <div class="py-4">
                <h2 class="font-bold text-lg">Registration</h2>
                <p>Wellcime in from registeration</p>
            </div>
        </div>
        <div class="body-auth">
            <form action="{{ route('register.post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <label for="username" class="block w-full mb-1">Username</label>
                    <input type="text"  id="username" name="username"
                    class="block box-border w-full px-3 py-1 rounded-md border border-gray-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
      disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
      @error('username') border-rose-500 @else border-gray-400 @enderror" placeholder="Username" value="{{ old('username') }}">
                    @error('username')
                    <div class="text-rose-500">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="email" class="block w-full mb-1">Email</label>
                    <input type="text"  id="email" name="email"
                    class="block box-border w-full px-3 py-1 rounded-md border border-gray-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
      disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
      @error('email') border-rose-500 @else border-gray-400 @enderror" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                    <div class="text-rose-500">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="phone" class="block w-full mb-1">Phone</label>
                    <input type="text" id="phone" name="phone"
                     class="block box-border w-full px-3 py-1 rounded-md border border-gray-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
      disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
      @error('phone') border-rose-500 @else border-gray-400 @enderror" placeholder="Phone" value="{{ old('phone') }}">
                    @error('phone')
                    <div class="text-rose-500">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="password" class="block w-full mb-1">Password</label>
                    <input type="password" id="password" name="password"
                    class="block box-border w-full px-3 py-1 rounded-md border border-gray-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
      disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
      @error('password') border-rose-500 @else border-gray-400 @enderror" placeholder="Password" value="{{ old('password') }}">
                    @error('password')
                    <div class="text-rose-500">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="passwordc" class="block w-full mb-1">Confirm Password</label>
                    <input name="password_confirmation" type="password" id="passwordc"
                        class="block box-border w-full px-3 py-1 rounded-md border border-gray-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
      disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
      @error('password_confirmation') border-rose-500 @else border-gray-400 @enderror"
                        placeholder="Confirmation Password" value="{{ old('password_confirmation') }}">
                    @error('password_confirmation')
                    <div class="text-rose-500">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="" class="block w-full mb-1">Images</label>
                    <div class="flex items-stretch gx-2">
                        <input type="text" id="imagesname"
                        class="getimages block box-border w-full px-3 py-1 rounded-md border border-gray-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
      disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
      @error('images') border-rose-500 @else border-gray-400 @enderror" 
                        placeholder="Upload your Images" >
                        <input type="file" id="images" name="images" class="setimages hidden" value="{{ old('password_confirmation') }}">
                        <label for="images" class="flex items-center justify-center bg-blue-600 hover:bg-blue-500 rounded-lg text-white w-20 ms-3">Add</label>
                    </div>
                    @error('images')
                    <div class="text-rose-500">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="" class="block w-full mb-1">CV Upload</label>
                    <div class="flex items-stretch gx-2">
                        <input type="text" id="filesname"
                        class="getfiler block box-border w-full px-3 py-1 rounded-md border border-gray-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
      disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
      @error('files') border-rose-500 @else border-gray-400 @enderror" 
                        placeholder="Upload your CV">
                        <input type="file" id="files" name="filecv" class="setfiler hidden" hidden value="{{ old('password_confirmation') }}">
                        <label for="files" class="flex items-center justify-center bg-blue-600 hover:bg-blue-500 rounded-lg text-white w-20 ms-3">Add</label>
                    </div>
                    @error('files')
                    <div class="text-rose-500">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="justify-center bg-blue-600 hover:bg-blue-500 rounded-lg text-white w-full py-2">Sign Up</button>
            </form>
        </div>
        <div class="footer-auth">
            <div class="flex justify-center py-3">
                <p>Alredy have an account?</p> <a href="{{ route('login') }}" class="ms-1 text-blue-600 hover:text-blue-400">Sign In</a>
            </div>
        </div>
    </div> 
    
    <script src="{{ asset("./dist/js/jquery.js") }}"></script>
    <script>
        $('.setfiler').change(function(e){
            value = this.files[0].name;
            // console.log(value);
            $('.getfiler').val(value);
            
        });
        $('.setimages').change(function(e){
            value = this.files[0].name;
            // console.log(value);
            $('.getimages').val(value);
            
        });
    </script>
</body>

</html>
