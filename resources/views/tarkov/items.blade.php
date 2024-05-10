    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tarkov - Items</title>
        <link rel="shortcut icon" href="/images/favicon-32x32.png" type="image/x-icon">
        <link rel="stylesheet" href="/items.css">
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
                    <th>Name</th>
                    <th>weight</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr class="itemRow">
                    <td>
                    <img src="{{ $item['iconLink'] }}" alt="{{ $item['name'] }}">
                    {{ $item['name'] }}</td>
    
                        <td>{{ $item['weight'] }}</td>
                        <td>{{ $item['basePrice'] }}$</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <script>
        // Filtrēšanas funkcija
        function filterItems() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("itemsTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0]; // Pirmā kolonna (Name)
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

        // Rēķina un iestata kopējo priekšmetu skaitu
        document.addEventListener("DOMContentLoaded", function() {
            var totalItems = document.querySelectorAll(".itemRow").length;
            document.getElementById("totalItemsCount").textContent = totalItems;
        });
    </script>
    </body>
    </html>
