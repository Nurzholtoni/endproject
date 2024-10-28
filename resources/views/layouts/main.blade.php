<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Nurzhol</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="container">
    <div class="row">
        <nav>
            <ul>
                <li><a href="{{route('main.index')}}">Main</a> </li>
                <li><a href="{{route('post.index')}}">Posts</a> </li>
                <li><a href="{{route('about.index')}}">About</a> </li>
                <li><a href="{{route('contact.index')}}">Contacts</a> </li>
            </ul>
        </nav>
    </div>
    @yield('content')
</div>
</body>
</html>
