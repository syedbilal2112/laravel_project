@extends('layouts.app')

@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Enter Employee Details</div>
                
                @if (count($errors) > 0)
                        <div class="alert alert-success">
                           
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        

                @endif

                <div class="card-body">
                    <form method="POST" action="{{ url('emp_insert') }}"   enctype="multipart/form-data" >
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Employee Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('emp_name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('emp_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('emp_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('emp_email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('emp_email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('emp_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('type') }}</label>

                            <div class="col-md-6">
                                <input id="type" type="text" class="form-control{{ $errors->has('emp_type') ? ' is-invalid' : '' }}" name="type" required>

                                @if ($errors->has('emp_type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('emp_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="emp_id" class="col-md-4 col-form-label text-md-right">{{ __('Emp Id') }}</label>

                            <div class="col-md-6">
                                <input id="emp_id" type="number" class="form-control" name="emp_id" required>
                            </div>
                        </div>

    <input type="hidden" name="_token" value="{{{csrf_token()}}}"/>
    <div class="form-group">
        <label for="focusedinput" class="col-sm-6 control-label">Upload Profile Pic</label>
        <div class="col-sm-4"> 
            <input type="file" name="image" class="form-control" id="name" placeholder="Upload" accept=".jpg">
        </div>
    </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6">
        
    </div>
    <div class="col-md-6">
        <div class="input-group">
            <form action="{{ url('empSearch')}}" method="GET" class="form-inline">
                <input type="text" class="form-control" placeholder="Search for..." name="searchEmp">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Go!</button>
                </span>
            </form>
        </div><!-- /input-group -->
        <a href="{{action('ThirdController@downloadAllPDF')}}" class="btn btn-warning">Download PDF</a>
    </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

<br>
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
        <th>
            Action
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
            <td>
                <a href="{{ url('edit/')}}/{{$thirds->id}}" class="btn btn-primary">Edit</a>

                <button onclick=" View('{{ $thirds->id }}')"   class="btn btn-primary">View</button>

                <a href="{{ url('delete/')}}/{{$thirds->id}}" class="btn btn-danger">Delete</a>

                <a href="{{action('ThirdController@downloadPDF', $thirds->id)}}" class="btn btn-warning">Download PDF</a>
            </td>
        </tr>
    @endforeach
</table>

            <div class="row">
                    <div class="col-xs-12">
                        {{ $third->render() }}
                    </div>
            </div>
            <!--view-->

 <!-- The Modal -->
  <div class="modal fade" id="myModal" >
    <div class="modal-dialog  " >
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
            <h2 class="modal-title" style="font-family:oblique;">Employee Details </h2>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="container">
                
<form>
   <input type="text" id="employee_name" class="form-control">
   <input type="text" id="employee_email" class="form-control">
   <input type="text" id="employee_type" class="form-control">
   <input type="text" id="employee_id" class="form-control">
</form>
            
         </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          
        </div>
        
      </div>
    </div>
  </div>

<!--view end-->
@endsection
@section('js')

   <script type="text/javascript">

   function View(id)
        {
            
                $.ajax({
                method: 'GET',
                url: "{{ route('view.emp') }}",
                data: {
                        id: id
                      },
                success: function(data)
                {

                    $('#employee_name').val(data.emp_name);
                    $('#employee_email').val(data.emp_email);
                    $('#employee_type').val(data.emp_type);
                    $('#employee_id').val(data.emp_id);

                    $('#myModal').modal('show');
                }
            
            });
        }

   </script>