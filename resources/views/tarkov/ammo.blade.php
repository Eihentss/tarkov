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
            text-align: center;
            max-width: 100px;
            height: 50px; /* Set a fixed height for all table rows */
        }
        th {
            max-width: 50px;
            background-color: #333;
        }
        img {
            max-width: 50px;
            float:left;
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
<!-- Ievietojiet šo kodu tajā pašā failā pēc tabulu cikla, lai pievienotu searchbar -->

<form method="GET">
    <label for="search">Search ammo:</label>
    <input type="text" id="search" name="search">
    <input type="submit" value="Search">
</form>

<?php
// Filtrējam ammos pēc lietotāja ievadītās vērtības
$searchTerm = isset($_GET['search']) ? strtoupper($_GET['search']) : '';
$filteredItems = [];
if (!empty($searchTerm)) {
    foreach ($ammoItems as $ammo) {
        $itemName = strtoupper($ammo['name']);
        if (strpos($itemName, $searchTerm) !== false) {
            $filteredItems[] = $ammo;
        }
    }
} else {
    $filteredItems = $ammoItems; // Ja nav ievadīta meklēšanas vērtība, parādīt visus ammos
}

$groupedItems = [];
foreach ($filteredItems as $ammo) {
    // Attēlojam tikai filtrētos ammos
    $firstChar = strtoupper(substr($ammo['name'], 0, 4)); // Get the first character and convert to uppercase
    $groupedItems[$firstChar][] = $ammo;
}
?>

@foreach ($groupedItems as $firstChar => $items)
    <h2>{{ $firstChar }}</h2>
    <table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Caliber</th>
            <th>Damage</th>
            <th>Penetration</th>
            <th>Armor Damage</th>
            <th>Fragmentation Chance</th>
            <th>Cheapest Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $ammo)
            <tr>
                <td>
                <img src="{{ $ammo['iconLink'] }}" alt="{{ $ammo['name'] }}">
                {{ $ammo['name'] }}</td>
                <td>{{ $ammo['properties']['caliber'] ?? 'N/A' }}</td>
                <td>{{ $ammo['properties']['damage'] ?? 'N/A' }}</td>
                <td>{{ $ammo['properties']['penetrationPower'] ?? 'N/A' }}</td>
                <td>{{ $ammo['properties']['armorDamage'] ?? 'N/A' }}</td>
                <td>{{ $ammo['properties']['fragmentationChance'] ?? 'N/A' }}</td>
                <td>{{ $ammo['basePrice'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endforeach