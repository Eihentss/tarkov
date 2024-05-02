<!-- resources/views/tarkov/ammo.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarkov - Ammo</title>
    <style>
        body {
            background-color: #000; /* Melns fons */
            color: #fff; /* Baltais teksts */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        /* Papildus stili */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px; /* Papildus atstarpe virs tabulas */
        }
        th, td {
            border: 1px solid #fff; /* Baltas rāmīši */
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #333; /* Tumši pelēks fons virsrakstiem */
        }
        img {
            max-width: 50px;
        }
        h1 {
            text-align: center;
            margin-top: 20px; /* Papildus atstarpe virs virsraksta */
        }
    </style>
</head>
<body>
@include('navbar')
    <h1>Ammo Items</h1>
    <table>
        <thead>
            <tr>
            <th>Icon</th>
                <th>Name</th>


            </tr>
        </thead>
        <tbody>
            @foreach($ammoItems as $ammo)
                <tr>
                <td><img src="{{ $ammo['iconLink'] }}" alt="{{ $ammo['name'] }}"></td>
                    <td>{{ $ammo['name'] }}</td>


                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
