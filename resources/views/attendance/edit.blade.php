@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Edit Attendance
            </h1>
        </div>
    </div>
    <!-- /.row -->
    <form method="POST" action="{{url('attendance' , $edit_attendance->Id)}}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <input type="hidden" name="_method" value="PUT">

        <div class="row">
            <div class="col-sm-12">
                <label>Id</label>
                <input type="text" class="form-control" name="id" value="{{$edit_attendance->Id}}"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <label>Session</label>
                <input type="text" class="form-control" name="session" value="{{$edit_attendance->session}}"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Total Present</label>
                    <input type="text" class="form-control" name="total_present" value="{{$edit_attendance->total_present}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Total Absent</label>
                    <input type="text" class="form-control" name="total_absent" value="{{$edit_attendance->total_absent}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Total Days</label>
                    <input type="text" class="form-control" name="total_days" value="{{$edit_attendance->total_days}}"/>
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