<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="../static/css/all.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
 
        section {
            margin-top: 100px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            font-size: 18px; 
        }

        header {
            width: 100%;
            height: 60px;
            background-color: #046791;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            border-radius: 0 0 10px 10px;
        }

        header img.logo {
            height: 50px;
        }

        .nav-links {
            list-style: none;
            display: flex; align-items: center;
            display: flex;
        }

        .nav-links li {
            margin: 2px 15px 0px 15px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #ffcc00;
        }

        .logout-btn {
            background: none;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }

        .logout-btn i {
            margin-right: 5px;
        }

        .logout-btn:hover {
            color: #ffcc00;
        }
    </style>
</head>
<body>
<header>
    <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="logo">
    <ul class="nav-links">
        <li><a href="/dashboard">Home</a></li>
        <li><a href="/about">About</a></li>
        <li><a href="{{ route('profile.edit') }}">Profile</a></li>
        <li><a href="/history">History</a></li>
        <li><a href="/contact">Contact Us</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Log Out
                </button>
            </form>
        </li>
    </ul>
</header>

<section>
    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div>
            <label for="name">Name</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required>
        </div>

        <div>
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div>
            <label for="phone">Phone</label> 
            <input id="phone" name="phone" type="text" value="{{ old('phone', $user->phone) }}" required>
        </div>

        <div>
            <label for="age">Age</label>
            <input id="age" name="age" type="number" value="{{ old('age', $user->age) }}" required>
        </div>

        <div>
            <label for="address">Address</label>
            <input id="address" name="address" type="text" value="{{ old('address', $user->address) }}" required>
        </div>

        <div style="margin-top: 10px;">
            <button type="submit">Save</button>
            @if (session('status') === 'profile-updated')
                <p style="color: green;">Saved.</p>
            @endif
        </div>
    </form>
</section>
</body>
</html>