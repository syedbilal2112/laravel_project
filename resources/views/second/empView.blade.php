@extends('layouts.app')

@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Enter Employee Details</div>
                
                

                <div class="card-body">
                    <form method="POST" action="{{ url('emp_insert') }}">
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
<table class="table table-hover">
    <tr>
        <th>
            ID
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
            </td>
        </tr>
    @endforeach
</table>
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