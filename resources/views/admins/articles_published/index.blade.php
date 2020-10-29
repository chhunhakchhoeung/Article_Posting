@extends('layouts.app')
@section('content')
<div class="">
    <div class="justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Articles Publised List
                  <a class="float-right btn btn-primary" role="button" href="{{url('admin/articles/create')}}">Create Article</a>
                </div>
                <div class="card-body table-responsive">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table id="articles" class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Status</th>
                            <th scope="col">Publised At</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                          $i = 1;
                          @endphp
                          @foreach ($articles as $record)
                          <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{$record->title}}</td>
                            <td>{{$record->created_at}}</td>
                            <td>{{$record->categories->title}}</td>
                            <td>{{$record->status == '1' ? 'Published': ''}}</td>
                            <td>{{$record->published_at}}</td>
                            <td>
                              <div class="btn-group">
                                <div class="text-nowrap">
                                  <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');" href="{{url('admin/articles/delete').'/'.$record->id}}"><i class="fas fa-trash-alt"></i></a>
                                  <a class="btn btn-dark" href="{{url('admin/articles/show').'/'.$record->id}}"><i class="fas fa-edit"></i></a>
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
