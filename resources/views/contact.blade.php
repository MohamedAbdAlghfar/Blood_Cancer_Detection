<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 400px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .success-message {
            color: green;
            text-align: center;
            margin-bottom: 15px;
            font-weight: bold;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        textarea {
            height: 100px;
            resize: none;
        }

        button {
            width: 100%;
            background: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #0056b3;
        }
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        #custom-button {
            padding: 12px;
            color: #046791;
            border: 1px solid #5a02de;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 27%;
        }

        header {
            height: 50px;
            width: 100%;
            background-color:white;
            float: left;
            top: 0;
            left: 0;
            position: fixed;
            z-index: 10;
            border-radius: 15px;
        }

        header h3 {
            margin-left: 50px;
            margin-right: 600px;
            float: left;
            margin-top: 10px;
            color: black;
            font-size: 25px;
        }

        header img {
            margin-left: 10px;
            color: #046791;
        }

        strong {
            color: #046791;
        }

        .tit {
            margin-right: 50px;
            margin-top: 15px;
            font-size: 20px;
            float: left;
            color: brown;
        }

        .a {
            text-decoration: none;
            color: #046791;
            position: relative;
        }

        .a:hover {
            color: rgb(101, 64, 235);
        }

        .a::after {
            position: absolute;
            content: "";
            bottom: -10px;
            left: 0;
            width: 0%;
            height: 3px;
            transition: all 1s;
            background-color: #1e00ff;
        }

        .a:hover::after {
            width: 100%;
        }

        .elemns {
            display: inline;
            list-style: none;
        }

        .elemns i {
            margin-right: 8px;
            color: #4708f4;
        }

        .backimage {
            background-image: url("../static/images/WhatsApp\ Image\ 2024-04-24\ at\ 01.21.27_29f7c8a3.jpg");
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
            float: left;
            margin-top: 50px;
            width: 100%;
            height: 340px;
        }

        #custom-button:hover {
            background-color: #9b5ff4;
        }

        #custom-text {
            margin-left:25px;
            font-family: Helvetica;
            color: darkgray;
        }

        .heading {
            text-align: center;
        }

        .subheading-left {
            text-align: left;
        }

        .subheading-right {
            text-align: right;
        }

        h1 {
            margin-top: 30px;
            padding: 20px;
            display: inline-flex;
            border: 3px solid #046791;
            border-radius: 15px;
            color: #010F53 ;
            font-family: Arial, Helvetica, sans-serif;
        }

        

        #text {
            color: black;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
            float: left;
            width: 35%;
            line-height: 1.6;
            margin-left: 10%;
            margin-top: 15px;
        }

        .topic {
            color: #046791;
            font-size: 20px;
            font-style: italic;
            font-family: Arial, Helvetica, sans-serif;
            text-decoration-line: underline;
            text-decoration-color: #046791;
            margin-left: 27%;
        }

        .box {
            display: flex;
            flex-direction: column;
            line-height: 45px;
        }

        #align-span {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            align-content: center;
            margin-right: 21%;
        }

        #custom-submit {
            padding: 7px;
            color: #046791;
            background-color: transparent;
            border: 2px solid #5a02de;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 27%;
            font-size: 18px;
        }

        #custom-submit:hover {
            background-color: blue;
        }

        #result {
            color: #046791;
            font-family: Helvetica;
            font-size: 18px;
            border: 2px solid #5a02de;
            border-radius: 5px;
            padding: 10px;
            line-height: 70px;
            margin-left: 26%;
        }

        .logo {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 150px;
            height: 50px;
        }

        .file-upload-container {
    display: flex;
    flex-direction: column;
    align-items: center; /* Centers the elements horizontally */
    justify-content: center; /* Centers the elements vertically (if needed) */
    text-align: center;
    margin-top: 10px;
}

.file-upload-container {
    display: flex;
    align-items: center;
    margin-left: -260px; /* Adjust the value as needed */
}

.file-label {
    background-color: #007bff; /* Blue color */
    color: white;
    padding: 6px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    display: inline-block;
}

.file-label:hover {
    background-color: #0056b3;
}

#custom-submit {
    padding: 10px 20px;
    color: white;
    background-color: #007bff; /* Blue color */
    border: 2px solid #007bff;
    border-radius: 8px;
    cursor: pointer;
    font-size: 18px;
    font-weight: bold;
    transition: background-color 0.3s, transform 0.2s;
}

#custom-submit:hover {
    background-color: #0056b3; /* Darker blue on hover */
    transform: scale(1.05); /* Slight zoom effect */
}

* {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        header {
            height: 50px;
            width: 100%;
            background-color: white;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 10;
            display: flex;
            align-items: center;
            padding: 0 20px;
            border-radius: 15px;
        }
        .logo {
            width: 150px;
            height: 50px;
        }
        .nav-links {
            list-style: none;
            display: flex;
            margin-left: auto;
        }
        .nav-links li {
            margin: 0 15px;
        }
        
        
        
        .nav-links a:hover::after {
            width: 100%;
        }
        .logout-form {
            display: inline;
        }
        .logout-form button {
            background: none;
            border: none;
            color: #046791;
            cursor: pointer; 
            font-size: 18px; 
        }


  /* Header */ 
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
            margin: 0 15px;
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

        /* Logout Button */
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

        /* Container */
        .container {
            width: 80%;
            margin: 40px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #046791;
            margin-bottom: 20px;
            font-size: 24px;
            border-bottom: 3px solid #046791;
            display: inline-block;
            padding-bottom: 5px;
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


    <div class="container">
        <h2>Contact Us</h2>

        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p> 
        @endif

        <form action="{{ route('send.email') }}" method="POST">
            @csrf
            <label>Name:</label>
            <input type="text" name="name" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Message:</label>
            <textarea name="message" required></textarea>

            <button type="submit">Send Email</button>
        </form>
    </div>

</body> 
</html>

 