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
                        <th>Session</th>
                        <th>Total Present</th>
                        <th>Total Absent</th>
                        <th>Total Days</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($attendanceData as $single)
                        <tr>
                            <td>{{$single->value->id}}</td>
                            <td>{{$single->value->session}}</td>
                            <td>{{$single->value->total_present}}</td>
                            <td>{{$single->value->total_absent}}</td>
                            <td>{{$single->value->total_days}}</td>
                            <td><a href="{{route('attendance.edit', $single->value->id)}}" class="btn btn-info"><i
                                            class="fa fa-pencil"></i> Edit</a></td>
                            <td>
                                <form method="POST" action="{{ url('attendance',$single->value->id) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" value="Delete"><i class="fa fa-remove"
                                                                                                   style="padding-right:5px"></i>Delete
                                    </button>
                                </form>
                            </td>
                            <td><a href="{{url('attendance',$single->value->id)}}" class="btn btn-success"><i
                                            class="fa fa-eye"></i>View</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection