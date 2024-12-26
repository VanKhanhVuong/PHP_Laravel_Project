<div>
        <h1>Category List</h1>
        <a href="category/create">Add new category</a>
</div>

<div>
        @foreach ($categories as $item)
            <div>
                <h2>{{ $item->name }}</h2>
                <p><strong>Description:</strong> {{ $item->description }}</p>

                <div>
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
