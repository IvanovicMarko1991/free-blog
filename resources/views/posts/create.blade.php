@extends('layouts.app')
@section('content')

<h1>Create Post</h1>
<div class="form-content">
    {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', '',['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>

    <div class="form-group">
        {{Form::label('body', 'Body')}}
        {{Form::textarea('body', '',['class' => 'form-control body-text','name' => 'body', 'placeholder' => 'Body text'])}}
    </div>

    <div class="form-group">
        {{Form::label('category', 'Category')}}
        <br>
        {!! Form::select('category_id', [$categories->pluck('category', 'id')]) !!}
    </div>

    <div class="form-group">
        {{Form::label('tags', 'Tags')}}
        {{Form::text('tags', '',['class' => 'form-control', 'placeholder' => 'tags'])}}
    </div>



    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}

</div>

<script src="https://cdn.tiny.cloud/1/ddmxrkqlphou5jp4s9igilz69pokrr0c3fjk537tr57g8pwa/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>

<script type="text/javascript">
    tinymce.init({
        selector: 'textarea',
        height: 500,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount',
            'image'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        'image'
        content_css: '//www.tiny.cloud/css/codepen.min.css'
    });

</script>


@endsection
