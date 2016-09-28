@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <form method="POST" action="{{url('member')}}" role="form" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label>ID</label>
                    <input name="Id" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input name="Name" type="text" class="form-control" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                    <label>Father Name</label>
                    <input name="FatherName" type="text" class="form-control" placeholder="Enter Father Name" required>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <select name="Gender" class="form-control">
                        <option>male</option>
                        <option>female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>District</label>
                    <select name="District" class="form-control">
                        <option>Abbottabad</option>
                        <option>Bannu</option>
                        <option>Batagram</option>
                        <option>Buner</option>
                        <option>Charsada</option>
                        <option>Chitral</option>
                        <option>Dera Ismail Khan</option>
                        <option>Hangu</option>
                        <option>Haripur</option>
                        <option>Karak</option>
                        <option>Kohat</option>
                        <option>Lakki Marwat</option>
                        <option>Lower Dir</option>
                        <option>Lower Kohistan</option>
                        <option>Malakand</option>
                        <option>Mansehra</option>
                        <option>Mardan</option>
                        <option>Nowshera</option>
                        <option>Peshawar</option>
                        <option>Shangla</option>
                        <option>Sawabi</option>
                        <option>Sawat</option>
                        <option>Tang</option>
                        <option>Tor Ghar</option>
                        <option>Upper Dir</option>
                        <option>Upper Kohistan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name='Email' type='email' class='form-control' placeholder="Email">
                </div>
                <div class="form-group">
                    <label>Constituency</label>
                    <input name="Constituency" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Seat Type</label>
                    <select name="SeatType" class="form-control">
                        <option>General Seat</option>
                        <option>Reserved Seat-Women</option>
                        <option>Reserved Seat-Minorities</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Profession</label>
                    <input name="Profession" type="text" class="form-control" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label>Department</label>
                    <select name="Department" class="form-control">
                        <option> </option>
                        <option>a</option>
                        <option>b</option>
                        <option>c</option>
                        <option>D</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Cabinet Post</label>
                    <select name="CabinetPost" class="form-control">
                        <option></option>
                        <option>a</option>
                        <option>b</option>
                        <option>c</option>
                        <option>D</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Party</label>
                    <select name="Party" class="form-control">
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
                    <label>Committees</label>
                    <br>
                    <input name="Committees" type="text" class="form-control typeahead">
                </div>
                <div class="form-group">
                    <label>Committee Chairman</label>
                    <br>
                    <input name="CommitteeChairman" type="text" class="form-control typeahead">
                </div>
                <div class="form-group">
                    <label>Date Of Birth</label>
                    <input name="DateOfBirth" type="date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Place of Birth</label>
                    <input name="PlaceOfBirth" type="text" class="form-control" placeholder="Enter Place Of Birth">
                </div>
                <div class="form-group">
                    <label>Religion</label>
                    <select name="Religion" class="form-control">
                        <option>Muslim</option>
                        <option>Christian</option>
                        <option>Hinduism</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Marital Status</label>
                    <select name="MaritalStatus" class="form-control">
                        <option>single</option>
                        <option>married</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Education</label>
                    <select name="Education" class="form-control">
                        <option>BA</option>
                        <option>BCS</option>
                        <option>MA</option>
                        <option>Msc</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Constituency Address</label>
                    <textarea name="ConstituencyAddress" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label>Present Contact</label>
                    <textarea name="PresentContact" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label>Permanent Contact</label>
                    <textarea name="PermanentContact" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label>Upload Image</label>
                    <input name="ImageName" type="file" class="form-control"/>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script>
        var places = [
            @foreach($committeeIds as $id)
            {name:'{{"committee::".$id}}'},
            @endforeach
        ];
        $('.typeahead').tagsinput({
            typeahead: {
                source: places.map(function(item) { return item.name }),
                afterSelect: function() {
                    this.$element[0].value = '';
                }
            }
        });
    </script>
@endsection