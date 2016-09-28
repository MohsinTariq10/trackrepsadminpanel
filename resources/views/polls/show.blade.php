@extends('layout.admin')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Poll Information
                    </h1>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div>
                        <div class="poll-well"><h3>{{$poll->question}}</h3></div>
                        <?php
                        $total = 0;
                        foreach ($poll->options as $option) {
                            $total += count($option->user);
                        }
                        $i = 1;
                        foreach($poll->options as $option){
                            if ($total != 0)
                                $value = (count($option->user) / $total) * 100;
                            else
                                $value = 0;
                        ?>
                        <div class="col-sm-12">
                            <div class="col-sm-4">
                                <h2>{{$option->Name}}</h2>
                            </div>
                            <div class="col-sm-8">
                                <br>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{$value}}"
                                         aria-valuemin="0" aria-valuemax="100" style="width:{{$value}}%">
                                        {{$value}}%
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }?>
                        <br>
                        <h4>
                            @foreach($poll->tags as $tag)
                                {{"#"}}
                                {{$tag."  "}}
                            @endforeach
                        </h4>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
            <br>
            <hr>
            @foreach($poll->comments as $comment)
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div>
                            <div class="col-sm-2 comment-img">
                                @if(!empty($comment->userPhoto))
                                    <img src="{{$comment->userPhoto}}"/>
                                @else
                                    <img src="" alt="Image Not Fount"/>
                                @endif
                            </div>
                            <div class="col-sm-8 padding-zero">
                                <div class="mr-50">
                                    @if(!empty($comment->username))
                                        <h2>{{$comment->username}}</h2>
                                    @endif
                                    @if(!empty($comment->Description))
                                        <h4>{{$comment->Description}}</h4>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-2 comment-delete">
                                <form method="POST" action="{{ url('comment') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$poll->Id}}">
                                    <input type="hidden" name="commentId" value="{{$comment->Id}}">
                                    <button type="submit" class="btn btn-danger btn-lg">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
@endsection