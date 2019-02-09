<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<table class="table table-hover">
    <tr>
        <th>
            ID
        </th>
        <th>
            Profile Pic
        </th>
        <th>
            Employee Name
        </th>
        <th>
            Employee Email
        </th>
        <th>
            Employee Type
        </th>
        <th>
            Employee Id
        </th>
    </tr>
    @foreach($third as $thirds)
        <tr>
            <td>
                {{$thirds->id}}
            </td>
            <td>
                <img src="{{ url('../storage/app/images/'.$thirds->file_upload) }}" width="150px" height="150px" style="border-radius: 50%">
            </td>
            <td>
                {{$thirds->emp_name}}
            </td>
            <td>
                {{$thirds->emp_email}}
            </td>
            <td>
                {{$thirds->emp_type}}
            </td>
            <td>
                {{$thirds->emp_id}}
            </td>
        </tr>
    @endforeach
</table>

</body>
</html>