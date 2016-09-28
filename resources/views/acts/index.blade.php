@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div style="padding:20px 0px"></div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Act Title</th>
                        <th>Act ID</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($actsdata as $act)
                        <tr>
                            @if(!empty($act->value->Title))
                                <td>{{$act->value->Title}}</td>
                            @endif
                            <td>{{$act->value->Id}}</td>
                            <td><a href="{{route('acts.edit', $act->value->Id)}}" class="btn btn-info"><i
                                            class="fa fa-pencil"></i> Edit</a></td>
                            <td>
                                <form method="POST" action="{{ url('acts',$act->value->Id) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    @if(!empty($act->value->Title))
                                        <input type="hidden" name="Title" value="{{$act->value->Title}}">
                                    @endif
                                    <button type="submit" class="btn btn-danger" value="Delete"><i
                                                class="fa fa-remove"
                                                style="padding-right:5px"></i>Delete
                                    </button>
                                </form>
                            </td>
                            <td><a href="{{url('acts',$act->value->Id)}}" class="btn btn-success"><i
                                            class="fa fa-eye"></i>View</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection