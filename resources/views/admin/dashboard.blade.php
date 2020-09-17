<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{url(mix('pages/css/style.css'))}}">
    <link rel="stylesheet" href="{{asset ('pages/style.css')}}">
    <title>TecnoIF</title>
</head>
<body>
    <h1>ADMIN</h1>
    <a href="{{route('admin.logout')}}">Logout</a>


    <script src="{{ asset ('pages/jquery.js') }}"></script>
    <script src="{{ url(mix('pages/js/script.js')) }}"></script>
    <script src="{{asset('pages/bootstrap.js')}}"></script>

</body>

</html>


