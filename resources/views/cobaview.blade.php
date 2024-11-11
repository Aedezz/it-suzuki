<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data View</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            max-width: 450px;
            width: 100%;
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }
        .biodata {
            background-color: #f9fafb;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .biodata p {
            font-size: 16px;
            color: #333;
            margin: 10px 0;
            text-align: left;
        }
        .biodata p strong {
            color: #007bff;
        }
        button {
            background-color: #007bff;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            margin-top: 20px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Tersimpan</h1>
        <div class="biodata">
            <p><strong>Nomor:</strong> {{ $data->nomor }}</p>
            <p><strong>NIK:</strong> {{ $data->nik }}</p>
            <p><strong>Nama:</strong> {{ $data->nama }}</p>
        </div>
        <form action="{{ route('dashboard') }}" method="get">
            <button type="submit">Finish</button>
        </form>
    </div>
</body>
</html>
