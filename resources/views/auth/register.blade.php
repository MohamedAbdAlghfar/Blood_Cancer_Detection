<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Cancer Detection - Register</title>
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
        <h1 class="text-3xl font-bold text-center mb-6">Register</h1>
        
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label for="name" class="block font-semibold">Name</label>
                <input id="name" type="text" name="name" class="w-full border rounded-lg p-3 mt-1 focus:ring focus:ring-blue-300" required autofocus>
            </div>
            
            <div class="mb-4">
                <label for="email" class="block font-semibold">Email</label>
                <input id="email" type="email" name="email" class="w-full border rounded-lg p-3 mt-1 focus:ring focus:ring-blue-300" required>
            </div>
            
            <div class="mb-4">
                <label for="password" class="block font-semibold">Password</label>
                <input id="password" type="password" name="password" class="w-full border rounded-lg p-3 mt-1 focus:ring focus:ring-blue-300" required>
            </div>
            
            <div class="mb-4">
                <label for="password_confirmation" class="block font-semibold">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="w-full border rounded-lg p-3 mt-1 focus:ring focus:ring-blue-300" required>
            </div>
            
            
            <div class="mb-4">
                <label for="phone" class="block font-semibold">Phone</label>
                <input id="phone" type="text" name="phone" class="w-full border rounded-lg p-3 mt-1 focus:ring focus:ring-blue-300" required>
            </div>
            
            
            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('login') }}" class="text-sm text-blue-500 hover:underline">Already registered?</a>
                <button type="submit" class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Register</button>
            </div> 
        </form>
    </div>
</body>
</html>