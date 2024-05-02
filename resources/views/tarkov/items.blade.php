<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarkov - Items</title>
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
        #searchBar {
            text-align: center;
            margin-bottom: 20px; /* Papildus atstarpe zem meklēšanas */
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
    <table id="itemsTable">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Wiki</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr class="itemRow">
                    <td><img src="{{ $item['iconLink'] }}" alt="{{ $item['name'] }}"></td>
                    <td>{{ $item['name'] }}</td>
                    <td><a href="{{ $item['wikiLink'] }}">Wiki</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function filterItems() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("itemsTable");
            tr = table.getElementsByClassName("itemRow");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1]; // Pirmā kolonna (Name)
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>
