<div class="col-lg-4">
    <div class="sidebar">
        <div class="row">
            <div class="col-lg-12">
                {!! Form::open(['action' => 'App\Http\Controllers\PagesController@search', 'method' => 'GET']) !!}

                {{Form::text('search', '',['class' => 'form-control form-sidebar' , 'placeholder' => 'Type to search'])}}

                {!! Form::close() !!}
            </div>
            <div class="col-lg-12">
                <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                        <h2>Recent Posts</h2>
                    </div>
                    <div class="content">
                        <ul>
                            @foreach(App\Models\Post::orderBy('created_at', 'desc')->paginate(5) as $post)
                            <li><a href="{{ url( 'posts' ,['post' => $post->id]) }}">
                                    <h5>{{$post->title}}</h5>
                                    <i class="fa fa-tags tag-links">
                                        <p class="tags">{{$post->tags}}</p>
                                    </i>
                                    <span>{{$post->created_at}}</span>
                                </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="sidebar-item categories">
                    <div class="sidebar-heading">
                        <h2>Categories</h2>
                    </div>
                    <div class="content">
                        <ul>
                            @foreach(App\Models\Category::all() as $category)
                            <li><a href="/category/{{$category->category}}">{{$category->category}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
