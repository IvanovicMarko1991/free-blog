@extends('layouts.app')


@section('content')

<div class="header-banner">
    <br>
    <br>
</div>
<section class="blog-posts">

    <div class="container">
        <div class='row'>
            <div class="col-lg-8">
                <div class="all-blog-posts">

                    @foreach($posts as $post )
                    <div class="col-lg-12">
                        <div class="blog-post">
                            <div class="blog-thumb">
                                <a href="/posts/{{$post->id}}">
                                    <img src="{{asset('images/').'/'.$post->category.'.jpg'}}" alt="">
                                </a>
                            </div>
                            <div class="down-content">

                                <a href="/posts/{{$post->id}}">
                                    <h4>{{$post->title}}</h4>
                                </a>
                                <ul class="post-info">
                                    <li><a href="#">{{$post->name}}</a></li>
                                    <li><a href="#">{{$post->created_at}}</a></li>
                                </ul>
                                <p>{!! substr(strip_tags($post->body), 0, 150) !!}</p>
                                <div class="post-options">
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="post-tags">
                                                <li><i class="fa fa-tags"></i></li>
                                                <li><a href="#">{{$post->tags}}</a></li>

                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="post-share">
                                                <li><i class="fa fa-share-alt"></i></li>
                                                <li><a href="#">Facebook</a>,</li>
                                                <li><a href="#"> Twitter</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    @endforeach



                </div>
            </div>
            @include('inc.sidebar')
        </div>
    </div>

</section>

@endsection
