@extends('layouts.layout')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-4xl font-bold text-black-500 italic">
            Food List
        </h1>
        <a href="food/create"
           class="px-4 py-2 bg-blue-500 text-white font-bold rounded-lg shadow-md hover:bg-blue-600 transition">
            Add new food
        </a>
    </div>

    <div class="space-y-6">
        @foreach ($foods as $item)
        <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200 flex items-center space-x-6">
            <!-- Hiển thị ảnh -->
            @if($item->image_path)
                <img src="{{ asset('images/' . $item->image_path) }}" 
                     alt="{{ $item->name }}" 
                     class="w-24 h-24 object-cover rounded-md">
            @endif
        
            <!-- Nội dung -->
            <div class="flex-1">
                <h2 class="text-xl font-semibold text-gray-800">{{ $item->name }}</h2>
                <p class="text-gray-600"><strong>Count:</strong> {{ $item->count }}</p>
                <p class="text-gray-600"><strong>Description:</strong> {{ $item->description }}</p>
            </div>
        
            <!-- Hành động -->
            <div class="flex space-x-4">
                <!-- Edit Button --> 
                <a href="food/{{ $item->id }}/edit"
                   class="px-4 py-2 bg-yellow-500 text-white font-bold rounded-lg shadow-md hover:bg-yellow-600 transition">
                    Edit
                </a>
        
                <!-- Show Details Button --> 
                <a href="food/{{ $item->id }}"
                   class="px-4 py-2 bg-blue-500 text-white font-bold rounded-lg shadow-md hover:bg-blue-600 transition">
                    Show
                </a>
        
                <!-- Delete Button -->
                <form action="food/{{ $item->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?')">
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
