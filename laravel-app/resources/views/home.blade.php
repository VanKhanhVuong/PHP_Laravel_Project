@extends('layouts.layout')

@section('content')
    <h1>Welcome to My Laravel App</h1>
    <p>This is the Home page content.</p>

    <img src="{{ asset('storage/capybara_icon.png') }}"
     alt="Image Description"
     width="100"
     height="100">
@endsection
