<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    @vite('resources/css/app.css')

    <style>
        html {
            font-family: 'figtree';
        }
    </style>
</head>
<body class="dark:bg-gray-900 antialiased">

    <nav class="bg-gray-800">
        <div class="container mx-auto py-4 px-8 flex justify-between items-center text-white">
            <h1 class="text-2xl font-bold">Student Management System</h1>
            <ul class="flex space-x-4">
                <li><a href="{{ route('student.index') }}" class="hover:text-gray-300">Home</a></li>
                <li><a href="{{ route('student.index') }}" class="hover:text-gray-300">Students</a></li>
                <li><a href="{{ route('student.add') }}" class="hover:text-gray-300">Add Student</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto py-5">
        @yield('content')
    </div>


    <footer class="bg-gray-800 text-gray-300 py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2023 Student Management System. All rights reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>
