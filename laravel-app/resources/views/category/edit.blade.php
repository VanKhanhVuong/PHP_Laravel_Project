@extends('layouts.layout')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <form action='/category/{{ $category-> id }}' method='post' 
            class="bg-white p-6 rounded-lg shadow-md mx-auto max-w-md w-full">
            @csrf
            @method('PUT')
            <h1 class="text-2xl font-bold text-center text-black-500 italic mb-6">
                Edit Category Page
            </h1>
            <div class="flex flex-col space-y-4">
                
                <div>
                    <input
                        type="text"
                        name="name"
                        value="{{ $category->name }}"
                        class="form-control w-full px-3 py-2 text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Please enter Category Name !"
                    />
                </div>
                <div>
                    <input
                        type="text"
                        name="description"
                        value="{{ $category->description }}"
                        class="form-control w-full px-3 py-2 text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Please enter Category Description !"
                    />
                </div>
                <button type="submit"
                        class="w-full px-4 py-2 bg-blue-500 text-white font-bold rounded-lg hover:bg-blue-600 transition">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
