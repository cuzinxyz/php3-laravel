@extends('layout.app')

@section('content')

    <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-md mb-4" type="button" onclick="window.location.href='/add'">Add Student</button>

    <form class="pb-3" action="{{ route('search') }}" method="POST">
        <div class="flex justify-between mb-4">
            <input type="text" id="search" name="search" placeholder="Search" class="border border-gray-400 rounded-md px-4 py-2 w-full md:w-1/3 bg-gray-800 text-white">
        </div>

        @csrf
    </form>

    <table class="min-w-full bg-gray-800 border border-gray-200">
        <thead>
        <tr>
            <th class="px-6 py-3 border-b border-gray-700 font-semibold text-white">ID</th>
            <th class="px-6 py-3 border-b border-gray-700 font-semibold text-white">Name</th>
            <th class="px-6 py-3 border-b border-gray-700 font-semibold text-white">Class</th>
            <th class="px-6 py-3 border-b border-gray-700 font-semibold text-white">Birthday</th>
            <th class="px-6 py-3 border-b border-gray-700 font-semibold text-white">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td class="px-6 py-4 border-b border-gray-700 text-white">{{ $student->id }}</td>
                <td class="px-6 py-4 border-b border-gray-700 text-white">{{ $student->name }}</td>
                <td class="px-6 py-4 border-b border-gray-700 text-white">{{ $student->class }}</td>
                <td class="px-6 py-4 border-b border-gray-700 text-white">{{ $student->birthday }}</td>
                <td class="px-6 py-4 border-b border-gray-700 text-white">
                    <form action="{{ route('student.delete', $student->id) }}" method="POST">
                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-md mr-2" type="button" onclick="window.location.href='{{ route('student.edit', $student->id) }}'">Edit</button>

                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded-md" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        <!-- More rows go here -->
        </tbody>
    </table>

@endsection
