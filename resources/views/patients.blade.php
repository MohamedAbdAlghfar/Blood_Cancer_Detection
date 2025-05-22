<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        /* General Styles */
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background-color: #f4f4f4;
            color: #333;
            padding-top: 70px;
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

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #046791;
            color: white;
            font-size: 18px;
        }

        .table tr:hover {
            background-color: #f1f1f1; 
        }

        .table tr {
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .container {
                width: 95%;
            }

            .nav-links {
                flex-direction: column;
                align-items: center;
            }

            .nav-links li {
                margin: 10px 0;
            }
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
        <li><a href="/patients">Patients</a></li>
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
    <h2>Patients</h2>

    <!-- Search Bar -->
    <form method="GET" action="" style="margin-bottom: 20px; text-align: right;">
        <input type="text" name="search" placeholder="Search by patient name" value="{{ request('search') }}"
               style="padding: 10px; width: 250px; border-radius: 8px; border: 1px solid #ccc;">
        <button type="submit"
                style="padding: 10px 15px; background-color: #046791; color: white; border: none; border-radius: 8px; cursor: pointer;">
            Search
        </button>
    </form>

    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>Patient name</th>
                <th>Patient age</th> 
                <th>Patient address</th>
                <th>Patient phone</th>
            </tr>
        </thead> 
        <tbody>
            @forelse($patients as $patient)
                <tr onclick="window.location.href='{{ route('patients.show', $patient->id) }}'">
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->age }}</td>
                    <td>{{ $patient->address }}</td> 
                    <td>{{ $patient->phone }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No patients found.</td> 
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
