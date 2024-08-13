<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>student Data</title>
    <link rel="shortcut icon" href="./css/Designer.png" type="image/x-icon">
</head>

<body>

    <div class="mx-auto max-w-12xl px-2 mt-1 bg-white">
        <header class="relative w-full border-b  pb-4 bg-stone-200">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-2">
                <div class="inline-flex items-center space-x-2">
                    <span>
                        <img src="./css/Designer.png" alt="_blank" width="30"
                            height="30"
                            viewBox="0 0 50 56">
                    </span>
                    <span class="font-bold">Pralhad05</span>
                </div>
                <div class="hidden lg:block">
                    <ul class="inline-flex space-x-8">
                        <li>
                            <a
                                href="./index.php"
                                class="text-sm font-semibold text-gray-800 hover:text-white hover:bg-violet-600 active:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-300">
                                Home
                            </a>
                        </li>
                        <li>
                            <a
                                href="./create.php"
                                class="text-sm font-semibold text-gray-800 hover:text-white hover:bg-violet-600 active:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-300">
                                New Student
                            </a>
                        </li>

                        <li>
                            <a
                                href="./classes.php"
                                class="text-sm font-semibold text-gray-800 hover:text-white hover:bg-violet-600 active:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-300">
                                Add Class
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="hidden lg:block">
                    <button
                        onclick="window.location.href = 'index.php'"
                        type="button"
                        class="rounded-md bg-black px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-black/80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                        View
                    </button>
                </div>
            </div>
        </header>
        <div>
            <div class="flex flex-col space-y-8 pb-10 pt-12 text-center md:pt-24">
                <!-- php script  -->
                <?php
                include 'db.php';

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $name = $_POST['name'];
                    $query = "INSERT INTO classes (name) VALUES ('$name')";
                    mysqli_query($conn, $query);
                }

                // Fetch classes
                $class_query = "SELECT * FROM classes";
                $class_result = mysqli_query($conn, $class_query);

                //Delete Qurey

                if (isset($_GET['delete_id'])) {
                    $class_id = $_GET['delete_id'];


                    if (is_numeric($class_id)) {

                        $query = "DELETE FROM classes WHERE class_id = $class_id";


                        if (mysqli_query($conn, $query)) {

                            header("Location: " . $_SERVER['PHP_SELF']);
                            exit;
                        } else {
                            echo "Error deleting record: " . mysqli_error($conn);
                        }
                    } else {
                        echo "Invalid class ID.";
                    }
                }
                ?>

                <!-- Manage Classes start  -->
                <h2>Manage Classes</h2>

                <div class=" space-x-2  px-5 py-5">
                    <form method="POST">
                        <input
                            class="flex h-10 w-full rounded-md border border-black/30 bg-transparent px-3 py-2 text-sm placeholder:text-gray-600 focus:outline-none focus:ring-1 focus:ring-black/30 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 mb-3"
                            type="text" name="name" placeholder="Class Name" />
                        <button
                            type="submit"
                            class="rounded-md bg-black px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-black/80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                            Add
                        </button>
                    </form>

                </div>

                <!-- END form  -->

                <!-- Class data  -->
                <ul class="list-disc list-inside space-y-4 bg-white rounded-lg shadow-md p-6">
                    <li class="flex justify-between items-center text-gray-800">
                        <span class="font-medium">
                            <h2>Class Name</h2>
                        </span>
                        <span class="space-x-4">
                            Actions
                        </span>
                    </li>
                    <hr class="mt-6" />
                    <?php while ($row = mysqli_fetch_assoc($class_result)): ?>
                        <li class="flex justify-between items-center text-gray-800">
                            <span class="font-medium">
                                <?= $row['name']; ?>
                            </span>
                            <span class="space-x-4">
                                <a href="classes.php?delete_id=<?= $row['class_id']; ?>"
                                    onclick="return confirm('Are you sure you want to delete this class?');"
                                    class="text-red-600 hover:text-red-800">Delete</a>
                            </span>

                        </li>
                    <?php endwhile; ?>
                </ul>

                <!-- End Class data  -->

            </div>
        </div>
        <hr class="mt-6" />
        <div class="mx-auto max-w-7xl">
            <footer class="px-4 py-10 bg-stone-100">
                <div class="flex flex-col md:flex-row md:items-center">
                    <div class="mt-4 grow md:ml-12 md:mt-0">
                        <p class="text-base font-semibold text-gray-700">
                            © 2024 Gaikwad Pralhad
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

</body>

</html>