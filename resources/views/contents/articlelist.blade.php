@extends('welcome')

@section('content1')
<div class="container">
  <div class="row">
      <div class="col-sm-8">
        <ul class="nav nav-tabs tabs-custom-style">
          <li class="nav-item">
          <a class="nav-link active" href="#">{{ $title }}</a>
          </li>
        </ul>
        <div class="row">
                @foreach ($articlelists as $item)
                    <div class="col-md-6 card-wrapper-custom">
                    <a style="text-decoration:none" href="{{url('view/article/detail/'.$item->id)}}">
                    <div class="card card-custom-style">
                        <div class="card-body">
                            <div class="row">
                            <div class="col-md-12">
                              <div class="post-news-card">
                                <img src="{{asset($item->articlePhotoFisrt[0]->path)}}" class="img-fluid image-resolution" alt="Responsive image">
                              </div>
                            </div>
                            <div class="col-md-12">
                                <p class="text-muted"><span class="fa fa-user"> {{$item->articleWriter->f_name." ".$item->articleWriter->l_name}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-calendar"> {{$item->published_at}}</span></p>
                                <h5 class="card-title text-dark"><b>{{ $item->title}}</b></h5>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($item->description, 80) }}</p>
                            </div>
                            </div>
                        </div>
                        </div>
                    </a>
                    </div>
                @endforeach
        </div>
      </div>
      <div class="col-sm-4">
        <ul class="nav nav-tabs tabs-custom-style">
          <li class="nav-item">
          <a class="nav-link active" href="#">Advertisements</a>
          </li>
        </ul>
        <br>
          <!-- Data second column  -->
          @include('contents.right_link')
      </div>
  </div>
<br>
<div class="text-center">
 <span class="">{{ $articlelists->links() }}</span>
</div>
</div>
@endsection
@include('footer')
