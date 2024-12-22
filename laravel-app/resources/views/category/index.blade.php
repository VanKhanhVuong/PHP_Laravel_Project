@extends('layouts.layout')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-4xl font-bold text-black-500 italic">
            Category List
        </h1>
        <a href="category/create"
           class="px-4 py-2 bg-blue-500 text-white font-bold rounded-lg shadow-md hover:bg-blue-600 transition">
            Add new category
        </a>
    </div>

    <div class="space-y-6">
        @foreach ($categories as $item)
            <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">{{ $item->name }}</h2>
                <p class="text-gray-600"><strong>Description:</strong> {{ $item->description }}</p>

                <div class="flex items-center justify-between mt-4">
                    <!-- Edit Button --> 
                    <a href="category/{{ $item->id }}/edit"
                       class="px-4 py-2 bg-yellow-500 text-white font-bold rounded-lg shadow-md hover:bg-yellow-600 transition">
                        Edit
                    </a>

                    <!-- Delete Button -->
                    <form action="category/{{ $item->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-4 py-2 bg-red-500 text-white font-bold rounded-lg shadow-md hover:bg-red-600 transition">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
