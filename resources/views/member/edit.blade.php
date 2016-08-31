@extends('layout.admin')


@section('content')

    <div class="row">
        <div class="col-sm-12">


            <form method="POST" enctype="multipart/form-data" action="{{url('member', $edit_member->Id)}}">

                {!! csrf_field() !!}


                <input type="hidden" name="_method" value="PUT">


                <div class="form-group">
                    <label>Name</label>

                    @if (!empty($edit_member->Name))
                        <input name='Name' type='text' class='form-control' value='{{$edit_member->Name}}'>
                    @else
                        <input name='Name' type='text' class='form-control' value='NULL'>
                    @endif

                </div>

                <div class="form-group">
                    <label>Father Name</label>

                    @if (!empty($edit_member->FatherName))
                        <input name='FatherName' type='text' class='form-control' value='{{$edit_member->FatherName}}'>
                    @else
                        <input name='FatherName' type='text' class='form-control' value='NULL'>

                    @endif
                </div>

                <div class="form-group">
                    <label>Constituency</label>

                    @if (!empty($edit_member->Constituency))
                        <input name='Constituency' type='text' class='form-control'
                               value='{{$edit_member->Constituency}}'>
                    @else
                        <input name='Constituency' type='text' class='form-control' value='NULL'>

                    @endif
                </div>

                <div class="form-group">
                    <label>Seat Type</label>

                    <select name='SeatType' class="form-control">

                        @if (!empty($edit_member->SeatType))
                            <option>{{$edit_member->SeatType}}</option>
                        @else

                            <option>{{NULL}}</option>
                        @endif
                        <option>Select the Seat</option>
                        <option>General Seat</option>
                        <option>Seat 2</option>
                        <option>Seat 3</option>
                        <option>Seat 4</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Profession</label>

                    @if (!empty($edit_member->Profession))
                        <input name='Profession' type='text' class='form-control' value='{{$edit_member->Profession}}'>
                    @else
                        <input name='Profession' type='text' class='form-control' value='NULL'>

                    @endif
                </div>
                <div class="form-group">
                    <label>ID</label>
                    @if(!empty($edit_member->Id))
                        <input name="Id" type="text" class="form-control" value="{{$edit_member->Id}}">
                    @else
                        <input name="Id" type="text" class="form-control" value="NULL">
                    @endif
                </div>


                <div class="form-group">
                    <label>Department</label>
                    <select name="Department" class="form-control">

                        @if (!empty($edit_member->Department))
                            @foreach($edit_member->Department as $dept)
                                <option>{{$dept}}</option>
                            @endforeach
                        @else
                            <option>{{NULL}}</option>
                        @endif
                        <option>a</option>
                        <option>b</option>
                        <option>c</option>
                        <option>D</option>
                    </select>
                </div>


                <div class="form-group">
                    <label>Cabinet Post</label>
                    <select name="CabinetPost" class="form-control">

                        @if (!empty($edit_member->CabinetPost))
                            @foreach($edit_member->CabinetPost as $cab)
                                <option>{{$cab}}</option>
                            @endforeach
                        @else
                            <option>{{NULL}}</option>
                        @endif
                        <option>a</option>
                        <option>b</option>
                        <option>c</option>
                        <option>D</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Party</label>
                    <select name="Party" class="form-control">


                        @if (!empty($edit_member->Party))
                            <option>{{$edit_member->Party}}</option>
                        @else
                            <option>{{NULL}}</option>

                        @endif
                        <option>All Pakistan Muslim League</option>
                        <option>Awami National Party</option>
                        <option>Independents(Government Coaliyion)</option>
                        <option>Independents(Opposition)</option>
                        <option>Jamaat-e-Islami Pakistan</option>
                        <option>Jamiat Ulema-e-Islam(F)</option>
                        <option>Pakistan Muslim League(N)</option>
                        <option>Pakistan Peoples Party Parliamentarians</option>
                        <option>Pakistan Tehrek Insaf</option>
                        <option>Qoumi Wattan Party</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Date Of Birth</label>


                    @if (!empty($edit_member->DateOfBirth))
                        <input name='DateOfBirth' type='text' class='form-control'
                               value='{{$edit_member->DateOfBirth}}'>
                    @else
                        <input name='DateOfBirth' type='text' class='form-control' value='NULL'>

                    @endif

                </div>
                <div class="form-group">
                    <label>Religon</label>
                    <select name="Religion" class="form-control">

                        @if (!empty($edit_member->Religion))
                            <option>{{$edit_member->Religion}}</option>
                        @else

                            <option>{{NULL}}</option>
                        @endif
                        <option>Muslim</option>
                        <option>Non muslim</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Marital Status</label>
                    <select name="MartialStatus" class="form-control">

                        @if (!empty($edit_member->MartialStatus))
                            <option>{{$edit_member->MartialStatus}}</option>
                        @else

                            <option>{{NULL}}</option>
                        @endif
                        <option>single</option>
                        <option>married</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <select name="Gender" class="form-control">

                        @if (!empty($edit_member->Gender))
                            <option>{{$edit_member->Gender}}</option>
                        @else
                            <option>{{NULL}}</option>

                        @endif
                        <option>male</option>
                        <option>female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Education</label>
                    <select name="Education" class="form-control">

                        @if (!empty($edit_member->Education))

                            <option>{{$edit_member->Education}}</option>
                        @else

                            <option>{{NULL}}</option>
                        @endif
                        <option>BA</option>
                        <option>BCS</option>
                        <option>MA</option>
                        <option>Msc</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Present Contact</label>
                <textarea name="PresentContact" class="form-control" rows="3">
                    @if (!empty($edit_member->PresentContact))
                        {{$edit_member->PresentContact}}
                    @else
                        {{NULL}}
                    @endif

                </textarea>
                </div>
                <div class="form-group">
                    <label>Permanent Contact</label>
                <textarea name="PermenentContact" class="form-control" rows="3">

                    @if (!empty($edit_member->PermenentContact))
                        {{$edit_member->PermenentContact}}
                    @else
                        {{NULL}}

                    @endif
                </textarea>
                </div>
                <div class="form-group">
                    <label>Upload Image</label>
                    @if (!empty($edit_member->ImageName))
                        <input name='member_image' type='file' class='form-control'/>
                        <img src="http://trackreps.org/imgs/{{$edit_member->ImageName}}"
                             alt="Member Image"
                             class="img-thumbnail"/>
                    @else
                        <input name='ImageName' type='file' class='form-control' value='NULL'>
                    @endif
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>





@endsection