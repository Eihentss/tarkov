<!-- resources/views/tarkov/ammo.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarkov - Ammo</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        /* Additional styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #fff;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #333;
        }
        img {
            max-width: 50px;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
@include('navbar')
<h1>Ammo Items</h1>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Icon</th>
        </tr>
    </thead>
    <tbody>
        {{-- Display ammo items sorted alphabetically --}}
        @foreach($ammoItems as $ammo)
            <tr>
                <td>{{ $ammo['name'] }}</td>
                <td><img src="{{ $ammo['iconLink'] }}" alt="{{ $ammo['name'] }}"></td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
