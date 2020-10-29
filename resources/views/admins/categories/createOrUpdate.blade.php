@extends('layouts.app')

@section('content')
 <div class="container">
  <div class="row justify-content-center">
  <div class="col-md-12">
   <div class="card">
    <div class="card-header">
     Create Category
    </div>
    <div class="card-body">
     <form action="{{ url('admin/category/store') }}/{{ isset($object) ? $object->id : 0}}" method="POST" enctype='multipart/form-data'>
      {{csrf_field()}}
      <div class="form-group">
       <label for="exampleInputEmail1">Title</label>
       <input type="text" class="form-control" name="title" id="exampleInputEmail1" value="{{isset($object) ? $object->title : ''}}" aria-describedby="emailHelp" placeholder="Enter Title">
       <!-- Error -->
       @if ($errors->has('title'))
       <div class="error">
           {{ $errors->first('title') }}
       </div>
       @endif
     </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <textarea class="form-control" name="description" id="" cols="30" rows="6" placeholder="Enter Description">{{isset($object) ? $object->description : ''}}</textarea>
        <!-- Error -->
        @if ($errors->has('description'))
        <div class="error">
            {{ $errors->first('description') }}
        </div>
        @endif
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <a class="btn btn-danger" role="button" href="{{url('admin/category')}}">Back</a>
    </form>
    </div>
   </div>
  </div>
 </div>
 </div>
@endsection
