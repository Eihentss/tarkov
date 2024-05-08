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
