<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DigiDate</title>
    <link rel="icon" type="image/x-icon" href="images/profile.jpg">
    <link href="./Stylesheet/output.css" rel="stylesheet">
    <link href="connention-database/connection.php" rel="connet">
    <?php
    include 'connention-database/connection.php';

//   echo phpinfo();
     session_start();
    $page = $_GET['page'] ?? 'home';

    // Define an array of pages that require authentication
    $auth_pages = array('categorieën', 'product', 'prod_add', 'prod_edit',);

    if (in_array($page, $auth_pages) && !isset($_SESSION['id'])) {
        // Redirect to login page if user is not logged in and trying to access an authenticated page
        header('location: ?page=login');
        exit;
    }
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Tailwind CSS -->
<!--    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">-->
</head>
<body id="BG" class="bg-slate-700  flex items-center justify-center min-h-screen">

<div class="bg-slate-500 p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Login</h2>
    <div id="login-form">
        <div class="gallery">
            <a target="_blank" href="images/profile.jpg">
                <img src="images/profile.jpg" alt="Profile Image" class="w-16 h-16 rounded-full">
            </a>
            <form action="auth/auth.php" method="post" class="">

                <div class="p-6 rounded-lg shadow-md bg-slate-600  mt-4">
                    <label>
                        <input class="rounded-lg h-10 w-full p-2" type="email" id="email" name="email" autofocus="autofocus" placeholder="Email@gmail.com" required>
                    </label>
                    <label>
                        <input class="rounded-lg h-10 w-full p-2 mt-2" type="password" id="password" name="password" placeholder="Password" required>
                    </label>
                </div>

                <input type="submit" id="login" value="Login" class="mt-4 bg-slate-900 text-white px-4 py-2 rounded hover:bg-blue-600">
                <div class="p-6 rounded-lg shadow-md bg-slate-600  mt-4">
                    <div id="create-account-wrap" class="md:before:content mt-4 font-bold">
                        <p>Not a member --> <a href="pages/register.php">Create Account</a></p>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
</body>
</html>
