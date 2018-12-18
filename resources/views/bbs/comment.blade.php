@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Comment board</h2>
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
                       
                       <form class="post-form" action="{{route('commentup')}}" method="POST">
                       <input type="hidden" name="id" value="{{$post->id}}" />
                       {{ csrf_field() }}
                           <p>Comment</p>
                           <p><textarea name="comment"></textarea></p>
                          
                           <p class="submit">
                           <input type="submit" value="コメントする"></p>
                       </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection