<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/images/favicon-32x32.png" type="image/x-icon">
    <title>Tarkov - tasks</title>
    <link rel="stylesheet" href="/app.css">
</head>
<body>
    @include('navbar')
    <h1>Escape from Tarkov tasks</h1>
    <div id="searchBar">
        <input type="text" id="searchInput" placeholder="Search item...">
        <button onclick="filterItems()">Search</button>
    </div>
   
    <table id="itemsTable">
        <thead>
            <tr>
                <th onclick="sortTable(0)">Task</th>
                <th onclick="sortTable(1)">Minimum level</th>
                <th onclick="sortTable(2)">kappaRequired</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $item)
                <tr class="itemRow">
                    <td>
                        <img src="{{ $item['trader']['imageLink'] ?? '/images/default.png' }}" alt="{{ $item['trader']['name'] ?? 'N/A' }}">
                        {{ $item['name'] }}
                    </td>
                    <td>{{ $item['minPlayerLevel'] ?? 'N/A' }}</td>
                    <td>
                        @if($item['kappaRequired'] == 1)
                            Kappa Required
                        @else
                            {{ $item['kappaRequired'] ?? 'N/A' }}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function filterItems() {
            var input, filter, table, tr, td, i, j, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("itemsTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                let found = false;
                for (j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            found = true;
                            break; // Stop checking other columns if found in one
                        }
                    }
                }
                tr[i].style.display = found ? "" : "none";
            }
            
            // Parāda tabulas galvenes rindu atkārtoti pēc meklēšanas
            var tableHead = document.getElementById("tableHead");
            tableHead.style.display = "";
        }


    </script>
</body>
</html>
