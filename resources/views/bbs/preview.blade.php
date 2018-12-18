@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Update board</h2>
            </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            </div>
                        @endif
                       <form class="post-form" action="{{route('update', $post->id)}}" method="post" enctype="multipart/form-data">
                       {{ csrf_field() }}
                           <p>Title</p>
                           <p><input type="text" name="title" value="{{ $post->title }}"></p>
                           <p>Content</p>
                           <p><textarea name="content" value="{{ $post->body }}">{{ $post->body }}</textarea></p>
                           <p>Image</p>
                           <p><input type="file" name="img" value="{{}}"></p>
                           <p class="submit">
                           <a href="/cancel">キャンセル</a>
                        <input type="submit" value="編集する"></p>
                       </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection