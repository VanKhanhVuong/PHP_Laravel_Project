<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Wellcome admin</h1>

    <!-- Authentication -->
    <form method="POST" action="{{ route('logout') }}">
    @csrf
        <x-dropdown-link :href="route('logout')" 
            onclick="event.preventDefault();
            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form>
</body>
</html>