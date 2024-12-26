<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Detail</title>
    <!-- Liên kết file CSS -->
    @vite('resources/css/style.css')
</head>
<body>
    <div class="food-detail-container">
        <div class="food-detail">
            <!-- Hiển thị ảnh -->
            @if($food->image_path)
                <img src="{{ asset('images/' . $food->image_path) }}" class="food-image" alt="{{ $food->name }}">
            @endif

            <!-- Hiển thị thông tin -->
            <div class="food-info">
                <h1 class="food-title">
                    Food with ID: {{ $food->id }}
                </h1>
                <h2><strong>Name:</strong> {{ $food->name }}</h2>
                <h2><strong>Count:</strong> {{ $food->count }}</h2>
                <h2><strong>Description:</strong> {{ $food->description }}</h2>
                <h2><strong>Category:</strong> {{ $food->category->name }}</h2>
            </div>
        </div>
    </div>
</body>
</html>
