@extends('admin.layouts.app') 
@section('bread')
    <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Add Employee</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Employee</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                    <a href="#" class="active">Add new</a></li>
                    </li>
                  </ol>
                </nav>
              </div>
            </div> 
          </div>
    </div>
@endsection
@section('card')
    <div class="card">
      @if($errors->any())
      <div class=" alert alert-danger">
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </div>
      @endif
      @if(Session::has('msg'))
        <div class="alert alert-success">{{Session::get('msg')}}</div>
      @endif
                <form class="form-horizontal" action="{{ route('admin.employee.store') }}" enctype="multipart/form-data" method="post">
                  @csrf
                <div class="card-body">
                    <div class="form-group row">
                      <label
                        for="name"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Name</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="name"
                          placeholder="Name Here"
                          name="name"
                          value="{{old('name')}}"
                        />
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label
                        for="email"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Email</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="email"
                          class="form-control"
                          id="email"
                          placeholder="Email Here"
                          name="email"
                          value="{{old('email')}}"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="role"
                        class="col-sm-3 text-end control-label col-form-label"
                        >role</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="role"
                          placeholder="role"
                          name="role"
                          value="{{old('role')}}"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="password"
                        class="col-sm-3 text-end control-label col-form-label"
                        >password</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="password"
                          class="form-control"
                          id="password"
                          placeholder="password"
                          name="password"
                          value="{{old('password')}}"
                        />
                      </div>
                    </div>  
                    </div>
                    </div>
                  </div>
                  <div class="border-top">
                    <div class="card-body">
                      <button type="submit" class="btn btn-primary">
                        Add
                      </button>
                    </div>
                  </div>
                </form>
    </div>
@endsection
