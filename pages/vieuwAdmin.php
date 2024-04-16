<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Inventory</title>

    <!--    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">-->
    <link href="/Digidate/Stylesheet/output.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body id="BG" class="bg-slate-900">
<?php
include '../connention-database/connection.php';

$sql = "SELECT * FROM users";


$result = $conn->query($sql);


include '../pages/header.php';

?>

<div class="container mx-auto bg-slate-900 font-bold rounded-full ">
    <div class="p-6 rounded-lg shadow-md bg-slate-600 text-white mt-4">

        <table class="table w-full" id="scroll">
            <thead>
            <div class="p-6 rounded-lg shadow-md bg-purple-900 mt-4 border-black py-6"
                style="background-image:url('../background/th-472623622.jpg');">


                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Action</th>
                </tr>

            </div>

            </thead>
            <div>
                <?php
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    //      var_dump($row);  ?>

                    <tr>
                        <td class="px-4 py-2"><?php echo $row['name']; ?></td>
                        <td class="px-4 py-2"><?php echo $row['email']; ?></td>
                        <td class="px-4 py-2">
                            <form action="../plain-php/DeleteAdmin.php" class="flex justify-center" method="post">

                                <?php $row['id']; ?>

                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <!--                    <td><input type="hidden">-->
                                <?php //echo $row['password']; ?><!--</td>-->
                                <div class="w-full rounded-lg shadow-md bg-slate-900 text-white border-black">
                                    <button type="submit"
                                            class="bg-slate-700 hover:bg-slate-800 w-full text-white p-2 rounded-lg drop-shadow-xl">
                                        Delete
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>

                    </tr>
                    <?php
                }
                ?>
            </div>

            </tbody>
        </table>


    </div>
</body>

</html>
