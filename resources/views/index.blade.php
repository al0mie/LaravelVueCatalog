<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Yet another simple Laravel and Vue</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ mix('css/vendor.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div class="container mrg-2em" id="app">
        <router-view></router-view>
    </div>

    <script>
        window.Laravel = { csrfToken: '{{ csrf_token() }}' };
    </script>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
