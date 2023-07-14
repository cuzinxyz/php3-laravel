@extends('layout.app')

@section('content')

{{--    @if ($errors->any())--}}
{{--        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-3">--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}

    @include('layout.errors')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4 text-slate-50">Add Student</h1>
        <form method="POST" action="{{ route('student.store') }}">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold text-slate-300">Name:</label>
                <input type="text" id="name" name="name" class="border border-gray-400 rounded-md px-4 py-2 w-full">
            </div>
            <div class="mb-4">
                <label for="birthday" class="block text-gray-700 font-semibold text-slate-300">Birthday:</label>
                <input type="date" id="birthday" name="birthday" class="border border-gray-400 rounded-md px-4 py-2 w-full">
            </div>
            <div class="mb-4">
                <label for="class" class="block text-gray-700 font-semibold text-slate-300">Class:</label>
                <input type="text" id="class" name="class" class="border border-gray-400 rounded-md px-4 py-2 w-full">
            </div>
            @csrf
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-md">Add Student</button>
        </form>
    </div>

@endsection
