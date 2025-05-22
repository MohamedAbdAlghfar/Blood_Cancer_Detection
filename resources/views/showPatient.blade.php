<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Reset & Fonts */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f9f9f9;
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.08);
            position: relative;
        }

        h2, h3 {
            color: #046791;
            margin-bottom: 20px;
        }

        /* Patient Info */
        .patient-info {
            margin-bottom: 30px;
            border-bottom: 2px solid #eee;
            padding-bottom: 20px;
        }

        .patient-info .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .patient-info .col {
            flex: 1 1 45%;
        }

        .patient-info p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        /* Diagnosis Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        thead {
            background-color: #046791;
            color: white;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f3f3f3;
        }

        img {
            width: 120px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        /* Back Button */
        .back-btn {
            margin-top: 30px;
            text-align: right;
        }

        .back-btn a {
            text-decoration: none;
            background-color: #046791;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .back-btn a:hover {
            background-color: #034a66;
        }

        @media (max-width: 768px) {
            .patient-info .col {
                flex: 1 1 100%;
            }

            img {
                width: 80px;
            }

            .back-btn {
                text-align: center;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Patient Information</h2>
    <div class="patient-info">
        <div class="row">
            <div class="col">
                <p><strong>Name:</strong> {{ $patient->name }}</p>
                <p><strong>Age:</strong> {{ $patient->age }}</p>
                <p><strong>Gender:</strong> {{ $patient->gender == 1 ? 'Male' : 'Female' }}</p>
            </div>
            <div class="col">
                <p><strong>Phone:</strong> {{ $patient->phone }}</p>
                <p><strong>Address:</strong> {{ $patient->address }}</p>
            </div>
        </div>
    </div>

    <h3>Blood Diagnosis Records</h3>
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Diagnosis</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        @forelse($diagnoses as $record)
            <tr>
                <td><img src="{{ asset('images/' . $record->photo) }}" alt="Blood Diagnosis"></td>
                <td>{{ $record->diagnoses }}</td>
                <td>{{ \Carbon\Carbon::parse($record->created_at)->format('Y-m-d H:i') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">No diagnosis records available.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <!-- Back Button at bottom right -->
    <div class="back-btn">
        <a href="{{ route('patients') }}">← Back to Patients</a>
    </div>

</div>

</body>
</html>
