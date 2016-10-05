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
                        @if(!empty($poll->imageName))
                            <div class="col-sm-12"><img src="{{asset('pollImages/'.$poll->imageName)}}"
                                                        href="Poll Image" style="width: 100%; height: 400px;"></div>
                        @endif
                        <?php
                        $total = 0;
                        foreach ($options as $option) {
                            $total += (int)$option[1];
                        }
                        $i = 1;
                        foreach($options as $option){
                        if ($total != 0)
                            $value = round((((int)$option[1]) / $total) * 100, 1);
                        else
                            $value = 0;
                        ?>
                        <div class="col-sm-12">
                            <div class="col-sm-4">
                                <h2>{{$option[0]}}</h2>
                            </div>
                            <div class="col-sm-7">
                                <br>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar"
                                                 aria-valuenow="{{$value}}"
                                                 aria-valuemin="0" aria-valuemax="100" style="width:{{$value}}%">
                                                {{$value}}%
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">{{$option[1]}}</div>
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
            <h3>Get The Poll Statistics By: </h3>
            <div class="row">
                <div class="col-sm-2"></div>
                <label><h3>City</h3></label>
            </div>
            <form method="POST" action="{{url('polluser')}}" role="form">
                {{csrf_field()}}
                <input type="hidden" name="city" value="city">
                <input type="hidden" name="id" value="{{$poll->Id}}">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-6">
                        <select name="district" class="form-control">
                            <option>Abbottabad</option>
                            <option>Bannu</option>
                            <option>Batagram</option>
                            <option>Buner</option>
                            <option>Charsada</option>
                            <option>Chitral</option>
                            <option>D.I. Khan</option>
                            <option>Hangu</option>
                            <option>Haripur</option>
                            <option>Karak</option>
                            <option>Kohat</option>
                            <option>Kohistan</option>
                            <option>Lakki Marwat</option>
                            <option>Lower Dir</option>
                            <option>Malakand</option>
                            <option>Mansehra</option>
                            <option>Mardan</option>
                            <option>Nowshera</option>
                            <option>Peshawar</option>
                            <option>Shangla</option>
                            <option>Sawabi</option>
                            <option>Sawat</option>
                            <option>Tang</option>
                            <option>Tor Ghar</option>
                            <option>Upper Dir</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-danger btn-lg">Show</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-sm-2"></div>
                <label><h3>Age Limit</h3></label>
            </div>
            <form method="POST" action="{{url('polluser')}}" role="form">
                {{csrf_field()}}
                <input type="hidden" name="ageGroup" value="ageGroup">
                <input type="hidden" name="id" value="{{$poll->Id}}">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" placeholder="Start Limit" name="startAge" value="0">
                    </div>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" placeholder="End Limit" name="endAge" value="20">
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-danger btn-lg">Show</button>
                    </div>
                </div>
            </form>
            <hr>
            @foreach($comments as $comment)
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div>
                            <div class="col-sm-2 comment-img">
                                @if(!empty($comment->value->userPhoto))
                                    <img src="{{$comment->value->userPhoto}}"/>
                                @else
                                    <img src="" alt="Image Not Fount"/>
                                @endif
                            </div>
                            <div class="col-sm-8 padding-zero">
                                <div class="mr-50">
                                    @if(!empty($comment->value->username))
                                        <h2>{{$comment->value->username}}</h2>
                                    @endif
                                    @if(!empty($comment->value->Description))
                                        <h4>{{$comment->value->Description}}</h4>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-2 comment-delete">
                                <form method="POST" action="{{ url('comment') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$comment->value->postId}}">
                                    <input type="hidden" name="commentId" value="{{$comment->value->timestamp}}">
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