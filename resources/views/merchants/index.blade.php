<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Share</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('merchants') }}">Merchants
    </div>
    <ul class="nav navbar-nav">
    <li><a href="{{ URL::to('merchants') }}">View  Merchant</a></li>
        <li><a href="{{ URL::to('merchants/create') }}">Create a merchant</a>
    </ul>
</nav>

<h1>All the Merchants</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Address</td>
            <td>Categories</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($merchants as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->address }}</td>
            <td>{{ $value->categories }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                {{ Form::open(array('url' => 'merchants/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this merchants', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('merchants/' . $value->id) }}">Show this merchant</a>

                <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('merchants/' . $value->id . '/edit') }}">Edit this merchant</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</body>
</html><?php /**PATH /home/quanganh/application/resources/views/welcome.blade.php ENDPATH**/ ?>