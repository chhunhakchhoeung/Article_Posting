@extends('layouts.app')

@section('content')
<div class="">
    <div class=" justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Categories List
                  <a class="float-right btn btn-primary" role="button" href="{{url('admin/category/create')}}">Create Category</a>
                </div>
                <div class="card-body table-responsive">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table id="categories" class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                          $i = 1;
                          @endphp
                          @foreach ($categories as $record)
                          <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{$record->title}}</td>
                            <td>{{$record->description}}</td>
                            <td>{{$record->created_at}}</td>
                            <td>{{$record->updated_at}}</td>
                            <td>
                              <div class="btn-group">
                                <div class="text-nowrap">
                                  <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');" href="{{url('admin/category/delete').'/'.$record->id}}"><i class="fas fa-trash-alt"></i> </a>
                                  <a class="btn btn-dark" href="{{url('admin/category/show').'/'.$record->id}}"><i class="fas fa-edit"></i> </a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
