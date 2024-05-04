<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarkov - tasks</title>
    <style>
        /* Fona stili */
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
            margin-top: 20px; /* Papildus atstarpe virs virsraksta */
        }
        #searchBar {
            text-align: center;
            margin-bottom: 20px; /* Papildus atstarpe zem meklēšanas */
        }
        #itemCount {
            text-align: right;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
@include('navbar')
    <h1>Escape from Tarkov Items</h1>
    <div id="searchBar">
        <input type="text" id="searchInput" placeholder="Search item...">
        <button onclick="filterItems()">Search</button>
    </div>
    <div id="itemCount">Total Items: <span id="totalItemsCount"></span></div>
    <table id="itemsTable">
    <thead>
        <tr>
            <th>Task</th>
            <th>Required tasks</th>
            <th>Minimum level</th>
            <th>Reputation rewards</th>
            <th>Endgame</th>
            <th>Task Requirements</th>
            <th>Task Requirement Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $item)
            <tr class="itemRow">
                <td>
                    <img src="{{ $item['trader']['imageLink'] ?? 'N/A' }}" alt="{{ $item['trader']['name'] ?? 'N/A' }}">
                    {{ $item['name'] }}
                </td>
                <td>{{ $item['taskRequirements']['task']['name'] ?? 'N/A' }}</td>
                <td>{{ $item['taskRequirements']['status'] ?? 'N/A' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
