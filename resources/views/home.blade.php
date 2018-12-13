@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h2>Dashboard</h2>
                <a href="{{ 'post' }}">投稿する</a>
                </div>
                @foreach($posts as $post)
                        <div class="inner-body">
                            <div class="post-left">
                            <input type='hidden' name='id' value='{{ $post->id }}'><br>
                                <h3>{{ $post->title }}</h3>
                                <div class="post-right">
                                @if (!$post->image == null)
                                <p><img src="/storage/post-image/{{ $post->image }}" width="100%"></p>
                                @endif
                            </div>
                                <pre>{{ $post->body }}</pre>
                                <p>{{ $post->created_at }}</p>
                                <a href="{{ route('delete',$post->id )}}" id="del" onClick="del()">削除する</a>
                                <a href="{{ route('preview',$post->id)}}">編集する</a>
                            </div>
                            
                        </div>
                @endforeach
                <div class="panel-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div> -->
                        
                    <!-- @endif -->
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
