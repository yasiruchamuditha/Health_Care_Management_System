<!DOCTYPE html>
<html>
<head>
    <title>Medical Specializations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #007BFF;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        li {
            background-color: #007BFF;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }
        li:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>List of Medical Specializations</h1>
    <ul>
        <li onclick="showDetails('Cardiology')">Cardiology (Heart specialist)</li>
        <li onclick="showDetails('Neurology')">Neurology (Brain and nerve specialist)</li>
        <li onclick="showDetails('Oncology')">Oncology (Cancer specialist)</li>
        <!-- Add other specializations here with their respective names -->
    </ul>

    <script>
        function showDetails(specialization) {
            window.location.href = "test50.php?specialization=" + encodeURIComponent(specialization);
        }
    </script>
</body>
</html>
