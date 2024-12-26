<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <!-- Liên kết file CSS -->
    @vite('resources/css/style.css')
</head>
<body>
    <div class="container">
        <h1>Welcome Admin</h1>

        <div class="nav-links">
            <ul>
                <li><a href="{{ url('category') }}" class="nav-link">Category List</a></li>
                <li><a href="{{ url('food') }}" class="nav-link">Food List</a></li>
                <li>
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>
