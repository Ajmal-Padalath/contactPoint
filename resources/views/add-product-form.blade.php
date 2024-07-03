<!DOCTYPE html>
<html>
<head>
    <title>Add Forms</title>
</head>
<body>
    <div class="page_header">
        <h2>Add Form</h2>
        <form method="post" id="add-form">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            Form name: <input type="text" name="form_name" required><br> <br>
            <input type="hidden" name="field_count" id="field-count" value="2">
            <div id="field_div">
                <label for="">Field 1:</label>
                <input type="text" name="field_name_1" required placeholder="Field Name">
                <select name="field_type_1" id="field_type_1">
                    <option value="">Select any field</option>
                    <option value="1">Text box</option>
                    <option value="2">Number Box</option>
                    <option value="3">Text Area</option>
                </select> <button type="button" id="add-field">Add field</button><br>
            </div>
            <br>
            <input type="button" id="add-form-btn" class="btn btn-success" value="Add Form">
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#add-field").click(function(){
            var fieldCount = $('#field-count').val();
            var caste = $('#field_div');
            var field = '<br><label for="">Field '+fieldCount+':</label><input type="text" name="field_name_'+fieldCount+'" required placeholder="Field Name"> <select name="field_type_'+fieldCount+'" id="field_type_'+fieldCount+'"><option value="">Select any field</option><option value="1">Text box</option><option value="2">Number Box</option><option value="3">Text Area</option></select><br>';
            caste.append(field);
            $('#field-count').val(parseInt(fieldCount) +1)
        });
        
        $("#add-form-btn").click(function(){
            var form     = $('#add-form');
            var url      = "{{url('/add-form')}}";
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
    });

    </script>
</body>
</html>