<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Cancer Detection - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 150px;
            height: auto;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen flex items-center justify-center p-6">
<img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="logo">
    <div class="bg-white text-gray-900 p-10 rounded-lg shadow-lg max-w-4xl w-full">
        <h1 class="text-3xl font-bold text-center mb-6">Login</h1>
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="mb-4">
                <label for="email" class="block font-semibold">Email</label>
                <input id="email" type="email" name="email" class="w-full border rounded-lg p-3 mt-1 focus:ring focus:ring-blue-300" required autofocus>
            </div>
            
            <div class="mb-4">
                <label for="password" class="block font-semibold">Password</label>
                <input id="password" type="password" name="password" class="w-full border rounded-lg p-3 mt-1 focus:ring focus:ring-blue-300" required>
            </div>
            
            <div class="flex items-center justify-between mt-4">
                <label class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-blue-500 shadow-sm focus:ring focus:ring-blue-300">
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
                
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline">Forgot your password?</a>
                @endif
            </div>
            
            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('register') }}" class="text-sm text-blue-500 hover:underline">Don't have an account?</a>
                <button type="submit" class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Log in</button>
            </div>
        </form>
    </div>
</body>
</html>
