@extends('layout.admin')

@section('content')

    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="page-header">News feed</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8"></div>
                <div class="col-sm-8">
                    <div>
                        {{$newsfeed->title}}
                    </div>
                    <div>
                        {{$newsfeed->date}}
                    </div>
                    <div>
                        <?php echo $newsfeed->content?>
                    </div>
                <!--
                    <form role="form">
                        {{csrf_field()}}

                        <label>Title</label>
                        <input name="title" type="text" class="form-control" value="{{$newsfeed->title}}"/>
                        <br>
                        <label>Priority</label>
                        <input name="priority" type="text" class="form-control" value="{{$newsfeed->priority}}"/>
                        <br>
                        <label>Date</label>
                        <input name="date_of_newsfeed" type="date" class="form-control"
                               value=""/>
                        <br>
                        <label>Content</label>
                        <textarea name="content" class="form-control">{{$newsfeed->content}}</textarea>
                    </form>
                    -->
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
@endsection