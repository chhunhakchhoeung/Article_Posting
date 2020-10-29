@extends('welcome')

@section('content1')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                  </li>
            </ul>
        </div>
    </div>
 @foreach ($all_articles as $item)
 <div class="row justify-content-md-center">
    <div class="col-md-8">
        <a style="text-decoration:none" href="{{url('view/article/detail/'.$item->id)}}">
         <div class="card">
             <div class="card-body">
               <div class="row">
                <div class="col-md-5">
                  <img src="{{asset($item->articlePhotoFisrt[0]->path)}}" class="img-fluid image-resolution" alt="Responsive image">
                </div>
                <div class="col-md-7">
                    <h3 class="card-title">{{ $item->title}}</h3>
                    <hr>
                    <h5>{{$item->published_at}}</h5>
                    <p class="card-text">{{ $item->description}}</p>
                </div>
               </div>
             </div>
           </div>
        </a>
    </div>
 </div>
 @endforeach
 <br>
 <div class="text-center">
  <span class="">{{ $all_articles->links() }}</span>
 </div>
</div>
@endsection
