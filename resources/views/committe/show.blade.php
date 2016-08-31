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
            @foreach($single_committe->Member as $mem)
                <td>
                    {{$mem}}
                </td>
            @endforeach
        </tr>
        <!--
<tr>
<td>Id</td>
<td>:</td>
<td>{{$single_committe->Id}}</td>
</tr>
-->
    </table>

</div>



@endsection