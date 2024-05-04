<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <style>
        /* CSS stili navbar elementiem */
        .navbar {
            overflow: hidden;
            background-color: #222; /* Tumši pelēks fons */
            font-family: Arial, sans-serif;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px; /* Augšējais un apakšējais padding */
            text-decoration: none;
            font-size: 17px;
        }

        .navbar img {
            float: left;
            padding: 2px 16px;
            max-width: 100px;
            height: 25px;
        }
        .navbar img:hover, .navbar a:hover {
            background-color: #555; /* Tumšāks pelēks fons pār elementu virsūm */
            color: white;
        }

        /* Clear floats pēc navbar */
        .navbar::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
</head>
<body>
    <div class="navbar">
    <a href="/">
    <img src="{{ asset('images/tarkov-dev-logo.png') }}" alt="Logo">
</a>

        <a href="/tarkov/ammo">Ammo</a>
        <a href="/tarkov/task">Tasks</a>
        <a href="/items">Items</a>
    </div>
    <!-- Šeit var ievietot pārējo lapas saturu -->
</body>
</html>
