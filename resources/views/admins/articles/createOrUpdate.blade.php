@extends('layouts.app')

@section('content')
 <div class="container">
  <div class="row justify-content-center">
  <div class="col-md-12">
   <div class="card">
    <div class="card-header">
     Create Article
    </div>
    <div class="card-body">
     <form action="{{ url('admin/articles/store') }}/{{ isset($object) ? $object->id : 0}}" method="POST" enctype='multipart/form-data'>
      {{csrf_field()}}
      <div class="form-group">
        <label>Category</label>
        <select name="category_id" class="form-control">
            <option value=""> -- Please Select --</option>
                @foreach ($categories as $category)
                    <option name="category_id" value="{{$category->id}}" {{ isset($object) ? ($object->category_id == $category->id ? 'selected': ''): ''}}>{{ $category->title }}</option>
                @endforeach
        </select>
        <!-- Error -->
        @if ($errors->has('category_id'))
        <div class="error">
            {{ $errors->first('category_id') }}
        </div>
        @endif
      </div>
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
         <label for="exampleInputEmail1">Content</label>
         <textarea class="form-control" name="content" id="summernote" cols="30" rows="6" placeholder="Enter Content">{{isset($object) ? $object->content : ''}}</textarea>
         <!-- Error -->
        @if ($errors->has('content'))
        <div class="error">
            {{ $errors->first('content') }}
        </div>
        @endif
       </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Video Link</label>
        <input type="url" class="form-control" name="video_link" value="{{isset($object) ? $object->video_link : ''}}" aria-describedby="emailHelp" placeholder="Enter video link">
        <!-- Error -->
        @if ($errors->has('video_link'))
        <div class="error">
            {{ $errors->first('video_link') }}
        </div>
        @endif
      </div>
      <div class="form-group" style="padding-bottom: 15px">
        <label class="col-lg-3">Upload</label>
        <input class="btn btn-primary"  type="file" name="files[]" required> <br/>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <a class="btn btn-danger" role="button" href="{{url('admin/articles')}}">Back</a>
    </form>
    </div>
   </div>
  </div>
 </div>
 </div>
@endsection
