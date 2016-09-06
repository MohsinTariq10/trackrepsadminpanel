@extends('layout.admin')

@section('content')
    <div class="col-sm-6">
        <table class="table table-responsive" style="margin-top:20px">
            <tr>
                <td>Id</td>
                <td>:</td>
                <td>{{$single_attendance->Id}}</td>
            </tr>
            <tr>
                <td>Session</td>
                <td>:</td>
                <td>{{$single_attendance->session}}</td>
            </tr>

            <tr>
                <td>Total Present</td>
                <td>:</td>
                <td>{{$single_attendance->total_present}}</td>
            </tr>
            <tr>
                <td>Total Absent</td>
                <td>:</td>
                <td>{{$single_attendance->total_absent}}</td>
            </tr>
            <tr>
                <td>Total Days</td>
                <td>:</td>
                <td>{{$single_attendance->total_days}}</td>
            </tr>
        </table>
    </div>
@endsection