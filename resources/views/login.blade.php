<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <form style="text-align: center; width: 50%">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Password">
        </div>
        <p style="color: red" id="login-error"></p>
        <button type="button" id="login-btn" class="btn btn-primary">Submit</button>
      </form>

      <script>
    $("#login-btn").click(function(){
        var email = $('#email').val();
        var password = $('#password').val();
        $.ajax({
            type: 'POST',
            url: "{{url('check-log-in')}}",
            data: {email: email, password: password, _token: '{{csrf_token()}}'},
            success: function (data) {
               if (data.status == 1) {
                    $('#login-error').html('');
                    window.location.href = "{{url('/admin-dashboard')}}";
               } else {
                    $('#login-error').html(data.messge);
               }
            },
        });
    });
      </script>
</body>
</html>