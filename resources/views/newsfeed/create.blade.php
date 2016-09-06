@extends('layout.admin')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="page-header">Create News feed</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8"></div>
                <div class="col-sm-8">
                    <form method="POST" action="{{url('/newsfeed')}}">
                        {!! csrf_field() !!}
                        <label>Title</label>
                        <input name="title" type="text" class="form-control"/>
                        <br>
                        <label>Priority</label>
                        <input name="priority" type="text" class="form-control"/>
                        <br>
                        <label>Content</label>
                        <textarea name="content" id="content" class="form-control"></textarea>
                        <button type="submit" class="btn btn-success">Create News Feed</button>
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