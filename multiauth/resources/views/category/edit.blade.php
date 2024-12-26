
    <div>
        <form action='/category/{{ $category-> id }}' method='post'>
            @csrf
            @method('PUT')
            <h1>Edit Category Page</h1>
            <div>
                
                <div>
                    <input
                        type="text"
                        name="name"
                        value="{{ $category->name }}"
                        placeholder="Please enter Category Name !"
                    />
                </div>
                <div>
                    <input
                        type="text"
                        name="description"
                        value="{{ $category->description }}"
                        placeholder="Please enter Category Description !"
                    />
                </div>

                <button type="submit">Update</button>
            </div>
        </form>
    </div>
