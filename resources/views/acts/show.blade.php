@extends('layout.admin')


@section('content')

    <div class="col-sm-6">
        <table class="table table-responsive" style="margin-top:20px">
            <tr>
                <td>Date of Governer Assent</td>
                <td>:</td>
                <td>{{$act->DateofGovernersAssent}}</td>
            </tr>
            <tr>
                <td>Title</td>
                <td>:</td>
                <td>{{$act->Title}}</td>
            </tr>
            <tr>
                <td>ID</td>
                <td>:</td>
                <td>{{$act->Id}}</td>
            </tr>
            <tr>
                <td>Act Number</td>
                <td>:</td>
                <td>{{$act->ActNo}}</td>
            </tr>
            <tr>
                <td>Date of Passing</td>
                <td>:</td>
                <td>{{$act->DateofPassing}}</td>
            </tr>
            <tr>
                <td>Subject</td>
                <td>:</td>
                <td>{{$act->Subject}}</td>
            </tr>
        </table>
    </div>
    <embed src="" width="800px" height="210px" />
@endsection