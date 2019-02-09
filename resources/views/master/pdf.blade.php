<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

	<table class="table">
		<tr>
			<th>ID 	</th>
			<th>Profile Pic 	</th>
			<th>Employee Name 	</th>
			<th>Employee Email 	</th>
			<th>Employee Type 	</th>
			<th>Employee Id</th>
		</tr>
		<tr>
			<td>
                {{$third->id}}
            </td>
            <td>
                <img src="{{ url('../storage/app/images/'.$third->file_upload) }}" width="150px" height="150px" style="border-radius: 50%">
            </td>
            <td>
                {{$third->emp_name}}
            </td>
            <td>
                {{$third->emp_email}}
            </td>
            <td>
                {{$third->emp_type}}
            </td>
            <td>
                {{$third->emp_id}}
            </td>
		</tr>
		
	</table>

</body>
</html>