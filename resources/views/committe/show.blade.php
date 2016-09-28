@extends('layout.admin')


@section('content')



    <div class="col-sm-6">
        <table class="table table-responsive" style="margin-top:20px">
            <tr>
                <td>Committe Name</td>
                <td>:</td>
                <td>{{$single_committe->Name}}</td>
            </tr>
            <tr>
                <td>Committee Type</td>
                <td>:</td>
                <td>{{$single_committe->CommitteeType}}</td>
            </tr>
            <tr>
                <td>Committe Chairman</td>
                <td>:</td>
                @foreach($single_committe->Chairman as $chair)
                    <td>{{$chair}}</td>
                @endforeach
            </tr>
            <tr>
                <td>Committe Members</td>
                <td>:</td>
                <td>
                    <ul>
                        @foreach($single_committe->Member as $mem)
                            <li>
                                {{$mem}}
                            </li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        </table>
    </div>
@endsection