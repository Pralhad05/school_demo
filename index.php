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
                                href="./index.php"
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
                        onclick="window.location.href='index.php'"
                        type="button"
                        class="rounded-md bg-black px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-black/80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                        View
                    </button>
                </div>
            </div>
        </header>
        <div>
        

            <div class="container mx-auto py-10">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                        <thead>
                            <tr class="w-full bg-gray-100 text-gray-600">
                                <th class="py-3 px-4 border-b border-gray-200 text-left">Image</th>
                                <th class="py-3 px-4 border-b border-gray-200 text-left">Name</th>
                                <th class="py-3 px-4 border-b border-gray-200 text-left">Email</th>
                                <th class="py-3 px-4 border-b border-gray-200 text-left">Class</th>
                                <th class="py-3 px-4 border-b border-gray-200 text-left">Created At</th>
                                <th class="py-3 px-4 border-b border-gray-200 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'db.php';

                            $query = "SELECT student.*, classes.name AS class_name FROM student
                              JOIN classes ON student.class_id = classes.class_id";
                            $result = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="py-4 px-4 border-b border-gray-200">
                                        <img src="uploads/<?= $row['image']; ?>" alt="Student Image" class="w-16 h-16 object-cover rounded-full">
                                    </td>
                                    <td class="py-4 px-4 border-b border-gray-200"><?= $row['name']; ?></td>
                                    <td class="py-4 px-4 border-b border-gray-200"><?= $row['email']; ?></td>
                                    <td class="py-4 px-4 border-b border-gray-200"><?= $row['class_name']; ?></td>
                                    <td class="py-4 px-4 border-b border-gray-200"><?= $row['created_at']; ?></td>
                                    <td class="py-4 px-4 border-b border-gray-200">
                                        <a href="view.php?id=<?= $row['id']; ?>" class="text-blue-600 hover:text-blue-800">View</a> |
                                        <a href="edit.php?id=<?= $row['id']; ?>" class="text-yellow-600 hover:text-yellow-800">Edit</a> |
                                        <a href="delete.php?id=<?= $row['id']; ?>" class="text-red-600 hover:text-red-800">Delete</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
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