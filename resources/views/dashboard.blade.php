@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ Auth::user()->name }}
                    <hr>
                    @if(count($posts) > 0)
                    <table>


                        @foreach($posts as $post)


                        <th><a href="/posts/{{$post->id}}">{{$post->title}}</a></th>
                        <th></th>
                        <th><a href="/posts/{{$post->id}}/edit" class="btn btn-primary ">Edit</a></th>
                        <th>{!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id],
                            'method' => 'POST']) !!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger ml-3'])}}
                            {!! Form::close() !!}
                        </th>

                        </tr>
                        @endforeach

                    </table>
                    @endif

                </div>
            </div>


        </div>
    </div>
</div>
@endsection
