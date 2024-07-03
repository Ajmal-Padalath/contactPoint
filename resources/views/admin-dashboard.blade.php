
<!DOCTYPE html>
<html>
<head>
    <title>Forms Listing</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <h2 class="page_header" style="text-align: center;">Forms</h2>
    <div class="container">
        <a href="{{url('/load-add-product-form')}}">
            <button type="button" id="add-product-btn" class="btn btn-success">Add Form</button>
        </a>
        @if (count($forms) > 0)
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($forms as $form)
                        <tr>
                            <td>{{$form->form_name}}</td>
                            <td>
                                <button type="button" class="btn btn-warning" onclick='confirmDelete({{"$form->id"}})'>Edit</button>
                                <form id='deleteForm' method='post' style='display:inline;'>
                                    <a href='#' onclick='editForm({{"$form->id"}})'>
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </a>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Forms are not available</p>
        @endif
    </div>

    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this product?")) {
                $.ajax({
                    type: 'POST',
                    url: "{{url('delete-form')}}",
                    data: {formId: id, _token: '{{csrf_token()}}'},
                    success: function (data) {
                            location.reload();
                    },
                });
            }
        }

        function editForm(formId) {
            $.ajax({
                type: 'POST',
                url: "{{url('edit-form')}}",
                data: {formId: formId, _token: '{{csrf_token()}}'},
                success: function (data) {

                },
            });
        }
    </script>
</body>
</html>