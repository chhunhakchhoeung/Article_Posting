@extends('layouts.app')

@section('content')
 <div class="container">
  <div class="row justify-content-center">
  <div class="col-md-12">
   <div class="card">
    <div class="card-header">
     Create User
    </div>
    <div class="card-body">
     <form action="{{ url('admin/users/store') }}/{{ isset($object) ? $object->id : 0}}" method="POST" enctype='multipart/form-data'>
      {{csrf_field()}}
      <div class="form-group">
       <label for="exampleInputEmail1">Name</label>
       <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{isset($object) ? $object->name : ''}}" aria-describedby="emailHelp" placeholder="Enter Name">
       @if ($errors->has('name'))
        <div class="error">
            {{ $errors->first('name') }}
        </div>
        @endif
     </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="{{isset($object) ? $object->email : ''}}" aria-describedby="emailHelp" placeholder="Enter email">
        @if ($errors->has('email'))
        <div class="error">
            {{ $errors->first('email') }}
        </div>
        @endif
      </div>
      {{-- <div class="form-group">
        <label>User Role</label>
        <select name="user_roles_id" class="form-control" required>
            <option value=""> -- Please Select --</option>
                @foreach ($user_roles as $user_role)
                    <option name="user_roles_id" value="{{$user_role->id}}" {{ isset($object) ? ($object->id == $user_role->id ? 'selected': ''): ''}}>{{ $user_role->name }}</option>
                @endforeach
        </select>
      </div> --}}
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
        @if ($errors->has('password'))
        <div class="error">
            {{ $errors->first('password') }}
        </div>
        @endif
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <a class="btn btn-danger" role="button" href="{{url('admin/users/lists')}}">Back</a>
    </form>
    </div>
   </div>
  </div>
 </div>
 </div>
@endsection