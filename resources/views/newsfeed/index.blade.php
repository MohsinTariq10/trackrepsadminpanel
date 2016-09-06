@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div style="padding:20px 0px"></div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($newsFeed as $news_feed)
                        {{$news_feed->value->id}}
                        <tr>
                            <td>{{$news_feed->value->title}}</td>
                            <td><a href="{{route('newsfeed.edit',$news_feed->value->id)}}" type="button"
                                   class="btn btn-info"><i class="fa fa-pencil" style="padding-right:5px"></i>Edit</a>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-danger" data-toggle="modal"
                                        data-target="#myModalDelete"><i class="fa fa-remove" style="padding-right:5px"></i>Delete
                                </button>
                            </td>
                            <td><a href="{{route('newsfeed.show',$news_feed->value->id)}}">
                                    <button type="button" class="btn btn-success"><i class="fa fa-eye" style="padding-right:5px"></i>
                                        View
                                    </button>
                                </a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection