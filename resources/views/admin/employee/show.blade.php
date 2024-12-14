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
                        <th>Email</th>
                        <th>role</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                
                    <tr>
                        <td>{{$User->id}}</td>
                        <td>{{$User->name}}</td>
                        <td>{{$User->email}}</td>
                        <td>{{$User->role}}</td>
                        <td></td>
                        
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div> 
@endsection