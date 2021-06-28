<!DOCTYPE html>
<html>
<head>
    <title>Shark App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('merchants') }}">Merchants</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('merchants') }}">View All Merchants</a></li>
        <li><a href="{{ URL::to('merchants/create') }}">Create a merchants</a>
    </ul>
</nav>

<h1>Edit {{ $merchants->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::model($merchants, array('route' => array('merchants.update', $merchants->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('address', 'Address') }}
        {{ Form::text('address', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('categories', 'categories') }}
        {{ Form::select('categories', array('0' => 'Select a category', '1' => 'Cơm', '2' => 'Bún/Phở', '3' => 'Đồ uống', '4' => 'Healthy'), null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the merchants!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>