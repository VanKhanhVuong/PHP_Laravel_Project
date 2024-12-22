@extends('layouts.layout')

@section('content')

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg flex items-center space-x-8">
            <!-- Hiển thị ảnh -->
            @if($food->image_path)
                <img src="{{ asset('images/' . $food->image_path) }}" 
                     alt="{{ $food->name }}" 
                     class="w-48 h-48 object-cover rounded-md">
            @endif

            <!-- Hiển thị thông tin -->
            <div class="text-black-500 space-y-4">
                <h1 class="text-4xl font-bold italic">
                    Food with ID: {{ $food->id }}
                </h1>
                <h2 class="text-xl"><strong>Name:</strong> {{ $food->name }}</h2>
                <h2 class="text-xl"><strong>Count:</strong> {{ $food->count }}</h2>
                <h2 class="text-xl"><strong>Description:</strong> {{ $food->description }}</h2>
                <h2 class="text-xl"><strong>Category:</strong> {{ $food->category->name }}</h2>
            </div>
        </div>
    </div>

@endsection
