@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div style="padding:20px 0px"></div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Question</th>
                        <th>Status</th>
                        <th>Tags</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pollsData as $poll)
                        <tr>
                            <td>{{$poll->value->Id}}</td>
                            <td>{{$poll->value->question}}</td>
                            <td>{{$poll->value->status}}</td>
                            <td>
                                @foreach($poll->value->tags as $tag)
                                    {{"#"}}
                                    {{$tag."  "}}
                                @endforeach
                            </td>
                            <td><a href="{{route('polls.edit', $poll->value->Id)}}" class="btn btn-info"><i
                                            class="fa fa-pencil" style="padding-right:5px"></i>Edit</a></td>
                            <td>
                                <form method="POST" action="{{ url('polls',$poll->value->Id) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" value="Delete"><i class="fa fa-remove"
                                                                                                   style="padding-right:5px"></i>Delete
                                    </button>
                                </form>
                            </td>
                            <td><a href="{{ url('polls',$poll->value->Id) }}" class="btn btn-success"><i
                                            class="fa fa-eye" style="padding-right:5px"></i>View</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection