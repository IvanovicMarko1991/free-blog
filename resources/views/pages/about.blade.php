@extends('layouts.app')

<link rel="stylesheet" href="{{asset('css/about.css')}}" />


@section('content')
<div class="about-section">
    <h1>About Us Page</h1>
    <p>Some text about who we are and what we do.</p>
</div>

<h2 class="title">Categories of discussion</h2>
<div class="row">

    @foreach(App\Models\Category::all() as $category)
    <div class="column">
        <div class="card">

            <div class="container">
                <h2>{{$category->category}}</h2>
                <img src="images/{{$category->image}}" style="width:100%">
                <p class="description">Some text that describes me lorem ipsum ipsum lorem.</p>
                <p><button class="button"><a href='category/{{$category->category}}' class="about-category">See
                            articles</a></button></p>
            </div>
        </div>
    </div>
    @endforeach

</div>

@endsection
