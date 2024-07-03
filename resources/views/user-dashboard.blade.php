
<!DOCTYPE html>
<html>
<head>
    <title>User dashboard</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <h2 class="page_header" style="text-align: center;">Welcome to Contact point!</h2>
    <div class="container">
    <a href="{{url('/login')}}">
        <button type="button" id="show-forms-btn" class="btn btn-success">Login</button>
    </a>
    <br>
    <br>
    <br>
    <h4>Forms</h4>
        @foreach ($forms as $form)
            <button type="button" id="show-forms-btn" class="btn btn-info" data-toggle="modal" data-target="#myModal" onclick="showForms({{$form->id}})">{{$form->form_name}}</button>
        @endforeach

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Form</h4>
                </div>
                <div class="modal-body" id="show-form-elements">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        
            </div>
        </div>
        
    </div>

    <script>
        function showForms(formId) {
            $.ajax({
                type: 'POST',
                url: "{{url('show-forms')}}",
                data: {formId: formId, _token: '{{csrf_token()}}'},
                success: function (data) {
                   $('#show-form-elements').html(data);
                },
            });
        }
    </script>
</body>
</html>