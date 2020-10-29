@extends('layouts.app')

@section('content')
<section class="">
    <div class="justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Users List
                  <a class="float-right btn btn-primary" role="button" href="{{url('admin/users/create')}}">Create User</a>
                </div>
                <div class="card-body table-responsive">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table id="users" class="table">
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
                          @foreach ($users as $record)
                          <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{$record->name}}</td>
                            <td>{{$record->email}}</td>
                            <td>{{$record->created_at}}</td>
                            <td>{{$record->updated_at}}</td>
                            <td>
                              <a class="btn btn-danger" href="{{url('/admin/users/delete').'/'.$record->id}}">Delete</a>
                              <a class="btn btn-dark" href="{{url('/admin/users/show').'/'.$record->id}}">Update</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
