@extends('layouts.app')

@section('content')


<section class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-content">
                    <h2>{{$post->title}}</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-posts grid-system">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-post">
                    <div class="blog-thumb">
                        @foreach($post->categories as $category)
                        <img class="image-category" src="{{asset('images/').'/'.$category->category.'.jpg'}}" alt="">
                    </div>
                    <div class="down-content">

                        <span>{{$category->category}}</span>
                        @endforeach
                        <a href="#">
                            <h4>{{$post->title}}</h4>
                        </a>
                        <ul class="post-info">
                            <li><a href="#">{{$post->user->name}}</a></li>
                            <li><a href="#">{{$post->created_at}}</a></li>
                        </ul>
                        <p>{!! $post->body !!}</p>
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
                                        <li><a href='https://www.facebook.com/sharer.php?t=XBOX&u=' +
                                                encodeURIComponent('http://127.0.0.1:8000/posts/' + {{$post->id}} );>
                                                Twitter</a></li>
                                    </ul>
                                </div>
                                @if(Auth::check())
                                <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>

                                {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id],
                                'method' => 'POST']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger ml-3'])}}
                                {!! Form::close() !!}


                                {!! Form::open(['action' => ['App\Http\Controllers\PostsController@publish', $post->id],
                                'method' => 'POST']) !!}
                                {{Form::hidden('_method', 'POST')}}
                                {{Form::submit('Publish', ['class' => 'btn btn-secondary ml-3'])}}
                                {!! Form::close() !!}


                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('inc.sidebar')
        </div>
    </div>

</section>


@endsection
