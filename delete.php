<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>student Data</title>
    <link rel="shortcut icon" href="./css/Designer.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                                href="./create.php"
                                class="text-sm font-semibold text-gray-800 hover:text-white hover:bg-violet-600 active:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-300">
                                New Student
                            </a>
                        </li>
                        <li>
                            <a
                                href="./view.php"
                                class="text-sm font-semibold text-gray-800 hover:text-white hover:bg-violet-600 active:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-300">
                                View
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
                        type="button"
                        class="rounded-md bg-black px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-black/80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                        <a href="./view1.php" target="_self" rel="noopener noreferrer">View</a>
                    </button>
                </div>
            </div>
        </header>
        
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <?php
                            include 'db.php';

                            $id = $_GET['id'];

                            // Fetch the student image to delete it from the server
                            $query = "SELECT image FROM student WHERE id = $id";
                            $result = mysqli_query($conn, $query);
                            $student = mysqli_fetch_assoc($result);
                            $image = $student['image'];

                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                // Delete the student from the database
                                $delete_query = "DELETE FROM student WHERE id = $id";
                                mysqli_query($conn, $delete_query);

                                // Delete the image from the server
                                unlink("uploads/$image");

                                header('Location: index.php');
                            }

                            ?>

                            <h5 class="card-title mb-4">Confirm Deletion</h5>
                            <p class="card-text mb-4">Are you sure you want to delete this student?</p>
                            <form method="POST">
                                <button type="submit" class="btn btn-danger me-2">Yes, Delete</button>
                                <a href="index.php" class="btn btn-secondary">No, Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
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