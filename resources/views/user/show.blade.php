@extends('layout.admin')

@section('content')
    <div class="col-sm-6">
        <table class="table table-responsive" style="margin-top:20px">
            <tr>
                <td>Name</td>
                <td>:</td>
                <td>{{$singleUser->name}}</td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>:</td>
                @if(!empty($singleUser->gender))
                    <td>{{$singleUser->gender}}</td>
                @endif
            </tr>
            <tr>
                <td>City</td>
                <td>:</td>
                @if(!empty($singleUser->city))
                    <td>{{$singleUser->city}}</td>
                @endif
            </tr>
            <tr>
                <td>Email Address</td>
                <td>:</td>
                @if(!empty($singleUser->email))
                    <td>{{$singleUser->email}}</td>
                @endif
            </tr>
            <tr>
                <td>Age</td>
                <td>:</td>
                @if(!empty($singleUser->age))
                    <td>{{$singleUser->age}}</td>
                @endif
            </tr>
            <tr>
                <td>Constituency</td>
                <td>:</td>
                @if(!empty($singleUser->constituency))
                    <td>{{$singleUser->constituency}}</td>
                @endif
            </tr>
        </table>
    </div>
    <div class="col-sm-4">
        <img src="{{$singleUser->photoUrl}}" width="200">
    </div>
@endsection