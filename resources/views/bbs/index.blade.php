@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <p class="post"><a href="post">投稿する</a></p>
            <div class="panel panel-default">
                <div class="panel-heading">Bulletin Board</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection