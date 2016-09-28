@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div style="padding:20px 0px"></div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Block</th>
                        <th>Delete</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($userData as $user)
                        <tr>
                            <td><img src="{{$user->value->photoUrl}}"
                                     style="height: inherit;width: inherit;"
                                     class="img-thumbnail"/></td>
                            <td>{{$user->value->name}}</td>
                            <td><a href="{{route('user.edit', $user->value->id)}}" class="btn btn-info"><i
                                            class="fa fa-pencil" style="padding-right:5px"></i>Block</a></td>
                            <td>
                                <form method="POST" action="{{ url('user',$user->value->id) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" value="Delete"><i class="fa fa-remove"
                                                                                                   style="padding-right:5px"></i>Delete
                                    </button>

                                </form>
                            </td>
                            <td><a href="{{ url('user',$user->value->id) }}" class="btn btn-success"><i
                                            class="fa fa-eye" style="padding-right:5px"></i>View</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection