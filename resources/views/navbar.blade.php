<!-- navbar.blade.php -->

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

    .navbar a:hover {
        background-color: #ddd; /* Pelēks fons pār elementu virsūm */
        color: black;
    }

    /* Clear floats pēc navbar */
    .navbar::after {
        content: "";
        clear: both;
        display: table;
    }
</style>

<div class="navbar">
    <a href="/">Home</a>
    <a href="/tarkov/ammo">Ammo</a>
    <a href="/tarkov/task">Tasks</a>
    <a href="/items">Items</a>
    <!-- Pievieno vēl citas saites pēc nepieciešamības -->
</div>
