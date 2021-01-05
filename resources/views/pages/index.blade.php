@extends('layouts.app')

@section('content')
<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @foreach($posts as $post )
                <div class="col-lg-12">
                    <div class="blog-post">
                        <div class="blog-thumb">
                            <a href="/posts/{{$post->id}}">
                                @foreach($post->categories as $category)
                                <img src="{{asset('images/').'/'.$category->category.'.jpg'}}" alt="">
                            </a>
                        </div>
                        <div class="down-content">
                            <span>{{$category->category}}</span>
                            @endforeach
                            <a href="/posts/{{$post->id}}">
                                <h4>{{$post->title}}</h4>
                            </a>
                            <ul class="post-info">
                                <li><a href="#">{{$post->user->name}}</a></li>
                                <li><a href="#">{{$post->created_at}}</a></li>
                            </ul>
                            <p>{!! substr(strip_tags($post->body), 0, 150) !!}</p>
                            <div class="post-options">
                                <div class="row">
                                    <div class="col-6">
                                        <ul class="post-tags">
                                            <li><i class="fa fa-tags"></i></li>
                                            <li><a class="tags">{{$post->tags}}</a></li>
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
            @include('inc.sidebar')
        </div>
    </div>
</section>
@endsection
