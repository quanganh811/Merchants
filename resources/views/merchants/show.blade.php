<!DOCTYPE html>
<html>
<head>
    <title>Merchants</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('sharks') }}">Merchants</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('merchants') }}">View All Merchants</a></li>
        <li><a href="{{ URL::to('merchants/create') }}">Create a merchant</a>
    </ul>
</nav>

<h1>Showing {{ $merchants->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $merchants->name }}</h2>
        <p>
            <strong>Address:</strong> {{ $merchants->address }}<br>
            <strong>Category:</strong> {{ $merchants->categories }}
        </p>
    </div>

</div>
</body>
</html>