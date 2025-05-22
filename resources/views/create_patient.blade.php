<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Patient</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f0f2f5;
            padding: 50px;
        }

        .form-container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #046791;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 15px;
        }

        .btn-submit,
        .btn-back {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
            margin-top: 10px;
        }

        .btn-submit:hover,
        .btn-back:hover {
            background-color: #0056b3;
            transform: scale(1.03);
        }

        .btn-back {
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Create Patient</h2>
        <form  method="post" action="{{ route('StorePatient') }}" enctype="multipart/form-data" autocomplete="off">
        @csrf

            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required> 

            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" required>

            <label for="age">Age</label>
            <input type="number" id="age" name="age" min="0" required>

            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
                <option value="" disabled selected>Select gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <label for="address">Address</label>
            <textarea id="address" name="address" rows="3" required></textarea>

            <button type="submit" class="btn-submit">Create Patient</button>
        </form>

        <!-- Back Button -->
        <a href="/dashboard" class="btn-back">Back to Dashboard</a>
    </div>

</body>
</html>
