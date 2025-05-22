<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="../static/css/all.css">
    <style>
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
            margin-left: auto;
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

        .container {
            width: 80%;
            margin: 40px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #010F53;
        }

        .file-upload-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 10px;
        }

        .file-label {
            background-color: #007bff;
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
            background-color: #007bff;
            border: 2px solid #007bff;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.2s;
        }

        #custom-submit:hover {
            background-color: #0056b3;
            transform: scale(1.05);
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

        #patientSearch {
            margin-bottom: 10px;
            padding: 6px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
        }

        #patientSelect {
            padding: 8px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .add-patient-btn {
            background-color: #28a745;
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
            display: inline-block;
        }

        .add-patient-btn:hover {
            background-color: #218838;
        }

        .add-patient-container {
            text-align: right;
            width: 100%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<header>
    <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="logo">
    <ul class="nav-links">
        <li><a href="/dashboard">Home</a></li>
        <li><a href="/about">About</a></li>
        <li><a href="{{route('profile.edit')}}">Profile</a></li>
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

<img src="{{ asset('images/dashboard.jpg') }}" alt="dashboard" style="width: 100%; height: 400px; object-fit: cover;">

<div class="container">
    <h1>Blood Cancer Detection System</h1>
    <p>ALL diagnosis using peripheral blood smear (PBS) images plays a vital role in the initial cancer screening...</p>
    
    <form action="{{ route('predict') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Add Patient Button -->
        <div class="add-patient-container">
            <a href="{{ route('CreatePatient') }}" class="add-patient-btn">+ Add Patient</a>
        </div>

        <!-- Patient Dropdown -->
        <div class="file-upload-container">
            <label for="patient_id" style="font-weight: bold; margin-bottom: 5px;">Select Patient</label>
            <input type="text" id="patientSearch" placeholder="Search patients...">
            <select id="patientSelect" name="patient_id" required>
                <option value="" disabled selected>Select a patient</option>
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->name }}</option> 
                @endforeach
            </select> 
        </div>
        <br>

        <!-- Image Upload -->
        <div class="file-upload-container">
            <label for="photo" class="file-label">Choose Image</label>
            <span id="file-name">No file chosen</span>
            <input id="photo" type="file" name="photo" hidden onchange="displayFileName()">
        </div>
        <br>
        
        <button type="submit" id="custom-submit">Predict</button>
    </form>

    <script>
        // Display selected file name
        function displayFileName() { 
            const fileInput = document.getElementById('photo'); 
            const fileName = document.getElementById('file-name');
            fileName.textContent = fileInput.files.length > 0 ? fileInput.files[0].name : "No file chosen";
        }

        // Search patients in dropdown
        const searchInput = document.getElementById('patientSearch');
        const patientSelect = document.getElementById('patientSelect');

        searchInput.addEventListener('keyup', function () {
            const filter = searchInput.value.toLowerCase();
            const options = patientSelect.options;

            for (let i = 0; i < options.length; i++) {
                const optionText = options[i].text.toLowerCase();
                options[i].style.display = optionText.includes(filter) ? '' : 'none';
            }
        });
    </script>
</div>
</body>
</html>
