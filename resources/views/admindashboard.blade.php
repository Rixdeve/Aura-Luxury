<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../public/css/app.css" rel="stylesheet">
    <title>Admin Dashboard</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="bg-gray-100 flex">

    <div class="w-64 min-h-screen bg-indigo-500 text-white p-6 fixed">
        <div class="text-center">
            <img src="../../public/images/logo-remove.png" alt="Aura Logo" class="h-16 mx-auto mb-6">
        </div>
        <ul>
            <li class="mb-2"><a href="../Pages/admindash.php"
                    class="text-red-600 font-bold text-lg hover:underline">Dashboard</a></li>
            <li class="mb-2"><a href="../Pages/sales.php" class="text-lg hover:underline">Sales</a></li>
            <li class="mb-2"><a href="../Pages/manageproduct.php" class="text-lg hover:underline">Manage Products</a>
            </li>
            <li class="mb-2"><a href="../Pages/customers.php" class="text-lg hover:underline">Customers</a></li>
            <li class="mb-2"><a href="../Pages/products.php" class="text-lg hover:underline">View Products</a></li>
            <li class="mb-2"><a href="../Pages/addprod.php" class="text-lg hover:underline">Add Products</a></li>
            <li class="mb-2"><a href="../Pages/pendingor.php" class="text-lg hover:underline">Pending Orders</a></li>
            <li class="mb-2"><a href="../Pages/admincont.php" class="text-lg hover:underline">Messages</a></li>

        </ul>
    </div>

    <div class="absolute top-6 right-6">
        <form method="POST">
            <button type="submit" name="logout"
                class="px-4 py-2 bg-white text-red-500 border border-red-500 rounded-md shadow-md hover:bg-red-500 hover:text-white transition">
                Logout
            </button>
        </form>
    </div>

    <div class=" bg-cover ml-68 flex items-center justify-center w-full h-screen"
        style="background-image: url('../../public/images/background.png');">

        <div class="grid grid-cols-2 gap-8 ml-60">
            <a href="./sales.php">
                <button type="button"
                    class="w-64 px-6 py-4 bg-white text-black font-semibold border border-black rounded-lg shadow-md hover:bg-gray-200 transition">
                    Sales
                </button>
            </a>

            <a href="./customers.php">
                <button type="button"
                    class="w-64 px-6 py-4 bg-white text-black font-semibold border border-black rounded-lg shadow-md hover:bg-gray-200 transition">
                    Customers
                </button>
            </a>

            <a href="./manageproduct.php">
                <button type="button"
                    class="w-64 px-6 py-4 bg-white text-black font-semibold border border-black rounded-lg shadow-md hover:bg-gray-200 transition">
                    Manage Products
                </button>
            </a>

            <a href="./pendingor.php">
                <button type="button"
                    class="w-64 px-6 py-4 bg-white text-black font-semibold border border-black rounded-lg shadow-md hover:bg-gray-200 transition">
                    Pending Orders
                </button>
            </a>

        </div>
    </div>

</body>

</html>