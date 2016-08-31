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
                @foreach($edit_committe->Chairman as $chair)
                    <input type="text" class="form-control" name="Chairman" value="{{$chair}}"/>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label>Committee Members</label>
                @foreach($edit_committe->Member as $mem)
                    <input type="text" class="form-control" name="Member" value="{{$mem}}"/>
                @endforeach

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label>ID</label>
<!--                <input type="text" class="form-control" name="Id" value="{{$edit_committe[0]->default->Id}}"/>-->
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
@endsection 