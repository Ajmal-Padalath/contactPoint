<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
</head>
<body>
    <form id="common-form">
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        <input type="hidden" name="formId" id="formId" value="{{$formData->id}}">
        @foreach ($formData->formElements as $key => $field)
            @if ($field->fieldType == 1)
                <label for="">{{$field->fieldName}}:</label>
                <input type="text" name="elemnt_{{$key}}" required placeholder="{{$field->fieldName}}"><br>
            @elseif ($field->fieldType == 2)
                <label for="">{{$field->fieldName}}:</label>
                <input type="number" name="elemnt_{{$key}}" required placeholder="{{$field->fieldName}}"><br>
            @elseif ($field->fieldType == 3)
                <label for="">{{$field->fieldName}}:</label>
                <textarea name="elemnt_{{$key}}" id="" cols="10" rows="3" placeholder="{{$field->fieldName}}"></textarea><br>
            @endif
        @endforeach
        <input type="button" id="common-form-submit" value="Submit">
    </form>

    <script>
        $("#common-form-submit").click(function(){
            var form     = $('#common-form');
            var url      = "{{url('/common-form-submit')}}";
            var formData = new FormData(form[0]);
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    location.reload();
                },
            });
        });
    </script>
</body>
</html>