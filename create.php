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
                        <a href="./index.php" target="_self" rel="noopener noreferrer">View</a>
                    </button>
                </div>
            </div>
        </header>
        <div>
            <div class="flex flex-col space-y-8 pb-10 pt-12  md:pt-24">
                <!-- php script  -->
                <?php

                //db connect
                include 'db.php';

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $class_id = $_POST['class_id'];

                    // Handle file upload
                    $image = $_FILES['image']['name'];
                    $target = "uploads/" . basename($image);

                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                        // Insert into database
                        $query = "INSERT INTO student (name, email, address, class_id, image) 
                                  VALUES ('$name', '$email', '$address', '$class_id', '$image')";
                        mysqli_query($conn, $query);
                        header('Location: index.php');
                    } else {
                        echo "Failed to upload image.";
                    }
                }


                $class_query = "SELECT * FROM classes";
                $class_result = mysqli_query($conn, $class_query);
                ?>
                <!-- End PHP script  -->


                <!-- student form -->
                <div class="box-content px-10 py-10">

                    <form method="POST" enctype="multipart/form-data">
                        <div class="space-y-12">
                            <h1>New Student</h1>
                        </div>
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">

                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Full
                                            Name</label>
                                        <div class="mt-2">
                                            <input type="text" name="name" id="first-name" autocomplete="given-name"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-4">
                                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                                            address</label>
                                        <div class="mt-2">
                                            <input id="email" name="email" type="email" autocomplete="email"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>

                                    <div class="col-span-full">
                                        <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Street
                                            address</label>
                                        <div class="mt-2">
                                            <input type="text" name="address" id="street-address" autocomplete="street-address"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                    <div class="col-span-full">
                                        <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Select Class</label>
                                        <div class="mt-2">
                                            <select name="class_id">
                                                <?php while ($row = mysqli_fetch_assoc($class_result)): ?>
                                                    <option value="<?= $row['class_id']; ?>"><?= $row['name']; ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-full">
                                    <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Upload
                                        photo</label>
                                    <div
                                        class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                        <div class="text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                                <label for="file-upload"
                                                    class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                    <span>Upload a file</span>
                                                    <input type="file" name="image" accept="image/jpeg, image/png" required>
                                                </label>
                                                <p class="pl-1">or drag and drop</p>
                                            </div>
                                            <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-6 flex items-center justify-end gap-x-6">
                                    <button type="button" onclick="window.location.href = 'index.php'" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                                    <button type="submit"
                                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                                </div>
                            </div>

                        </div>

                    </form>
                    <!-- END form  -->
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