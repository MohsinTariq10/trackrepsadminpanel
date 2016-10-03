@extends('layout.admin')

@section('content')
    <div class="row" xmlns="http://www.w3.org/1999/html">
        <div class="col-lg-12">
            <h1 class="page-header">
                Edit Poll
            </h1>
        </div>
    </div>

    <form method="POST" action="{{url('/polls', $editPoll->Id)}}" role="form" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="Id" value="{{$editPoll->Id}}">
        <input type="hidden" name="CreatedAt" value="{{$editPoll->created_at}}">
        <div class="row">
            <div class="col-sm-12">
                <label>Question</label>
                <input type="text" class="form-control" name="Question" value="{{$editPoll->question}}"/>
            </div>
        </div>
        <div class="row">
            <label>Options</label>
            <br>
            <?php
            $i = 1;
            foreach($editPoll->options as $option){?>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="Option{{$i}}" value="{{$option->Name}}" disabled/>
            </div>
            <?php
            if ($i % 2 == 0)
                echo "<br> <br> <br>";
            $i++;
            }?>

        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <label>Status</label>
                <select name="Status" class="form-control">
                    <option>{{$editPoll->status}}</option>
                    <option>Online</option>
                    <option>Offline</option>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Tags</label>
                    <br>
                    @if (!empty($editPoll->tags))
                        <?php
                        $string = "";
                        foreach ($editPoll->tags as $tag)
                            $string = $string . $tag . ",";
                        ?>
                        <input type="text" class="form-control typeahead" name="Tags" data-role="tagsinput"
                               value="{{$string}}"/>
                    @else
                        <input type="text" class="form-control typeahead" name="Tags" data-role="tagsinput" value=""/>
                    @endif
                </div>
            </div>
        </div>
        <br>
        @if(!empty($editPoll->imageName))
            <p>Previous Image: <a href="{{asset('/pollImages/'.$editPoll->imageName)}}">{{$editPoll->imageName}}</a></p>
            <input type="hidden" name="PreviousImage" value="{{$editPoll->imageName}}">
        @else
            <p>No Image has Been Selected</p>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Upload Image</label>
                    <input name="ImageName" type="file" class="form-control"/>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
    </form>
@endsection