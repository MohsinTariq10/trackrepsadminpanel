@extends('layout.admin')


@section('content')

    <div class="col-sm-6">
        <table class="table table-responsive" style="margin-top:20px">
            <tr>
                <td>Status</td>
                <td>:</td>
                <td>{{$single_bill->Status}}</td>
            </tr>
            <tr>
                <td>Mover</td>
                <td>:</td>
                <td>{{$single_bill->Mover}}</td>
            </tr>
            <tr>
                <td>Date Introduced</td>
                <td>:</td>
                <td>{{$single_bill->DateIntroduced}}</td>
            </tr>
            <tr>
                <td>Id</td>
                <td>:</td>
                <td>{{$single_bill->Id}}</td>
            </tr>

            <tr>
                <td>Title</td>
                <td>:</td>
                <td>{{$single_bill->Title}}</td>
            </tr>
        </table>
    </div>

    <iframe src="https://docs.google.com/gview?url=http://trackreps.org/acts/{{str_replace(' ', '%20', $single_bill->Title)}}.pdf&embedded=true" style="width:718px; height:700px;" frameborder="0"></iframe>
@endsection