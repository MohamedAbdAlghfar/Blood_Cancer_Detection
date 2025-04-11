<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Cancer Detection</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        

        .content {
           
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-white">
   
    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="content">
            <h1 class="text-4xl font-bold text-red-600">Blood Cancer Detection</h1>
            <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">An AI-powered system for early detection and diagnosis.</p>
            
            @if (Route::has('login'))
                <div class="mt-6">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-6 py-3 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="px-6 py-3 bg-gray-800 text-white font-semibold rounded-lg shadow-md hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500">Log in</a>
                    
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</body>
</html>