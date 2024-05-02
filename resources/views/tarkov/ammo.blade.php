<!-- resources/views/tarkov/ammo.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarkov - Ammo</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
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

                <th>Damage</th>
                <th>Penetration</th>
                <th>Armor damage</th>
                <th>Fragmentation chance</th>
                <th>Cheapest Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ammoItems as $ammo)
                <tr>
                <td>{{ $ammo['name'] }}</td>


                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
