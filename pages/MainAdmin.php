<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Title</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="./Stylesheet/output.css" rel="stylesheet">
    <link href="connention-database/connection.php" rel="connet">
</head>

<body id="BG" class="bg-gray-900    ">

    <div class="absolute inset-x-0 top-0 h-16 bg-slate-900 bg-cover bg-center flex items-center justify-center h-24 blur-sm"
         style="background-image:url('../background/th-472623622.jpg');">

        <ul class="flex items-center justify-start w-full pl-4">
            <li><a class="bg-black py-2 px-4 text-white rounded-md hover:bg-blue-950 ml-2" href="../index.php">go back to login</a></li>
            <li><a class="bg-black py-2 px-4 text-white rounded-md hover:bg-blue-950 ml-2" href="../pages/vieuwAdmin.php">vieuw admin page</a></li>
            <li><a class="bg-black py-2 px-4 text-white rounded-md hover:bg-blue-950 ml-2" href="../pages/MainAdmin.php"> Add user(s) page</a></li>
        </ul>
    </div>


<div id="magic" class= "flex justify-center items-center h-screen mt-8">
    <form method="POST" action="../plain-php/AddAdmin.php" class="w-full lg:w-1/4 md:w-1/4 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-center text-xl mb-4 font-bold">Add user</h2>

        <div class="mt-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
            <input type="email" id="email" name="email" required
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class=" mt-4">

            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
            <input type="text" id="name" name="name" required
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class=" mt-4 mb-5">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">password:</label>
            <input type="text" id="name" name="password" required
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="p-6 mb-8 rounded-lg shadow-md bg-slate-100  ">
        <label class="font-bold" for="role">Role:</label>
        <select id="role" name="role_id" required>
            <option value="1">User</option>
            <option value="2">Admin</option>
        </select>
       </div>

        <input type="hidden" id="id" name="id" class="hidden">

        <div class="flex items-center justify-between mt-2">
            <input type="submit" id="Add" value="Add"
                   class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </div>
    </form>
</div>

</body>

</html>
