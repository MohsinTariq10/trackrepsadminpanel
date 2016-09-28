@extends('layout.admin')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="page-header">Create Attendance</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8"></div>
                <div class="col-sm-8">
                    <form method="POST" action="{{url('/attendance')}}">
                        {!! csrf_field() !!}
                        <label>Id</label>
                        <br>
                        <input name="id" type="text" class="form-control typeahead"/>
                        <br>
                        <label>Session</label>
                        <input name="session" type="text" class="form-control"/>
                        <br>
                        <label>Total Present</label>
                        <input name="total_present" type="text" class="form-control"/>
                        <br>
                        <label>Total Absent</label>
                        <input name="total_absent" type="text" class="form-control"/>
                        <label>Total Days</label>
                        <input name="total_days" type="text" class="form-control"/>
                        <button style="margin-top:20px;" type="submit" class="btn btn-success">Submit</button>
                    </form>
                    <br>
                </div>
                <div class="col-sm-4">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <div style="padding:20px 0px"></div>
            <div class="row">
                <div class="col-sm-12 text-center"></div>
            </div>
        </div>
        <div style="padding:60px 0px"></div>
    </div>
@endsection