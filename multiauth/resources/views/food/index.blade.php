<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food List</title>
    <!-- Liên kết file CSS -->
    @vite('resources/css/style.css')
</head>
<body>
    <div class="header">
        <h1>Food List</h1>
        <a href="{{ route('food.create') }}" class="add-new">Add new food</a>
        <a href="{{ url('/admin/dashboard') }}">Go to Admin Dashboard</a>
    </div>

    <div class="food-list">
        @foreach ($foods as $item)
        <div class="food-item">
            <!-- Hiển thị ảnh -->
            @if($item->image_path)
            <img src="{{ asset('images/' . $item->image_path) }}" class="food-image" alt="{{ $item->name }}">
            @endif

            <!-- Nội dung -->
            <div class="food-info">
                <h2>{{ $item->name }}</h2>
                <p><strong>Count:</strong> {{ $item->count }}</p>
                <p><strong>Description:</strong> {{ $item->description }}</p>
            </div>

            <!-- Hành động -->
            <div class="food-actions">
                <a href="{{ route('food.edit', $item->id) }}" class="action-button">Edit</a>
                <a href="{{ route('food.show', $item->id) }}" class="action-button">Show</a>
                <form action="{{ route('food.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>
