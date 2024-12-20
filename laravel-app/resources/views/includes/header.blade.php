<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel App</title>

    @vite('resources/css/app.css')
</head>
<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a  class="{{ request()->is('/') ? 'active' : '' }}" 
                        href="{{ url('/') }}">Home
                    </a>
                </li>
                <li>
                    <a  class="{{ request()->is('about') ? 'active' : '' }}" 
                        href="{{ url('about') }}">About
                    </a>
                </li>
                <li>
                    <a  class="{{ request()->is('contact') ? 'active' : '' }}" 
                        href="{{ url('contact') }}">Contact
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    
