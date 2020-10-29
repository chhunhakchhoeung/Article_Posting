@extends('welcome')

@section('content1')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2><b>{{$get_article_detail->title}}</b></h2><br>
            <div class="row">
                <div class="col-md-3">
                    <p class="text-muted"><span class="fa fa-user"> {{$get_article_detail->articleWriter->f_name." ".$get_article_detail->articleWriter->l_name}}</span></p>
                </div>
                <div class="col-md-3">
                    <p class="text-muted"><span class="fa fa-calendar"> {{$get_article_detail->published_at}}</span></p>
                </div>
                <div class="col-md-3">
                    <p class="text-muted"><span class="fa fa-eye"> {{$get_article_detail->amount_viewer}}</span></p>
                </div>
                <div class="col-md-3">
                    <div class="btn-group">
                        <div class="text-nowrap">
                          <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0&appId=2488896414478775&autoLogAppEvents=1" nonce="TtHGXdEv"></script>
                          <div class="fb-share-button" data-href="{{Request::url()}}" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                          <script async src="https://telegram.org/js/telegram-widget.js?11" data-telegram-share-url="{{Request::url()}}" data-size="large"></script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <img class="img-thumbnail" src="{{asset($get_article_detail->articlePhoto[0]->path)}}" style="height: 500px;" alt="...">
            </div>
            <br>
            <div class="row">
                <p>{!!$get_article_detail->content!!}</p>
            </div>
            <br>
            <div class="row">
                <iframe width="100%" height="415" src="{{ $get_article_detail->video_link }}" frameborder="0"></iframe>
            </div>
        </div>
        <div class="col-md-4">
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
</div>
@endsection

@include('footer')
