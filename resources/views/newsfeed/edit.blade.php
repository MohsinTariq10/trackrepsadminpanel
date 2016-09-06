@extends('layout.admin')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="page-header">Update News feed</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8"></div>
                <div class="col-sm-8">
                    <form method="POST" action="{{url('/newsfeed',$newsfeed_single->id)}}">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="PUT">
                        <label>Title</label>
                        <input name="title" type="text" class="form-control" value="{{$newsfeed_single->title}}"/>
                        <br>
                        <label>Priority</label>
                        <input name="priority" type="text" class="form-control"
                               value="{{$newsfeed_single->priority}}"/>
                        <br>
                        <label>Content</label>
                        <textarea id="content" name="content" class="form-control">{{$newsfeed_single->content}}</textarea>
                        <button type="submit" class="btn btn-success">Update News Feed</button>
                    </form>
                    <br>
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div style="padding:20px 0px"></div>
            <div class="row">
                <div class="col-sm-12 text-center">
                </div>
            </div>
        </div>
        <div style="padding:60px 0px"></div>
    </div>
    <script src="{{asset('tinymce/tinymce.min.js')}}"></script>
    <script>tinymce.init({ selector:'#content' });</script>
@endsection