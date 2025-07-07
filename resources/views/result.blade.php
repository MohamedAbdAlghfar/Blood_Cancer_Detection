<!DOCTYPE html>
<html lang="en">
<head>
    <title>Prediction Result</title>
    <link rel="stylesheet" href="../static/css/all.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            width: 50%;
            padding: 20px;
            text-align: center;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #046791; 
            margin-bottom: 20px;
        }
        .result {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin: 20px 0;
            padding: 10px;
            background: #e8f5ff;
            border-radius: 5px;
            display: inline-block;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #046791;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn:hover {
            background: #034d6b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Prediction Result</h1>
        <p class="result">{{ $prediction }}</p>
        <br>
        <a href="/dashboard" class="btn">Back to Home</a>
    </div>
</body>

</html>