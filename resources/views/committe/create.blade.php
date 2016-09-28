@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Add Committee
            </h1>

        </div>
    </div>
    <form method="POST" action="{{url('committe')}}">
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-sm-12">
                <label>Committee Name</label>
                <input type="text" class="form-control" name="Name"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <label>Comittee Type</label>
                <select name="CommitteeType" class="form-control">
                    <option>Legislative Committee</option>
                    <option>Select Committee</option>
                    <option>PAC</option>
                    <option>Standing Committee</option>
                    <option>Steering Committee</option>
                    <option>Special Committee</option>
                </select>

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Committee Chairman</label>
                    <br>
                    <input type="text" class="form-control typeahead" name="Chairman"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Committee Members</label>
                    <br>
                    <input type="text" class="form-control typeahead" name="Member"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" class="form-control" name="Id"/>
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
    </form>
    <script>
        var places = [
                @foreach($memberIds as $id)
            {
                name: '{{"member::".$id}}'
            },
            @endforeach
        ];
        $('.typeahead').tagsinput({
            typeahead: {
                source: places.map(function (item) {
                    return item.name
                }),
                afterSelect: function () {
                    this.$element[0].value = '';
                }
            }
        });
    </script>
@endsection