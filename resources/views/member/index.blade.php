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
                        <th>Constituency</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($memberdata as $member)
                        <tr>
                            <td><img src="http://trackreps.org/imgs/{{$member->value->ImageName}}" style="height: inherit;width: inherit;"
                                     class="img-thumbnail"/></td>
                            <td>{{$member->value->Name}}</td>
                            <td>{{$member->value->Constituency}}</td>
                            <td><a href="{{route('member.edit', $member->value->Id)}}" class="btn btn-info"><i
                                            class="fa fa-pencil" style="padding-right:5px"></i>Edit</a></td>
                            <td>

                                <!--                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalDelete"><i class="fa fa-remove" style="padding-right:5px"></i>Delete</button>-->

                                <form method="POST" action="{{ url('member',$member->value->Id) }}">

                                    {{ csrf_field() }}

                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" value="Delete"><i class="fa fa-remove"
                                                                                                   style="padding-right:5px"></i>Delete
                                    </button>

                                </form>


                            </td>
                            <td><a href="{{ url('member',$member->value->Id) }}" class="btn btn-success"><i
                                            class="fa fa-eye" style="padding-right:5px"></i>View</a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection