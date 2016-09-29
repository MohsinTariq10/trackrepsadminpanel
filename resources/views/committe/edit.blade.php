@extends('layout.admin')

@section('content')

    <form method="POST" action="{{url('committe', $edit_committe->Id)}}">
        {!! csrf_field() !!}
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-sm-12">
                <label>Committee Name</label>
                <input type="text" class="form-control" name="Name"
                       value="{{$edit_committe->Name}}"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <label>Comittee Type</label>

                <select name="CommitteeType" class="form-control">
                    <option>{{$edit_committe->CommitteeType}}</option>
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
                    @if (!empty($edit_committe->ChairmanId))
                        <?php
                        $string = "";
                        foreach ($edit_committe->ChairmanId as $chairman)
                            $string = $string . $chairman . ",";
                        ?>
                        <input name="Committees" type="text" class="form-control typeahead" value="{{$string}}">
                    @else
                        <input name="Committees" type="text" class="form-control typeahead" value="">
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Committee Members</label>
                    <br>
                    @if (!empty($edit_committe->MemberId))
                        <?php
                        $string = "";
                        foreach ($edit_committe->MemberId as $member)
                            $string = $string . $member . ",";
                        ?>
                        <input name="Committees" type="text" class="form-control typeahead" value="{{$string}}">
                    @else
                        <input name="Committees" type="text" class="form-control typeahead" value="">
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>ID</label>
            <input name="Id" type="text" class="form-control" value="{{$edit_committe->Id}}" readonly>
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