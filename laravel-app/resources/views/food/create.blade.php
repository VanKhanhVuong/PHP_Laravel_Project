@extends('layouts.layout')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <form action='/food' method='post'
            enctype="multipart/form-data"
            class="bg-white p-6 rounded-lg shadow-md mx-auto max-w-md w-full">
            @csrf
            <h1 class="text-2xl font-bold text-center text-black-500 italic mb-6">
                Create a new Food
            </h1>
            <div class="flex flex-col space-y-4">
                <div>
                    <input
                        type="text"
                        name="name"
                        class="form-control w-full px-3 py-2 text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Please enter Food Name !"
                    />
                </div>
                <div>
                    <input
                        type="text"
                        name="description"
                        class="form-control w-full px-3 py-2 text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Please enter Food Description !"
                    />
                </div>
                <div>
                    <input
                        type="text"
                        name="count"
                        class="form-control w-full px-3 py-2 text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Please enter Food Count !"
                    />
                </div>

                <div>
                    <label>Choose a categories:</label>
                    <select
                        name="category_id"
                        class="form-control w-full px-3 py-2 text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Upload Image:</label>
                    <input
                        type="file"
                        name="image"
                        class="form-control w-full px-3 py-2 text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Please select Food Image!"
                    />
                </div>

                @if ($errors->any())
                <div>
                    <ul class="text-red-500">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <button type="submit"
                        class="w-full px-4 py-2 bg-blue-500 text-white font-bold rounded-lg hover:bg-blue-600 transition">
                    Submit
                </button>
            </div>
        </form>

    </div>
@endsection
