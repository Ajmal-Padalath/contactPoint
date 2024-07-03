<!DOCTYPE html>
<html>
<head>
    <title>form job</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <h1>New form  {{$name}}</h1>
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <td>{{ $name }}</td>
        </tr>
        <tr>
            <th>Title</th>
            <td>{{$title}}</td>
        </tr>
        

    </table>
    
</body>
</html>