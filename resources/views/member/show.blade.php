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
                <td>Gender</td>
                <td>:</td>
                @if(!empty($single_member->Gender))
                    <td>{{$single_member->Gender}}</td>
                @endif
            </tr>
            <tr>
                <td>District</td>
                <td>:</td>
                @if(!empty($single_member->district))
                    <td>{{$single_member->district}}</td>
                @endif
            </tr>
            <tr>
                <td>Email Address</td>
                <td>:</td>
                @if(!empty($single_member->Email))
                    <td>{{$single_member->Email}}</td>
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
                <td>Committees</td>
                <td>:</td>
                @if(!empty($single_member->CommitteeMember))
                    <td>
                        <ul>
                            @foreach($committeeNames as $name)
                                <li>{{$name}}</li>
                            @endforeach
                        </ul>
                    </td>
                @endif
            </tr>
            <tr>
                <td>Committee Chairman</td>
                <td>:</td>
                @if(!empty($single_member->CommitteeChairman))
                    <td>
                        <ul>
                            @foreach($committeeChairman as $name)
                                <li>{{$name}}</li>
                            @endforeach
                        </ul>
                    </td>
                @endif
            </tr>
            <tr>
                <td>Bills</td>
                <td>:</td>
                @if(!empty($single_member->Bills))
                    <td>
                        <ul>
                            @foreach($billsTitles as $bill)
                                <li>{{$bill}}</li>
                            @endforeach
                        </ul>
                    </td>
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
                <td>Place Of Birth</td>
                <td>:</td>
                @if(!empty($single_member->PlaceOfBirth))
                    <td>{{$single_member->PlaceOfBirth}}</td>
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
                <td>Constituency Address</td>
                <td>:</td>
                @if(!empty($single_member->ConstituencyAddress) )
                    <td>{{$single_member->ConstituencyAddress}}</td>
                @endif
            </tr>
            <tr>
                <td>Present Contact</td>
                <td>:</td>
                @if(!empty($single_member->PresentContact) )
                    <td>{{$single_member->PresentContact}}</td>
                @endif
            </tr>
            <tr>
                <td>Permanent Contact</td>
                <td>:</td>
                @if(!empty($single_member->PermenentContact))
                    <td>{{$single_member->PermenentContact}}</td>
                @endif
            </tr>
        </table>

    </div>
    <div class="col-sm-4">
        @if(!empty($single_member->ImageName))
            <img src="{{asset('imgs/'.$single_member->ImageName)}}" width="200">
        @endif
    </div>
@endsection