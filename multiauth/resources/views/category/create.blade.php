<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category List</title>
    <!-- Liên kết file CSS -->
    @vite('resources/css/style.css')
</head>
<body>
    <div class="form-container">
        <h1>Category List</h1>
        <a href="category/create" class="add-category-link">Add new category</a>

        <div class="category-list">
            @foreach ($categories as $item)
            <div class="category-item">
                <h2>{{ $item->name }}</h2>
                <p><strong>Description:</strong> {{ $item->description }}</p>

                <div class="category-actions">
                    <!-- Edit Button --> 
                    <a href="category/{{ $item->id }}/edit">Edit</a>

                    <!-- Delete Button -->
                    <form action="category/{{ $item->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
