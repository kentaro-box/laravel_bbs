@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bulletin Board</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                       <form class="post-form" action="" method="post" enctype="multipart/form-data">
                           <p>Title</p>
                           <p><input type="text" name="title"></p>
                           <p>Content</p>
                           <p><input type="textarea" name="content"></p>
                           <p>Image</p>
                           <p><input type="file" name="img"></p>
                           <p class="submit"><input type="submit" value="投稿する"></p>
                       </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection