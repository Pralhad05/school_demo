<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>student Data</title>
    <link rel="shortcut icon" href="./css/Designer.png" type="image/x-icon">
</head>

<body class="bg-gray-100">

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
                                Home
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

            <div class="container mx-auto px-4 py-12">
                <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
                    <?php
                    include 'db.php';

                    $id = $_GET['id'];
                    $query = "SELECT student.*, classes.name AS class_name FROM student
                JOIN classes ON student.class_id = classes.class_id
                WHERE student.id = $id";
                    $result = mysqli_query($conn, $query);
                    $student = mysqli_fetch_assoc($result);
                    ?>

                    <div class="p-6">
                        <h2 class="text-3xl font-bold text-gray-800 mb-4"><?= htmlspecialchars($student['name']); ?></h2>
                        <p class="text-lg text-gray-600 mb-2"><span class="font-semibold">Email:</span> <?= htmlspecialchars($student['email']); ?></p>
                        <p class="text-lg text-gray-600 mb-2"><span class="font-semibold">Address:</span> <?= htmlspecialchars($student['address']); ?></p>
                        <p class="text-lg text-gray-600 mb-2"><span class="font-semibold">Class:</span> <?= htmlspecialchars($student['class_name']); ?></p>
                        <p class="text-lg text-gray-600 mb-4"><span class="font-semibold">Created At:</span> <?= htmlspecialchars($student['created_at']); ?></p>
                        <img src="uploads/<?= htmlspecialchars($student['image']); ?>" alt="Student Image" class="w-full h-auto rounded-lg shadow-md">
                    </div>
                </div>
                <button
                    onclick="window.location.href='index.php'"
                    type="button"
                    class="inline-flex items-center rounded-md bg-black px-3 py-2 text-sm font-semibold text-white hover:bg-black/80">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="mr-2 h-4 w-4">
                        <line x1="19" y1="12" x2="5" y2="12"></line>
                        <polyline points="12 19 5 12 12 5"></polyline>
                    </svg>
                    Back
                </button>
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