@extends('admin.layouts.app')
@section('bread')
    <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Employee</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                    <a href="#" class="active">Employee</a></li>
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
    </div>
@endsection
@section('card')
@if(Session::has('msg'))
        <div class="alert alert-success">{{Session::get('msg')}}</div>
      @endif 
    <div class="card-body">
        <h5 class="card-title">Basic Datatable</h5> 
        <div class="table-responsive">
            <table
                id="zero_config"
                class="table table-striped table-bordered"
                >
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->id}}</td>
                        <td>{{ $employee->name}}</td>
                        @if(!empty ($employee->photo))
                          <td><img src="{{ asset('storage')."/$employee->photo"}}" width="70" height="70"></img></td>
                        @endif
                        <td>
                      
                          <a href="employee/{{$employee->id}}" class="btn btn-outline-primary">Show</a>
                          <a href="employee/{{$employee->id}}/edit" class="btn btn-outline-success">Edit</a>
                          <form method="post" action="{{ route('admin.employee.destroy',$employee->id)}}" class="d-inline">
                            @csrf
                            @method('delete')
                            <input type="submit" value="delete" class="btn btn-outline-danger" >
                          </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> 
@endsection