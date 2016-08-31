@extends('layout.admin')


@section('content')


  
    <div class="col-sm-6">
                            <table class="table table-responsive" style="margin-top:20px">
                                <tr>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td>{{$single_member->Name}}</td>
                                </tr>
                                <tr>
                                    <td>Father Name</td>
                                    <td>:</td>
                                    @if(!empty($single_member->FatherName))
                                    <td>{{$single_member->FatherName}}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Constituency</td>
                                    <td>:</td>
                                    @if(!empty($single_member->Constituency))
                                    <td>{{$single_member->Constituency}}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Seat Type</td>
                                    <td>:</td>
                                    @if(!empty($single_member->SeatType))
                                    <td>{{$single_member->SeatType}}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Profession</td>
                                    <td>:</td>
                                    @if(!empty($single_member->Profession) )
                                    <td>{{$single_member->Profession}}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Department</td>
                                    <td>:</td>
                                    @if(!empty($single_member->Department))
                                    <td>{{$single_member->Department}}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Cabinet Post</td>
                                    <td>:</td>
                                    @if(!empty($single_member->CabinetPost))
                                    <td>{{$single_member->CabinetPost}}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Party</td>
                                    <td>:</td>
                                    @if(!empty($single_member->Party))
                                    <td>{{$single_member->Party}}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Date Of Birth</td>
                                    <td>:</td>
                                    @if(!empty($single_member->DateOfBirth))
                                    <td>{{$single_member->DateOfBirth}}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Religion</td>
                                    <td>:</td>
                                    @if(!empty($single_member->Religion))
                                    <td>{{$single_member->Religion}}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Martial Status</td>
                                    <td>:</td>
                                    @if(!empty($single_member->MartialStatus))
                                    <td>{{$single_member->MartialStatus}}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Education</td>
                                    <td>:</td>
                                    @if(!empty($single_member->Education))
                                    <td>{{$single_member->Education}}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Permanent Contact</td>
                                    <td>:</td>
                                    @if(!empty($single_member->PermanentContact))
                                    <td>{{$single_member->PermanentContact}}</td>
                                    @endif
                                </tr>
                            </table>

                        </div>
                        <div class="col-sm-4">
                            
                            <img  src="http://trackreps.org/imgs/{{$single_member->ImageName}}" width="200">
                        </div>
  

@endsection