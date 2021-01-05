@extends('layouts.app')


@section('content')

    <h1>Edit Post</h1>
    <div class="form-content"> 
        {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post->id], 'method' => 'POST']) !!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', $post->title,['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>


            <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', $post->body,['class' => 'form-control body-text', 'name' => 'body', 'placeholder' => 'Body text'])}}
            </div>

            <div class="form-group">
                <select name="categories">
                    @foreach(App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                </select>    
            </div>

            <div class="form-group">
                    {{Form::label('tags', 'Tags')}}
                    {{Form::text('tags', $post->tags ,['class' => 'form-control', 'placeholder' => 'tags'])}}
            </div>

            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

         

        {!! Form::close() !!}

    </div>
    <script src="https://cdn.tiny.cloud/1/ddmxrkqlphou5jp4s9igilz69pokrr0c3fjk537tr57g8pwa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>  

    <script type="text/javascript">
        tinymce.init({
        selector: 'textarea',
        mobile:{
            theme:'mobile'
        },
        height: 500,
        menubar: false,
        plugins: [
          'advlist autolink lists link code image charmap print preview anchor',
          'searchreplace visualblocks code fullscreen',
          'insertdatetime media table paste code help wordcount',
          
        ],
        a11y_advanced_options: true,
        toolbar: 'undo redo | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | image code | bullist numlist outdent indent | ' +
        'removeformat | help',
        images_upload_handler: function (blobInfo, success, failure) {

           var xhr, formData;
           xhr = new XMLHttpRequest();
           xhr.withCredentials = false;
           xhr.open('POST', 'http://127.0.0.1:8000/upload-image');
           var token = '{{ csrf_token() }}';
           xhr.setRequestHeader("X-CSRF-Token", token);

           xhr.onload = function() {
               var json;
               if (xhr.status != 200) {
                   failure('HTTP Error: ' + xhr.status);
                   return;
               }
            
               json = xhr.responseText;

               if(json){
               success(json);
               }
           };
           
           formData = new FormData();
           formData.append('file', blobInfo.blob(), blobInfo.filename());
           xhr.send(formData);
       },
        
        content_css: '//www.tiny.cloud/css/codepen.min.css'
      });
          </script>




@endsection
