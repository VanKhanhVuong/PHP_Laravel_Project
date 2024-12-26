<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Food</title>
    <!-- Liên kết file CSS -->
    @vite('resources/css/style.css')
</head>
<body>
    <div class="form-container">
        <form action="/food/{{ $food->id }}" method="POST" enctype="multipart/form-data" class="food-form">
            @csrf
            @method('PUT')
            <h1 class="form-title">Edit Food Page</h1>
            <div class="form-group">
                <div class="input-group">
                    <input
                        type="text"
                        name="name"
                        class="form-input"
                        value="{{ $food->name }}"
                        placeholder="Please enter Food Name!"
                    />
                </div>
                <div class="input-group">
                    <input
                        type="text"
                        name="description"
                        class="form-input"
                        value="{{ $food->description }}"
                        placeholder="Please enter Food Description!"
                    />
                </div>
                <div class="input-group">
                    <input
                        type="text"
                        name="count"
                        class="form-input"
                        value="{{ $food->count }}"
                        placeholder="Please enter Food Count!"
                    />
                </div>

                <div class="input-group">
                    <label for="category" class="form-label">Choose a category:</label>
                    <select name="category_id" id="category" class="form-select">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $food->category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group">
                    <label for="image" class="form-label">Upload Image:</label>
                    <input
                        type="file"
                        name="image"
                        id="image"
                        class="form-input"
                    />
                    @if ($food->image_path)
                        <p>Current Image:</p>
                        <img src="{{ asset('images/' . $food->image_path) }}" alt="{{ $food->name }}" class="food-image"/>
                    @endif
                </div>

                @if ($errors->any())
                <div class="error-messages">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="error-message">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <button type="submit" class="submit-button">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
