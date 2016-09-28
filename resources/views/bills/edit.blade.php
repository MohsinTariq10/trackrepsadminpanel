@extends('layout.admin')

@section('content')
    <form method="POST" action="{{url('bills', $edit_bills->Id)}}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="PreviousTitle" value="{{$edit_bills->Title}}">
        <div class="row">
            <div class="col-sm-12">
                <label>Status</label>
                <input type="text" class="form-control" name="Status"
                       value="{{$edit_bills->Status}}"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <label>Mover</label>
                <input type="text" class="form-control" name="Mover"
                       value="{{$edit_bills->Mover}}"/>

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Date Introduced</label>
                    <input type="text" class="form-control" name="DateIntroduced"
                           value="{{$edit_bills->DateIntroduced}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" class="form-control" name="Id" value="{{$edit_bills->Id}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="Title" value="{{$edit_bills->Title}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Upload PDF</label>
                    <input type="file" class="form-control" name="get_pdf" id="get_pdf"/>
                    {{"Current File is, Show It  "}}
                    <a href="{{asset('billspdf/'.$edit_bills->Title.".pdf")}}">{{$edit_bills->Title.".pdf"}}</a>
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