@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <form action="{{ url('/admin/update-employees/'.$employee->id) }}" method="POST" enctype="multipart/form-data" class="form-control">
            @csrf
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Edit Employee</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Employee Name*</label>
                                <input type="text" name="name" value="{{$employee->name}}" class="form-control" required
                                    placeholder="Edit employee Name*">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Employee Email*</label>
                                <input type="email" name="email" value="{{$employee->email}}" class="form-control" required
                                    placeholder="Edit your email*">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Employee Role*</label>
                                <select name="role" class="form-control">
                                  <option value="admin" @if ($employee->role == "admin")
                                    selected
                                  @endif>Admin</option>
                                  <option value="editor" @if ($employee->role == "editor")
                                    selected
                                  @endif>Editor</option>
                                  <option value="accounts" @if ($employee->role == "accounts")
                                    selected
                                  @endif>Accounts</option>
                                  <option value="employee" @if ($employee->role == "employee")
                                    selected
                                  @endif>Employee</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Employee Password</label>
                                <input type="text" name="password" value="" class="form-control" placeholder="Enter your password">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" value="Update" class="form-control btn btn-success">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
