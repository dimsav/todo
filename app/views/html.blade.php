<!doctype html>
<html lang="en" ng-app="todoApp">
<head>
    <meta charset="UTF-8">
    <title>Todo App</title>
    {{ HTML::style('dev//css/main.css'); }}
</head>
<body @yield('body_attributes')>

@yield('content')

{{ HTML::script('dev/js/main.js'); }}
</body>
</html>
